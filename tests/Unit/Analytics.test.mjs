import assert from 'node:assert/strict';
import test from 'node:test';

const seo = (path = '/', settings = {}) => ({
    title: path === '/' ? 'Beranda' : 'Layanan',
    canonical: `https://konsulin.id${path}`,
    analyticsId: 'G-TEST123',
    tagManagerId: 'GTM-TEST123',
    metaPixelId: null,
    ...settings,
});

let moduleNumber = 0;

async function browser(t) {
    const scripts = [];
    const document = new EventTarget();
    document.referrer = 'https://search.test/results?email=private@example.test';
    document.createElement = () => ({});
    document.head = { appendChild: script => scripts.push(script) };
    class Element {
        constructor(href, dataset = {}, textContent = '') {
            Object.assign(this, { href, dataset, textContent });
        }
        closest() { return this; }
    }
    for (const [key, value] of Object.entries({ document, window: { dataLayer: [], location: new URL('https://konsulin.id/') }, Element })) {
        const previous = Object.getOwnPropertyDescriptor(globalThis, key);
        Object.defineProperty(globalThis, key, { value, writable: true, configurable: true });
        t.after(() => previous ? Object.defineProperty(globalThis, key, previous) : delete globalThis[key]);
    }
    const analytics = await import(`../../resources/js/analytics.ts?test=${++moduleNumber}`);
    const navigate = props => document.dispatchEvent(new CustomEvent('inertia:navigate', { detail: { page: { props } } }));
    const click = (href, dataset, text) => {
        const event = new Event('click');
        Object.defineProperty(event, 'target', { value: new Element(href, dataset, text) });
        document.dispatchEvent(event);
    };
    return { analytics, scripts, navigate, click, events: () => window.dataLayer.filter(item => item.event) };
}

test('GTM owns delivery when both IDs exist and each public navigation emits one page view', async t => {
    const { analytics, scripts, navigate, events } = await browser(t);
    const direct = [];
    window.gtag = (...args) => direct.push(args);
    analytics.setupAnalytics({ props: { seo: seo() } });
    analytics.setupAnalytics({ props: { seo: seo() } });
    navigate({ seo: seo() });
    navigate({ seo: seo('/layanan') });
    assert.equal(events().length, 2);
    assert.equal(events()[0].ga4_event_name, 'page_view');
    assert.equal(events()[0].page_referrer, 'https://search.test/results');
    assert.equal(events()[1].page_referrer, 'https://konsulin.id/');
    assert.equal(events()[1].page_path, '/layanan');
    assert.deepEqual(direct, []);
    assert.deepEqual(scripts, []);
});

test('service links to WhatsApp and service details carry service identity and source page', async t => {
    const { analytics, click, events } = await browser(t);
    analytics.setupAnalytics({ props: { seo: seo() } });
    click('https://wa.me/6285183440300?text=private%20message%20%5BLP-LK%5D', { serviceId: 'laporan-bulanan', serviceName: 'Laporan Bulanan' });
    click('https://konsulin.id/layanan/perpajakan?email=private@example.test', {}, 'Perpajakan');
    const serviceEvents = events().filter(event => event.ga4_event_name === 'service_click');
    assert.equal(serviceEvents.length, 2);
    assert.equal(serviceEvents[0].service_id, 'laporan-bulanan');
    assert.equal(serviceEvents[0].service_name, 'Laporan Bulanan');
    assert.equal(serviceEvents[0].page_path, '/');
    assert.equal(serviceEvents[0].link_destination, 'whatsapp');
    assert.equal(serviceEvents[1].service_id, 'perpajakan');
    assert.equal(serviceEvents[1].link_destination, 'service_detail');
    assert.doesNotMatch(JSON.stringify(events()), /private|6285183440300/);
});

test('floating WhatsApp clicks are distinct and do not inherit a previous service', async t => {
    const { analytics, click, events } = await browser(t);
    analytics.setupAnalytics({ props: { seo: seo() } });
    click('https://konsulin.id/layanan/perpajakan', {}, 'Pajak');
    click('https://wa.me/6285183440300?text=Halo%20%5BLP-FL%5D', { ctaPlacement: 'floating' });
    const floating = events().filter(event => event.ga4_event_name === 'whatsapp_floating_click');
    assert.equal(floating.length, 1);
    assert.equal(floating[0].cta_placement, 'floating');
    assert.equal(floating[0].cta_reference, 'LP-FL');
    assert.equal(floating[0].service_id, null);
    assert.equal(floating[0].service_name, null);
    assert.equal(floating[0].contact_method, 'whatsapp');
});

test('direct GA4 works without GTM and does not broadcast events to other properties', async t => {
    const { analytics, scripts } = await browser(t);
    analytics.setupAnalytics({ props: { seo: seo('/', { tagManagerId: null }) } });
    analytics.trackContactEvent('consultation_form');
    const commands = window.dataLayer.filter(item => !item.event).map(item => Array.from(item));
    assert.equal(scripts.length, 1);
    assert.match(scripts[0].src, /gtag\/js\?id=G-TEST123$/);
    assert.equal(commands.find(item => item[0] === 'config')[2].send_page_view, false);
    const page = commands.find(item => item[0] === 'event' && item[1] === 'page_view');
    assert.equal(page[2].send_to, 'G-TEST123');
    assert.equal(commands.filter(item => item[0] === 'event' && item[1] === 'generate_lead').length, 1);
});

test('admin navigation and disabled tracking never send page or contact events', async t => {
    const { analytics, navigate, click, events } = await browser(t);
    analytics.setupAnalytics({ props: { seo: seo() } });
    navigate({ seo: null });
    analytics.trackContactEvent('consultation_form');
    click('https://wa.me/123?text=secret', { ctaPlacement: 'floating' });
    assert.equal(events().length, 1);
    navigate({ seo: seo() });
    assert.equal(events().length, 2);
    navigate({ seo: seo('/privasi', { analyticsId: null, tagManagerId: null, metaPixelId: null }) });
    analytics.trackContactEvent('email');
    assert.equal(events().length, 2);
});

test('staging without tracking IDs does not install listeners or scripts', async t => {
    const { analytics, scripts, click, events } = await browser(t);
    analytics.setupAnalytics({ props: { seo: seo('/', { analyticsId: null, tagManagerId: null, metaPixelId: null }) } });
    click('https://wa.me/123', { ctaPlacement: 'floating' });
    assert.deepEqual(events(), []);
    assert.deepEqual(scripts, []);
});

test('GTM works without a direct GA4 ID and browser back navigation is counted', async t => {
    const { analytics, scripts, navigate, events } = await browser(t);
    analytics.setupAnalytics({ props: { seo: seo('/', { analyticsId: null }) } });
    navigate({ seo: seo('/layanan', { analyticsId: null }) });
    navigate({ seo: seo('/', { analyticsId: null }) });
    assert.deepEqual(events().map(event => event.page_path), ['/', '/layanan', '/']);
    assert.deepEqual(scripts, []);
});

test('relative service navigation uses the actual website origin even when canonical URLs use another host', async t => {
    const { analytics, click, events } = await browser(t);
    window.location = new URL('https://www.konsulin.id/');
    analytics.setupAnalytics({ props: { seo: seo() } });
    click('https://www.konsulin.id/layanan/akuntansi', {}, 'Akuntansi');
    click('https://external.test/layanan/akuntansi', {}, 'External');
    const services = events().filter(event => event.ga4_event_name === 'service_click');
    assert.equal(services.length, 1);
    assert.equal(services[0].service_id, 'akuntansi');
});

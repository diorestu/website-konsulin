import type { SeoMetadata } from './Components/SeoHead';

declare global {
    interface Window {
        dataLayer?: unknown[];
        gtag?: (...args: unknown[]) => void;
        fbq?: (...args: unknown[]) => void;
    }
}

type AnalyticsParameters = Record<string, string | null>;

let initialized = false;
let enabled = false;
let directAnalyticsId: string | null = null;
let pageLocation = '';
let pageTitle = '';

function cleanUrl(value: string): string {
    try {
        const url = new URL(value);
        return ['https:', 'http:'].includes(url.protocol) ? url.origin + url.pathname : '';
    } catch {
        return '';
    }
}

function sendEvent(name: string, parameters: AnalyticsParameters = {}): void {
    if (!enabled) return;
    const payload = {
        page_location: pageLocation,
        page_path: new URL(pageLocation).pathname,
        page_title: pageTitle,
        page_referrer: null,
        service_id: null,
        service_name: null,
        link_destination: null,
        contact_method: null,
        cta_reference: null,
        cta_placement: null,
        ...parameters,
    };
    // Clear optional fields so GTM cannot reuse values from the preceding event.
    window.dataLayer?.push({ event: `konsulin_${name}`, ga4_event_name: name, ...payload });
    if (directAnalyticsId) {
        const values = Object.fromEntries(Object.entries(payload).filter(([, value]) => value !== null));
        window.gtag?.('event', name, { ...values, send_to: directAnalyticsId });
    }
}

export function trackContactEvent(channel: 'whatsapp' | 'email' | 'consultation_form', reference?: string, placement?: string): void {
    if (!enabled) return;
    const name = channel === 'consultation_form' ? 'generate_lead'
        : channel === 'whatsapp' && placement === 'floating' ? 'whatsapp_floating_click' : 'contact_click';
    sendEvent(name, {
        contact_method: channel,
        cta_reference: reference ?? null,
        cta_placement: placement ?? null,
    });
    window.fbq?.('track', channel === 'consultation_form' ? 'Lead' : 'Contact');
}

export function setupAnalytics(initialPage: { props: Record<string, unknown> }): void {
    const initialSeo = initialPage.props.seo as SeoMetadata | null;
    if ((!initialSeo?.analyticsId && !initialSeo?.tagManagerId && !initialSeo?.metaPixelId) || initialized) return;
    initialized = true;
    window.dataLayer = window.dataLayer || [];
    const id = initialSeo.analyticsId;
    directAnalyticsId = !initialSeo.tagManagerId && id && /^G-[A-Z0-9]+$/.test(id) ? id : null;
    if (directAnalyticsId) {
        window.gtag = window.gtag || function () { window.dataLayer?.push(arguments); };
        window.gtag('js', new Date());
        window.gtag('config', directAnalyticsId, { send_page_view: false, allow_google_signals: false, allow_ad_personalization_signals: false });
    }

    const sendPage = (seo: SeoMetadata | null) => {
        enabled = Boolean(seo && (seo.analyticsId || seo.tagManagerId || seo.metaPixelId));
        if (!enabled || !seo) {
            pageLocation = '';
            return;
        }
        const location = cleanUrl(seo.canonical);
        if (!location || pageLocation === location) return;
        const referrer = pageLocation || cleanUrl(document.referrer);
        pageLocation = location;
        pageTitle = `${seo.title} — Konsulin`;
        sendEvent('page_view', { page_referrer: referrer });
        window.fbq?.('track', 'PageView');
    };
    sendPage(initialSeo);
    document.addEventListener('inertia:navigate', event => {
        const page = (event as CustomEvent<{ page: { props: Record<string, unknown> } }>).detail.page;
        sendPage(page.props.seo as SeoMetadata | null);
    });
    document.addEventListener('click', event => {
        if (!enabled) return;
        const target = event.target instanceof Element ? event.target.closest<HTMLAnchorElement>('a[href]') : null;
        if (!target) return;
        const url = new URL(target.href);
        const isWhatsApp = url.hostname === 'wa.me';
        const serviceMatch = url.origin === window.location.origin ? url.pathname.match(/^\/layanan\/([^/]+)\/?$/) : null;
        const serviceId = target.dataset.serviceId || serviceMatch?.[1];
        if (serviceId) {
            sendEvent('service_click', {
                service_id: serviceId,
                service_name: target.dataset.serviceName || target.textContent?.trim().replace(/\s+/g, ' ').slice(0, 100) || serviceId,
                link_destination: isWhatsApp ? 'whatsapp' : 'service_detail',
                cta_placement: target.dataset.ctaPlacement ?? 'service_link',
            });
        }
        if (isWhatsApp) {
            const reference = url.searchParams.get('text')?.match(/\[([A-Z0-9-]+)\]$/)?.[1];
            trackContactEvent('whatsapp', reference, target.dataset.ctaPlacement);
        } else if (url.protocol === 'mailto:') {
            trackContactEvent('email');
        }
    }, { capture: true });
    if (directAnalyticsId) {
        const script = document.createElement('script');
        script.async = true;
        script.src = `https://www.googletagmanager.com/gtag/js?id=${directAnalyticsId}`;
        document.head.appendChild(script);
    }
}

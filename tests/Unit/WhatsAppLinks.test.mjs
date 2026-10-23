import assert from 'node:assert/strict';
import test from 'node:test';
import { getWhatsAppUrl, getContextWhatsAppUrl, getServiceWhatsAppUrl, serviceWhatsAppCodes } from '../../resources/js/contact.ts';

const message = value => new URL(value).searchParams.get('text');

test('landing page financial-report link includes the service and LP-LK marker', () => {
    const url = new URL(getServiceWhatsAppUrl({ id: 'laporan-bulanan', name: 'Laporan Keuangan & Pajak Bulanan' }, '/'));
    assert.equal(url.hostname, 'wa.me');
    assert.equal(url.pathname, '/6285183440300');
    assert.equal(url.searchParams.get('text'), 'Hi Konsulin, saya ingin konsultasi tentang layanan Laporan Keuangan & Pajak Bulanan. [LP-LK]');
    assert.equal([...url.searchParams].length, 1);
});

test('all 13 services produce distinct markers', () => {
    const codes = Object.keys(serviceWhatsAppCodes).map(id => message(getServiceWhatsAppUrl({ id, name: id }, '/')).match(/\[([^\]]+)\]$/)[1]);
    assert.equal(codes.length, 13);
    assert.equal(new Set(codes).size, 13);
});

test('footer, social icon, floating button and main CTA are distinguishable', () => {
    const codes = ['FT', 'FS', 'FL', 'CTA'].map(source => message(getContextWhatsAppUrl('/?utm_source=google', source)).match(/\[([^\]]+)\]$/)[1]);
    assert.deepEqual(codes, ['LP-FT', 'LP-FS', 'LP-FL', 'LP-CTA']);
});

test('shared links reflect the current page and service context', () => {
    assert.ok(message(getContextWhatsAppUrl('/tentang-kami', 'FL')).endsWith('[TK-FL]'));
    assert.ok(message(getContextWhatsAppUrl('/layanan/tpdoc/', 'FT')).endsWith('[DL-TPD-FT]'));
    assert.ok(message(getContextWhatsAppUrl('/kontak?layanan=coretax-badan#konsultasi', 'NO')).endsWith('[KT-CTB-NO]'));
});

test('campaign fields and invalid service selections do not leak into messages', () => {
    for (const id of ['invalid', '__proto__', 'constructor']) {
        const text = message(getContextWhatsAppUrl(`/kontak?layanan=${id}&email=private@example.test`, 'SOC'));
        assert.ok(text.endsWith('[KT-SOC]'));
        assert.ok(!text.includes('private@example.test'));
        assert.ok(!text.includes('[object Object]'));
    }
});

test('generic link has a reference and custom text survives encoding', () => {
    assert.ok(message(getWhatsAppUrl()).endsWith('[WEB]'));
    assert.equal(message(getWhatsAppUrl('Halo! Pajak & akuntansi — pribadi/badan.', 'KT-NO')), 'Halo! Pajak & akuntansi — pribadi/badan. [KT-NO]');
});

test('Admin 2 footer link uses the previous number and a distinct source marker', () => {
    const primary = new URL(getContextWhatsAppUrl('/', 'FT'));
    const admin2 = new URL(getContextWhatsAppUrl('/', 'FT', 'admin2'));
    assert.equal(primary.pathname, '/6285183440300');
    assert.equal(admin2.pathname, '/6281908797799');
    assert.ok(primary.searchParams.get('text').endsWith('[LP-FT]'));
    assert.ok(admin2.searchParams.get('text').endsWith('[LP-FT-A2]'));
    assert.ok(message(getContextWhatsAppUrl('/tentang-kami', 'FT', 'admin2')).endsWith('[TK-FT-A2]'));
});

test('detail-page consultation includes the service name and a single DL service marker', () => {
    for (const id of Object.keys(serviceWhatsAppCodes)) {
        const service = { id, name: `Layanan ${id}` };
        const url = new URL(getServiceWhatsAppUrl(service, `/layanan/${id}?utm_source=google`));
        assert.equal(url.pathname, '/6285183440300');
        assert.ok(url.searchParams.get('text').includes(service.name));
        assert.ok(url.searchParams.get('text').endsWith(`[DL-${serviceWhatsAppCodes[id]}]`));
    }
    assert.ok(message(getServiceWhatsAppUrl({ id: 'laporan-bulanan', name: 'Laporan Keuangan' }, '/layanan')).endsWith('[LY-LK]'));
});

test('website settings update every WhatsApp placement without losing reference codes', async () => {
    const {configureContacts, officialEmail, socialLinks, officeLocations} = await import('../../resources/js/contact.ts');
    const originalSocials = socialLinks.map(item => ({...item}));
    const originalOffices = officeLocations.map(item => ({...item}));
    try {
        configureContacts({whatsapp_primary: '6281234567890', whatsapp_secondary: '6281299999999', email: 'updated@example.test',
            instagram: 'https://www.instagram.com/updated/', tiktok: '', linkedin: '', offices: [{name: 'Baru', address: 'Alamat baru'}]});
        for (const placement of ['FT', 'FS', 'FL', 'CTA', 'NO', 'SOC']) {
            assert.equal(new URL(getContextWhatsAppUrl('/', placement)).pathname, '/6281234567890');
        }
        assert.equal(new URL(getServiceWhatsAppUrl({id: 'perpajakan', name: 'Pajak'}, '/layanan/perpajakan')).pathname, '/6281234567890');
        assert.equal(new URL(getContextWhatsAppUrl('/', 'FT', 'admin2')).pathname, '/6281299999999');
        assert.equal((await import('../../resources/js/contact.ts')).officialEmail, 'updated@example.test');
        assert.equal(socialLinks.length, 2);
        assert.equal(officeLocations[0].address, 'Alamat baru');
    } finally {
        configureContacts({whatsapp_primary: '6285183440300', whatsapp_secondary: '6281908797799', email: officialEmail,
            instagram: originalSocials.find(item => item.name === 'Instagram').href, tiktok: originalSocials.find(item => item.name === 'TikTok').href,
            linkedin: originalSocials.find(item => item.name === 'LinkedIn').href, offices: originalOffices});
    }
});

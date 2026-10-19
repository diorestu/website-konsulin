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

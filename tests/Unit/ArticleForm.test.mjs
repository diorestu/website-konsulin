import assert from 'node:assert/strict';
import test from 'node:test';
import { articleFormData, articleSlug } from '../../resources/js/articleForm.ts';

test('generated article slugs remain valid at the maximum length', () => {
    const slug = articleSlug(`${'a'.repeat(159)} word`);
    assert.ok(slug.length <= 160);
    assert.match(slug, /^[a-z0-9]+(?:-[a-z0-9]+)*$/);
    assert.equal(articleSlug('  Laporan Café & Pajak!  '), 'laporan-cafe-pajak');
});

test('saved article data clears pending cover changes and normalizes nullable fields', () => {
    const data = articleFormData({id: 1, title: 'Judul', slug: 'judul', content: '<p>Teks tersimpan</p>', excerpt: 'Ringkasan', category: null, status: 'published', cover_alt: null, seo_title: null, seo_description: null, cover_url: '/storage/articles/cover.jpg'});
    assert.equal(data.content, '<p>Teks tersimpan</p>');
    assert.equal(data.category, '');
    assert.equal(data.seo_title, '');
    assert.equal(data.cover, null);
    assert.equal(data.remove_cover, false);
    assert.equal(articleFormData(null).status, 'draft');
});

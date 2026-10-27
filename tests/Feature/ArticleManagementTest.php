<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class ArticleManagementTest extends TestCase
{
    use RefreshDatabase;

    private function payload(array $changes = []): array
    {
        return array_replace(['title' => 'Panduan Pajak', 'slug' => 'panduan-pajak', 'excerpt' => 'Ringkasan artikel pajak.',
            'content' => '<h2>Persiapan</h2><p>Isi artikel <strong>penting</strong>.</p>', 'status' => 'draft',
            'category' => 'Perpajakan', 'cover_alt' => '', 'seo_title' => '', 'seo_description' => ''], $changes);
    }

    public function test_article_management_requires_an_admin(): void
    {
        $this->get('/admin/articles')->assertRedirect('/admin/login');
        $this->post('/admin/articles', $this->payload())->assertRedirect('/admin/login');
        $this->actingAs(User::factory()->create())->get('/admin/articles')->assertForbidden();
        $this->post('/admin/articles/images')->assertForbidden();
    }

    public function test_drafts_can_be_created_edited_published_and_archived(): void
    {
        $this->withoutVite();
        config(['seo.indexable' => true]);
        $this->actingAs(User::factory()->create(['is_admin' => true]));
        $this->post('/admin/articles', $this->payload())->assertSessionHasNoErrors();
        $article = Article::firstOrFail();
        $this->get('/blog/panduan-pajak')->assertNotFound();
        $this->get('/blog')->assertInertia(fn (Assert $page) => $page->has('articles.data', 0));
        $this->get('/sitemap.xml')->assertDontSee('/blog/panduan-pajak');
        $this->put('/admin/articles/'.$article->id, $this->payload(['status' => 'published', 'seo_title' => 'Panduan Pajak Konsulin']))->assertSessionHasNoErrors();
        $this->get('/blog/panduan-pajak')->assertOk()->assertInertia(fn (Assert $page) => $page
            ->component('ArticleDetail')->where('article.title', 'Panduan Pajak')->where('seo.title', 'Panduan Pajak Konsulin')
            ->where('article.content', '<h2>Persiapan</h2><p>Isi artikel <strong>penting</strong>.</p>'));
        $this->get('/blog')->assertInertia(fn (Assert $page) => $page->has('articles.data', 1));
        $this->get('/sitemap.xml')->assertSee('/blog/panduan-pajak');
        $this->get('/admin/articles?search=tidak-ada')->assertInertia(fn (Assert $page) => $page->has('articles.data', 0));
        $this->put('/admin/articles/'.$article->id, $this->payload(['status' => 'archived']))->assertSessionHasNoErrors();
        $this->get('/blog/panduan-pajak')->assertNotFound();
        $this->get('/admin/articles?status=archived')->assertOk()->assertInertia(fn (Assert $page) => $page->has('articles.data', 1));
    }

    public function test_long_articles_are_not_truncated_by_the_sanitizer(): void
    {
        $html = '<p>'.str_repeat('Kalimat artikel panjang. ', 2000).'</p>';
        $this->actingAs(User::factory()->create(['is_admin' => true]))->post('/admin/articles', $this->payload(['content' => $html]))->assertSessionHasNoErrors();
        $this->assertSame($html, Article::firstOrFail()->content);
    }

    public function test_rich_text_is_sanitized_without_losing_supported_formatting(): void
    {
        $this->actingAs(User::factory()->create(['is_admin' => true]))->post('/admin/articles', $this->payload([
            'content' => '<p onclick="alert(1)">Aman <strong>tebal</strong><script>alert(1)</script><a href="javascript:alert(1)">tautan</a><img src="/storage/articles/safe.jpg" onerror="alert(2)" alt="Foto"></p>',
        ]))->assertSessionHasNoErrors();
        $html = Article::firstOrFail()->content;
        $this->assertStringContainsString('<strong>tebal</strong>', $html);
        $this->assertStringContainsString('/storage/articles/safe.jpg', $html);
        foreach (['<script', 'onclick', 'onerror', 'javascript:'] as $unsafe) {
            $this->assertStringNotContainsString($unsafe, $html);
        }
    }

    public function test_images_are_validated_and_cover_can_be_removed(): void
    {
        Storage::fake('public');
        $this->actingAs(User::factory()->create(['is_admin' => true]));
        $this->post('/admin/articles/images', ['image' => UploadedFile::fake()->create('bad.svg', 10, 'image/svg+xml')])->assertSessionHasErrors('image');
        $this->postJson('/admin/articles/images', ['image' => UploadedFile::fake()->create('large.jpg', 5121, 'image/jpeg')])
            ->assertUnprocessable()->assertJsonPath('errors.image.0', 'Ukuran gambar maksimal 5 MB.');
        $response = $this->post('/admin/articles/images', ['image' => UploadedFile::fake()->image('inline.jpg')])->assertCreated();
        $this->assertStringStartsWith('/storage/articles/', $response->json('url'));
        $this->post('/admin/articles', $this->payload(['cover' => UploadedFile::fake()->image('cover.jpg')]))->assertSessionHasNoErrors();
        $article = Article::firstOrFail();
        $path = $article->cover_path;
        Storage::disk('public')->assertExists($path);
        $this->put('/admin/articles/'.$article->id, $this->payload(['remove_cover' => true]))->assertSessionHasNoErrors();
        $this->assertNull($article->fresh()->cover_path);
        Storage::disk('public')->assertMissing($path);
    }

    public function test_invalid_status_empty_content_and_duplicate_slugs_are_rejected(): void
    {
        $this->actingAs(User::factory()->create(['is_admin' => true]));
        $this->post('/admin/articles', $this->payload())->assertSessionHasNoErrors();
        $this->post('/admin/articles', $this->payload(['status' => 'invalid', 'content' => '<p></p>']))->assertSessionHasErrors(['slug', 'status', 'content']);
    }

    public function test_content_with_only_invisible_spacing_cannot_be_saved(): void
    {
        $this->actingAs(User::factory()->create(['is_admin' => true]));

        foreach (['<p>&nbsp;</p>', '<p>&#8203;</p>', '<p>　</p>'] as $content) {
            $this->post('/admin/articles', $this->payload(['content' => $content]))
                ->assertSessionHasErrors('content');
        }

        $this->assertDatabaseCount('articles', 0);
    }

    public function test_missing_summary_has_an_actionable_validation_message(): void
    {
        $this->actingAs(User::factory()->create(['is_admin' => true]));
        $this->post('/admin/articles', $this->payload(['excerpt' => '']))
            ->assertSessionHasErrors(['excerpt' => 'Ringkasan wajib diisi.']);
        $this->assertDatabaseCount('articles', 0);
    }

    public function test_multipart_edit_preserves_slug_and_failed_validation_keeps_saved_content_and_cover(): void
    {
        Storage::fake('public');
        $this->actingAs(User::factory()->create(['is_admin' => true]));
        $this->post('/admin/articles', $this->payload(['cover' => UploadedFile::fake()->image('cover.jpg')]))
            ->assertSessionHasNoErrors();
        $article = Article::firstOrFail();
        $coverPath = $article->cover_path;

        $this->post('/admin/articles/'.$article->id, $this->payload([
            '_method' => 'put', 'slug' => 'url-diubah', 'remove_cover' => true,
        ]))->assertSessionHasErrors('slug');
        $this->assertSame('panduan-pajak', $article->fresh()->slug);
        $this->assertSame($coverPath, $article->fresh()->cover_path);
        Storage::disk('public')->assertExists($coverPath);

        $this->post('/admin/articles/'.$article->id, $this->payload([
            '_method' => 'put', 'title' => 'Judul diperbarui',
            'cover' => UploadedFile::fake()->image('replacement.jpg'),
        ]))->assertSessionHasNoErrors();
        $this->assertSame('Judul diperbarui', $article->fresh()->title);
        $this->assertSame('panduan-pajak', $article->fresh()->slug);
        Storage::disk('public')->assertMissing($coverPath);
        Storage::disk('public')->assertExists($article->fresh()->cover_path);
    }
}

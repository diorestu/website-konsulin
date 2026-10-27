<?php

namespace Tests\Feature;

use App\Http\Middleware\HandleInertiaRequests;
use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class NotFoundPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_unavailable_article_slugs_render_the_error_page_without_resolving_article_seo(): void
    {
        $this->withoutVite();
        Article::factory()->create(['slug' => 'artikel-draft', 'status' => 'draft']);
        Article::factory()->create(['slug' => 'artikel-arsip', 'status' => 'archived']);
        $inertiaHeaders = [
            'X-Inertia' => 'true',
            'X-Requested-With' => 'XMLHttpRequest',
            'X-Inertia-Version' => app(HandleInertiaRequests::class)->version(Request::create('/')) ?? '',
        ];

        foreach (['artikel-tidak-ada', 'artikel-draft', 'artikel-arsip'] as $slug) {
            $this->get('/blog/'.$slug)->assertNotFound()
                ->assertInertia(fn (Assert $page) => $page
                    ->component('NotFound')
                    ->where('seo', null));

            $this->get('/blog/'.$slug, $inertiaHeaders)->assertNotFound()
                ->assertHeader('X-Inertia', 'true')
                ->assertJsonPath('component', 'NotFound')
                ->assertJsonPath('props.seo', null);

            $this->getJson('/blog/'.$slug)->assertNotFound()->assertJsonStructure(['message']);
        }
    }

    public function test_unknown_urls_render_the_custom_page_with_a_404_status(): void
    {
        $this->withoutVite();

        foreach (['/halaman-tidak-ada', '/layanan/tidak-ada', '/admin/tidak-ada'] as $url) {
            $this->get($url)->assertNotFound()
                ->assertSee('noindex, nofollow', false)
                ->assertInertia(fn (Assert $page) => $page
                    ->component(str_starts_with($url, '/admin/') ? 'Admin/NotFound' : 'NotFound')
                    ->where('homeUrl', route('home', [], false))
                    ->where('servicesUrl', route('services.index', [], false)));
        }
    }

    public function test_inertia_navigation_receives_an_inertia_error_response(): void
    {
        $this->get('/halaman-tidak-ada', ['X-Inertia' => 'true', 'X-Requested-With' => 'XMLHttpRequest'])
            ->assertNotFound()
            ->assertHeader('X-Inertia', 'true')
            ->assertJsonPath('component', 'NotFound');
    }

    public function test_json_errors_are_not_replaced_with_an_html_page(): void
    {
        foreach (['/halaman-tidak-ada', '/api/tidak-ada'] as $url) {
            $this->getJson($url)->assertNotFound()
                ->assertJsonStructure(['message'])
                ->assertJsonMissingPath('component');
        }

        $this->get('/api/tidak-ada')->assertNotFound()->assertHeader('Content-Type', 'application/json');
    }
}

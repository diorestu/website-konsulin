<?php

namespace Tests\Feature;

use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class NotFoundPageTest extends TestCase
{
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

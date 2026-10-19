<?php

namespace Tests\Feature;

use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    public function test_main_navigation_pages_are_available(): void
    {
        $this->withoutVite();
        foreach ([
            '/' => 'Home',
            '/tentang-kami' => 'About',
            '/our-value' => 'Values',
            '/layanan' => 'Services',
            '/blog' => 'Blog',
            '/kontak' => 'Contact',
        ] as $url => $component) {
            $this->get($url)->assertOk()->assertInertia(fn (Assert $page) => $page->component($component));
        }
    }

    public function test_services_and_contact_use_the_existing_service_catalog(): void
    {
        $this->withoutVite();
        foreach (['/layanan', '/kontak'] as $url) {
            $this->get($url)->assertOk()->assertInertia(fn (Assert $page) => $page
                ->has('services', 13)
                ->where('services.12.id', 'coretax-badan'));
        }
    }
}

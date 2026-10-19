<?php

namespace Tests\Feature;

use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class ServicePagesTest extends TestCase
{
    public function test_every_service_has_its_own_detail_page(): void
    {
        $this->withoutVite();

        foreach (config('konsulin.services') as $service) {
            $this->get('/layanan/'.$service['id'])
                ->assertOk()
                ->assertInertia(fn (Assert $page) => $page
                    ->component('ServiceDetail')
                    ->where('service.id', $service['id'])
                    ->where('service.name', $service['name'])
                    ->has('service.summary')
                    ->has('service.description')
                    ->has('service.scope', 3)
                    ->has('service.preparation', 3));
        }
    }

    public function test_unknown_service_returns_not_found(): void
    {
        $this->get('/layanan/tidak-tersedia')->assertNotFound();
    }

    public function test_consultation_can_be_prefilled_from_a_detail_page(): void
    {
        $this->withoutVite();
        $this->get('/?layanan=coretax-badan')->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('Home')
                ->where('selectedService', 'coretax-badan'));
    }

    public function test_unrecognized_consultation_prefill_is_ignored(): void
    {
        $this->withoutVite();
        foreach (['/?layanan=tidak-tersedia', '/?layanan[]=coretax-badan', '/kontak?layanan=tidak-tersedia', '/kontak?layanan[]=coretax-badan'] as $url) {
            $this->get($url)->assertOk()
                ->assertInertia(fn (Assert $page) => $page->where('selectedService', ''));
        }
    }

    public function test_contact_form_accepts_the_service_selected_on_its_detail_page(): void
    {
        $this->withoutVite();
        $this->get('/kontak?layanan=coretax-badan')->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('Contact')
                ->where('selectedService', 'coretax-badan'));
    }
}

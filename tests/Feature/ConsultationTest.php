<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class ConsultationTest extends TestCase
{
    use RefreshDatabase;

    private function payload(array $changes = []): array
    {
        return array_replace([
            'name' => 'Pengujian Konsultasi',
            'email' => 'test@example.com',
            'company' => 'Perusahaan Uji',
            'service' => 'perpajakan',
            'message' => 'Saya ingin mendiskusikan kebutuhan pelaporan usaha.',
            'consent' => true,
            'website' => '',
        ], $changes);
    }

    public function test_homepage_and_privacy_are_inertia_pages(): void
    {
        $this->withoutVite();
        $this->get('/')->assertOk()->assertInertia(fn (Assert $page) => $page->component('Home')->has('services', 13));
        $this->get('/privasi')->assertOk()->assertInertia(fn (Assert $page) => $page->component('Privacy'));
    }

    public function test_consultation_is_stored_and_acknowledged(): void
    {
        $this->from('/')->post('/konsultasi', $this->payload())
            ->assertRedirect('/')->assertSessionHas('consultation_received', true);
        $this->assertDatabaseHas('consultation_requests', [
            'email' => 'test@example.com', 'service' => 'perpajakan', 'status' => 'new',
        ]);
    }

    public function test_required_fields_and_consent_are_validated(): void
    {
        $this->from('/')->post('/konsultasi', $this->payload([
            'name' => '', 'email' => 'invalid', 'message' => '', 'consent' => false,
        ]))->assertSessionHasErrors(['name', 'email', 'message', 'consent']);
        $this->assertDatabaseCount('consultation_requests', 0);
    }

    public function test_contact_page_submission_returns_to_contact_with_confirmation(): void
    {
        $this->from('/kontak')->post('/konsultasi', $this->payload())
            ->assertRedirect('/kontak')->assertSessionHas('consultation_received', true);
        $this->assertDatabaseCount('consultation_requests', 1);
    }

    public function test_service_must_be_a_supported_option(): void
    {
        $this->post('/konsultasi', $this->payload(['service' => 'invalid']))->assertSessionHasErrors('service');
        $this->assertDatabaseCount('consultation_requests', 0);
    }

    public function test_honeypot_rejects_bot_submission(): void
    {
        $this->post('/konsultasi', $this->payload(['website' => 'https://spam.example']))->assertSessionHasErrors('website');
        $this->assertDatabaseCount('consultation_requests', 0);
    }

    public function test_submissions_are_rate_limited(): void
    {
        for ($i = 0; $i < 5; $i++) {
            $this->post('/konsultasi', $this->payload())->assertRedirect();
        }
        $this->post('/konsultasi', $this->payload())->assertStatus(429);
        $this->assertDatabaseCount('consultation_requests', 5);
    }

    public function test_leads_are_not_exposed_by_a_public_route(): void
    {
        $this->get('/consultation-requests')->assertNotFound();
    }
}

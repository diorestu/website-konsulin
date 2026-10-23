<?php

namespace Tests\Feature;

use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class AdminContentTest extends TestCase
{
    use RefreshDatabase;

    private function servicePayload(array $changes = []): array
    {
        return array_replace([
            'name' => 'Layanan Baru', 'slug' => 'layanan-baru', 'summary' => 'Ringkasan layanan baru.',
            'description' => 'Deskripsi layanan yang dikelola melalui admin.', 'scope' => ['Ruang lingkup satu'],
            'preparation' => ['Persiapan satu'], 'sort_order' => 20, 'is_active' => true,
            'seo_title' => 'Judul SEO Layanan Baru', 'seo_description' => 'Deskripsi SEO layanan baru.', 'related_services' => ['akuntansi'],
        ], $changes);
    }

    public function test_existing_services_are_preserved_and_new_services_reach_public_pages(): void
    {
        $this->withoutVite();
        config(['seo.indexable' => true]);
        $this->assertDatabaseCount('services', 13);
        $this->actingAs(User::factory()->create(['is_admin' => true]))->post('/admin/services', $this->servicePayload())->assertSessionHasNoErrors();
        $this->assertDatabaseHas('services', ['slug' => 'layanan-baru', 'is_active' => true]);
        $this->get('/layanan')->assertInertia(fn (Assert $page) => $page->has('services', 14));
        $this->get('/layanan/layanan-baru')->assertOk()->assertInertia(fn (Assert $page) => $page
            ->where('service.name', 'Layanan Baru')->where('service.scope.0', 'Ruang lingkup satu')
            ->where('seo.title', 'Judul SEO Layanan Baru')->where('seo.description', 'Deskripsi SEO layanan baru.')
            ->where('seo.relatedLinks.0.href', '/layanan/akuntansi'));
        $this->get('/sitemap.xml')->assertSee('/layanan/layanan-baru');
        $this->post('/konsultasi', ['name' => 'Klien Uji', 'email' => 'client@example.test', 'service' => 'layanan-baru',
            'message' => 'Saya ingin berdiskusi lebih lanjut.', 'consent' => true])->assertSessionHasNoErrors();
    }

    public function test_inactive_services_disappear_and_keep_existing_urls_when_reactivated(): void
    {
        $this->withoutVite();
        config(['seo.indexable' => true]);
        $service = Service::where('slug', 'perpajakan')->firstOrFail();
        $this->actingAs(User::factory()->create(['is_admin' => true]))->put('/admin/services/'.$service->id, $this->servicePayload([
            'slug' => 'perpajakan', 'is_active' => false,
        ]))->assertSessionHasNoErrors();
        $this->get('/layanan/perpajakan')->assertNotFound();
        $this->get('/layanan')->assertInertia(fn (Assert $page) => $page->has('services', 12));
        $this->get('/sitemap.xml')->assertDontSee('/layanan/perpajakan');
        $this->post('/konsultasi', ['service' => 'perpajakan'])->assertSessionHasErrors('service');
        $this->put('/admin/services/'.$service->id, $this->servicePayload(['slug' => 'changed-url']))->assertSessionHasErrors('slug');
    }

    public function test_duplicate_slugs_and_invalid_related_services_are_rejected(): void
    {
        $this->actingAs(User::factory()->create(['is_admin' => true]))->post('/admin/services', $this->servicePayload([
            'slug' => 'perpajakan', 'related_services' => ['missing'],
        ]))->assertSessionHasErrors(['slug', 'related_services.0']);
        $this->assertDatabaseCount('services', 13);
    }

    public function test_site_settings_flow_to_public_contacts_and_humi(): void
    {
        $this->withoutVite();
        $this->actingAs(User::factory()->create(['is_admin' => true]));
        $this->put('/admin/settings', [
            'brand_name' => 'Konsulin Baru', 'brand_description' => 'Deskripsi brand baru.', 'brand_services' => 'Pajak dan akuntansi',
            'footer_tagline' => 'Partner usaha Anda.', 'whatsapp_primary' => '6281234567890', 'whatsapp_secondary' => '6281299999999',
            'email' => 'new@example.test', 'instagram' => 'https://www.instagram.com/example/', 'tiktok' => '', 'linkedin' => '',
            'offices' => [['name' => 'Kantor Baru', 'address' => 'Alamat baru Tangerang']], 'humi_company' => '2',
        ])->assertSessionHasNoErrors();
        $this->get('/kontak')->assertInertia(fn (Assert $page) => $page
            ->where('site.brand_name', 'Konsulin Baru')->where('site.email', 'new@example.test')
            ->where('site.whatsapp_primary', '6281234567890')->where('site.offices.0.address', 'Alamat baru Tangerang'));
        $this->get('/')->assertSee('new@example.test')->assertSee('Konsulin Baru');
        Http::preventStrayRequests();
        Http::fake(['https://humi.web.id/api/v1/companies/2/careers*' => Http::response([], 404)]);
        $this->get('/karir')->assertOk();
        Http::assertSent(fn ($request) => str_contains($request->url(), '/companies/2/careers'));
    }

    public function test_invalid_contacts_and_unsafe_social_urls_are_rejected(): void
    {
        $this->actingAs(User::factory()->create(['is_admin' => true]))->put('/admin/settings', [
            'whatsapp_primary' => 'invalid', 'email' => 'invalid', 'instagram' => 'javascript:alert(1)',
        ])->assertSessionHasErrors(['whatsapp_primary', 'email', 'instagram']);
    }
}

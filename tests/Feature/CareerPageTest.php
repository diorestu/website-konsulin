<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Inertia\Testing\AssertableInertia as Assert;
use PHPUnit\Framework\Attributes\TestWith;
use Tests\TestCase;

class CareerPageTest extends TestCase
{
    public function test_careers_use_the_company_endpoint_and_apply_link(): void
    {
        $this->withoutVite();
        Http::preventStrayRequests();
        Http::fake(['https://humi.web.id/api/v1/companies/1/careers*' => Http::response([
            'success' => true,
            'data' => [
                'items' => [[
                    'id' => 7, 'title' => 'Tax Consultant', 'description' => '<p>Menyiapkan laporan pajak.</p>',
                    'location' => 'Tangerang', 'employment_type' => 'permanent', 'workplace_type' => 'onsite',
                    'apply_url' => 'https://humi.web.id/careers/tax-consultant',
                ]],
                'pagination' => ['current_page' => 2, 'last_page' => 3, 'total' => 25],
            ],
        ])]);

        $this->get('/karir?page=2')->assertOk()->assertInertia(fn (Assert $page) => $page
            ->component('Careers')->where('careersUnavailable', false)
            ->has('careers', 1)->where('careers.0.title', 'Tax Consultant')
            ->where('careers.0.description', 'Menyiapkan laporan pajak.')
            ->where('careers.0.apply_url', 'https://humi.web.id/careers/tax-consultant')
            ->where('pagination.current_page', 2)->where('pagination.last_page', 3)
            ->where('seo.canonical', 'https://konsulin.id/karir'));
        Http::assertSent(fn ($request) => $request->url() === 'https://humi.web.id/api/v1/companies/1/careers?page=2&per_page=12');
    }

    public function test_an_empty_list_is_distinct_from_an_unavailable_source(): void
    {
        $this->withoutVite();
        Http::preventStrayRequests();
        Http::fake(['https://humi.web.id/api/v1/companies/1/careers*' => Http::response([
            'success' => true, 'data' => ['items' => [], 'pagination' => ['current_page' => 1, 'last_page' => 1, 'total' => 0]],
        ])]);

        $this->get('/karir')->assertOk()->assertInertia(fn (Assert $page) => $page
            ->where('careers', [])->where('careersUnavailable', false));
    }

    #[TestWith([404, '<html>Not found</html>'])]
    #[TestWith([500, []])]
    #[TestWith([200, ['success' => false]])]
    #[TestWith([200, ['success' => true, 'data' => ['items' => 'invalid']]])]
    public function test_source_errors_leave_the_page_available(int $status, array|string $body): void
    {
        $this->withoutVite();
        Http::preventStrayRequests();
        Http::fake(['https://humi.web.id/api/v1/companies/1/careers*' => Http::response($body, $status)]);

        $this->get('/karir')->assertOk()->assertInertia(fn (Assert $page) => $page
            ->component('Careers')->where('careers', [])->where('careersUnavailable', true));
    }

    public function test_connection_failures_do_not_break_the_page(): void
    {
        $this->withoutVite();
        Http::preventStrayRequests();
        Http::fake(['https://humi.web.id/api/v1/companies/1/careers*' => Http::failedConnection()]);

        $this->get('/karir')->assertOk()->assertInertia(fn (Assert $page) => $page->where('careersUnavailable', true));
    }

    public function test_unsafe_apply_links_are_not_exposed_as_actions(): void
    {
        $this->withoutVite();
        Http::preventStrayRequests();
        Http::fake(['https://humi.web.id/api/v1/companies/1/careers*' => Http::response([
            'success' => true, 'data' => ['items' => [[
                'id' => 8, 'title' => 'Akuntan', 'apply_url' => 'javascript:alert(1)',
            ]], 'pagination' => ['current_page' => 1, 'last_page' => 1, 'total' => 1]],
        ])]);

        $this->get('/karir')->assertOk()->assertInertia(fn (Assert $page) => $page
            ->where('careers.0.title', 'Akuntan')->where('careers.0.apply_url', null));
    }
}

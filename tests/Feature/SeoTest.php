<?php

namespace Tests\Feature;

use App\Support\PageSeo;
use DOMDocument;
use DOMXPath;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class SeoTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutVite();
        config(['seo.url' => 'https://konsulin.test', 'seo.indexable' => true]);
    }

    public function test_all_public_pages_have_unique_metadata_before_javascript_runs(): void
    {
        Http::preventStrayRequests();
        Http::fake(['https://humi.web.id/api/v1/companies/1/careers*' => Http::response([], 503)]);
        $titles = [];
        $descriptions = [];
        foreach (PageSeo::sitemapUrls() as $url) {
            $response = $this->get(parse_url($url, PHP_URL_PATH))->assertOk();
            $document = new DOMDocument;
            $document->loadHTML($response->getContent(), LIBXML_NOERROR | LIBXML_NOWARNING);
            $xpath = new DOMXPath($document);
            $title = $xpath->query('//head/title');
            $description = $xpath->query('//head/meta[@name="description"]');
            $canonical = $xpath->query('//head/link[@rel="canonical"]');
            $this->assertCount(1, $title);
            $this->assertCount(1, $description);
            $this->assertCount(1, $canonical);
            $this->assertSame($url, $canonical->item(0)->getAttribute('href'));
            $this->assertNotEmpty($description->item(0)->getAttribute('content'));
            $this->assertSame($url, $xpath->query('//head/meta[@property="og:url"]')->item(0)->getAttribute('content'));
            $this->assertSame('https://konsulin.test/images/og-konsulin-share-v3.jpg', $xpath->query('//head/meta[@property="og:image"]')->item(0)->getAttribute('content'));
            $this->assertJson($xpath->query('//head/script[@type="application/ld+json"]')->item(0)->textContent);
            $titles[] = $title->item(0)->textContent;
            $descriptions[] = $description->item(0)->getAttribute('content');
        }
        $this->assertCount(21, array_unique($titles));
        $this->assertCount(21, array_unique($descriptions));
    }

    public function test_query_parameters_do_not_change_canonical_or_lose_consultation_prefill(): void
    {
        $this->get('/kontak?layanan=coretax-badan&utm_source=campaign')
            ->assertOk()->assertInertia(fn (Assert $page) => $page
            ->where('seo.canonical', 'https://konsulin.test/kontak')
            ->where('selectedService', 'coretax-badan'));
    }

    public function test_each_service_links_to_three_valid_services_without_linking_to_itself(): void
    {
        foreach (config('konsulin.services') as $service) {
            $this->get('/layanan/'.$service['id'])->assertInertia(function (Assert $page) use ($service) {
                $page->has('seo.relatedLinks', 3)
                    ->where('seo.relatedLinks', function ($links) use ($service) {
                        $validPaths = collect(config('konsulin.services'))->pluck('id')->map(fn ($id) => '/layanan/'.$id);
                        $hrefs = collect($links)->pluck('href');

                        return $hrefs->unique()->count() === 3
                            && ! $hrefs->contains('/layanan/'.$service['id'])
                            && $hrefs->every(fn ($href) => $validPaths->contains($href));
                    });
            });
        }
        $this->get('/layanan/tidak-ada')->assertNotFound();
    }

    public function test_sitemap_and_robots_advertise_only_canonical_public_urls(): void
    {
        $response = $this->get('/sitemap.xml')->assertOk()
            ->assertHeader('Content-Type', 'application/xml; charset=UTF-8');
        $xml = simplexml_load_string($response->getContent());
        $this->assertNotFalse($xml);
        $urls = array_map(fn ($url) => (string) $url->loc, iterator_to_array($xml->url, false));
        $this->assertCount(21, $urls);
        $this->assertCount(21, array_unique($urls));
        $this->assertContains('https://konsulin.test/karir', $urls);
        foreach ($urls as $url) {
            $this->assertStringStartsWith('https://konsulin.test/', $url);
            $this->assertStringNotContainsString('?', $url);
            $this->assertNotSame('/konsultasi', parse_url($url, PHP_URL_PATH));
        }
        $this->get('/robots.txt')->assertOk()
            ->assertSee('Sitemap: https://konsulin.test/sitemap.xml', false);
    }

    public function test_inertia_navigation_receives_metadata_for_its_destination(): void
    {
        $this->get('/')->assertOk();
        $this->get('/our-value', ['X-Inertia' => 'true', 'X-Requested-With' => 'XMLHttpRequest', 'X-Inertia-Version' => Inertia::getVersion()])
            ->assertOk()
            ->assertJsonPath('component', 'Values')
            ->assertJsonPath('props.seo.title', 'Nilai Kami | Integritas dalam Pajak & Akuntansi')
            ->assertJsonPath('props.seo.canonical', 'https://konsulin.test/our-value');
    }

    public function test_staging_is_not_indexable_and_does_not_load_analytics(): void
    {
        config(['seo.indexable' => false, 'seo.ga4_id' => 'G-TEST123']);
        $this->get('/')->assertOk()->assertInertia(fn (Assert $page) => $page
            ->where('seo.robots', 'noindex, nofollow')
            ->where('seo.analyticsId', null));
        $this->get('/robots.txt')->assertOk()->assertSee('Disallow: /', false)->assertDontSee('Sitemap:');
        $sitemap = simplexml_load_string($this->get('/sitemap.xml')->assertOk()->getContent());
        $this->assertCount(0, $sitemap->url);
    }

    public function test_live_pages_allow_indexing_and_verification_tags_are_escaped(): void
    {
        config(['seo.google_verification' => 'google-token', 'seo.bing_verification' => 'bing-token', 'seo.ga4_id' => 'G-TEST123']);
        $response = $this->get('/')->assertOk()->assertInertia(fn (Assert $page) => $page
            ->where('seo.robots', 'index, follow, max-image-preview:large')
            ->where('seo.analyticsId', 'G-TEST123'));
        $response->assertSee('<meta name="google-site-verification" content="google-token">', false)
            ->assertSee('<meta name="msvalidate.01" content="bing-token">', false);
        config(['seo.google_verification' => '\" onload=\"alert(1)', 'seo.ga4_id' => '\"><script>bad</script>']);
        $this->get('/')->assertOk()->assertDontSee('content="" onload=', false)
            ->assertInertia(fn (Assert $page) => $page->where('seo.analyticsId', null));
    }

    public function test_organization_uses_real_contact_details_without_ratings(): void
    {
        $organization = PageSeo::organization();
        $this->assertSame('Organization', $organization['@type']);
        $this->assertSame('info@konsulin.id', $organization['email']);
        $this->assertCount(3, $organization['sameAs']);
        $this->assertArrayNotHasKey('aggregateRating', $organization);
    }

    public function test_legacy_service_urls_redirect_once_to_relevant_current_pages(): void
    {
        foreach (config('seo.redirects') as $oldPath => $destination) {
            $this->get($oldPath)->assertStatus(301)->assertRedirect($destination);
            $this->get($destination)->assertOk();
        }
        $this->get('/layanan-dan-jasa/layanan-tidak-ada')->assertNotFound();
    }

    public function test_seo_check_reports_a_missing_public_sitemap(): void
    {
        config(['seo.url' => 'https://konsulin.id']);
        Http::fake([
            'https://konsulin.id/robots.txt' => Http::response("User-agent: *\nAllow: /\nSitemap: https://konsulin.id/sitemap.xml\n"),
            'https://konsulin.id/sitemap.xml' => Http::response('', 404),
        ]);
        $this->artisan('seo:check --live')->expectsOutputToContain('sitemap.xml publik belum memuat')->assertFailed();
    }

    public function test_tracking_tags_and_noscript_fallbacks_only_render_when_indexing_is_enabled(): void
    {
        config(['seo.gtm_id' => 'GTM-NMW5BC44', 'seo.meta_pixel_id' => '1096488599704639']);
        $this->get('/')->assertOk()->assertSee('https://connect.facebook.net/en_US/fbevents.js', false)
            ->assertSee('https://www.googletagmanager.com/ns.html?id=GTM-NMW5BC44', false)
            ->assertSee('https://www.facebook.com/tr?id=1096488599704639', false)
            ->assertInertia(fn (Assert $page) => $page
                ->where('seo.tagManagerId', 'GTM-NMW5BC44')
                ->where('seo.metaPixelId', '1096488599704639'));
        config(['seo.indexable' => false]);
        $this->get('/')->assertOk()->assertDontSee('https://connect.facebook.net/en_US/fbevents.js', false)
            ->assertDontSee('https://www.googletagmanager.com/ns.html', false)
            ->assertInertia(fn (Assert $page) => $page
                ->where('seo.tagManagerId', null)->where('seo.metaPixelId', null));
    }

    public function test_invalid_tracking_ids_cannot_inject_tags(): void
    {
        config(['seo.gtm_id' => '<script>bad</script>', 'seo.meta_pixel_id' => '123\" onload=\"bad']);
        $this->get('/')->assertOk()->assertDontSee('https://connect.facebook.net/en_US/fbevents.js', false)
            ->assertInertia(fn (Assert $page) => $page
                ->where('seo.tagManagerId', null)->where('seo.metaPixelId', null));
    }

    public function test_local_configuration_cannot_publish_loopback_social_urls(): void
    {
        foreach (['http://127.0.0.1:8073', 'http://localhost:8073', 'http://192.168.1.20', 'http://[::1]:8073'] as $url) {
            config(['seo.url' => $url]);
            $this->get('/tentang-kami')->assertOk()->assertInertia(fn (Assert $page) => $page
                ->where('seo.canonical', 'https://konsulin.id/tentang-kami')
                ->where('seo.image', 'https://konsulin.id/images/og-konsulin-share-v3.jpg'));
        }
    }

    public function test_whatsapp_and_meta_crawlers_receive_complete_preview_metadata_without_javascript(): void
    {
        foreach (['WhatsApp/2.24.0', 'facebookexternalhit/1.1'] as $agent) {
            foreach (PageSeo::sitemapUrls() as $url) {
                $response = $this->get(parse_url($url, PHP_URL_PATH), ['User-Agent' => $agent])->assertOk();
                $document = new DOMDocument;
                $document->loadHTML($response->getContent(), LIBXML_NOERROR | LIBXML_NOWARNING);
                $xpath = new DOMXPath($document);
                foreach (['og:title', 'og:description', 'og:image', 'og:url'] as $property) {
                    $nodes = $xpath->query('//head/meta[@property="'.$property.'"]');
                    $this->assertCount(1, $nodes);
                    $this->assertNotEmpty($nodes->item(0)->getAttribute('content'));
                    $this->assertLessThan(8192, strpos($response->getContent(), 'property="'.$property.'"'));
                }
                $this->assertSame('image/jpeg', $xpath->query('//head/meta[@property="og:image:type"]')->item(0)->getAttribute('content'));
                $this->assertSame('630', $xpath->query('//head/meta[@property="og:image:height"]')->item(0)->getAttribute('content'));
            }
        }
        $image = getimagesize(public_path('images/og-konsulin-share-v3.jpg'));
        $this->assertSame(1200, $image[0]);
        $this->assertSame(630, $image[1]);
        $this->assertSame('image/jpeg', $image['mime']);
    }
}

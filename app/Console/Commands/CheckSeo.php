<?php

namespace App\Console\Commands;

use App\Support\PageSeo;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CheckSeo extends Command
{
    protected $signature = 'seo:check {--live : Periksa robots.txt dan sitemap.xml pada domain yang dikonfigurasi}';

    protected $description = 'Periksa kesiapan indexing, sitemap, dan konfigurasi alat pencarian';

    public function handle(): int
    {
        $failed = false;
        $url = config('seo.url');
        $host = parse_url($url, PHP_URL_HOST);
        $indexable = config('seo.indexable');
        $this->line('Domain canonical: '.$url);
        $this->line('Halaman dalam sitemap: '.count(PageSeo::sitemapUrls()));

        if ($indexable) {
            if (parse_url($url, PHP_URL_SCHEME) !== 'https' || ! $host || $host === 'localhost' || ! str_contains($host, '.') || filter_var($host, FILTER_VALIDATE_IP) || str_ends_with($host, '.test') || str_ends_with($host, '.local')) {
                $this->error('SEO_INDEXABLE aktif, tetapi SEO_SITE_URL belum menggunakan domain publik HTTPS.');
                $failed = true;
            } else {
                $this->info('Indexing aktif untuk domain publik HTTPS.');
            }
        } else {
            $this->warn('Indexing dinonaktifkan. Ini sesuai untuk lokal/staging; aktifkan SEO_INDEXABLE pada production.');
            $failed = app()->environment('production');
        }

        foreach (['google_verification' => 'Verifikasi Google Search Console', 'bing_verification' => 'Verifikasi Bing Webmaster Tools', 'ga4_id' => 'Measurement ID Google Analytics 4', 'gtm_id' => 'Google Tag Manager', 'meta_pixel_id' => 'Meta Pixel'] as $key => $label) {
            config('seo.'.$key) ? $this->info($label.': dikonfigurasi.') : $this->warn($label.': belum dikonfigurasi.');
        }
        if (config('seo.ga4_id') && ! preg_match('/^G-[A-Z0-9]+$/', config('seo.ga4_id'))) {
            $this->error('Measurement ID GA4 harus berformat G-...');
            $failed = true;
        }
        $this->line('Isi Blog masih berupa halaman persiapan; tambahkan artikel asli untuk menjangkau topik pencarian baru.');

        if ($this->option('live')) {
            try {
                $robots = Http::timeout(10)->get(PageSeo::url('/robots.txt'));
                $sitemap = Http::timeout(10)->get(PageSeo::url('/sitemap.xml'));
                $xml = $sitemap->successful() ? @simplexml_load_string($sitemap->body(), options: LIBXML_NONET) : false;
                $locations = $xml ? array_map(fn ($node) => (string) $node->loc, iterator_to_array($xml->url, false)) : [];
                $expected = $indexable ? PageSeo::sitemapUrls() : [];
                sort($locations);
                sort($expected);
                if (! $robots->successful() || ($indexable && (! str_contains($robots->body(), 'Sitemap: '.PageSeo::url('/sitemap.xml')) || preg_match('/^Disallow:\s*\/\s*$/m', $robots->body())))) {
                    $this->error('robots.txt publik tidak sesuai konfigurasi.');
                    $failed = true;
                }
                if ($xml === false || $locations !== $expected) {
                    $this->error('sitemap.xml publik belum memuat daftar canonical yang sesuai.');
                    $failed = true;
                }
                if (! $failed) {
                    $this->info('robots.txt dan sitemap.xml publik sesuai dengan konfigurasi project.');
                }
            } catch (\Throwable) {
                $this->error('Pemeriksaan domain publik gagal. Periksa koneksi, DNS, dan deployment.');
                $failed = true;
            }
        }

        return $failed ? self::FAILURE : self::SUCCESS;
    }
}

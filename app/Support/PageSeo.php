<?php

namespace App\Support;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class PageSeo
{
    public static function url(string $path = '/'): string
    {
        $base = config('seo.url');
        $host = strtolower(parse_url($base, PHP_URL_HOST) ?? '');
        $localAddress = in_array($host, ['localhost', '::1', '[::1]'], true)
            || str_ends_with($host, '.localhost')
            || (filter_var($host, FILTER_VALIDATE_IP) && ! filter_var($host, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE));
        if (! filter_var($base, FILTER_VALIDATE_URL) || $localAddress || ! in_array(parse_url($base, PHP_URL_SCHEME), ['http', 'https'], true)) {
            $base = config('seo.fallback_url');
        }

        return rtrim($base, '/').'/'.ltrim($path, '/');
    }

    public static function forRequest(Request $request): array
    {
        $routeName = $request->route()?->getName();
        $pages = config('seo.pages');
        $metadata = $pages[$routeName] ?? null;
        $breadcrumbs = [['name' => 'Beranda', 'url' => self::url()]];
        $relatedLinks = [];
        $path = $request->getPathInfo();

        if ($routeName === 'blog.show') {
            $article = Article::published()->where('slug', $request->route('slug'))->firstOrFail();
            $metadata = ['title' => $article->seo_title ?: $article->title, 'description' => $article->seo_description ?: $article->excerpt, 'label' => $article->title];
            $path = route('blog.show', $article->slug, false);
            $breadcrumbs[] = ['name' => 'Blog', 'url' => self::url('/blog')];
            $relatedLinks = [['title' => 'Semua artikel', 'href' => route('blog', [], false)]];
        } elseif ($routeName === 'services.show') {
            $service = collect(PublicContent::services())->firstWhere('id', $request->route('service'));
            if (! $service) {
                return [];
            }
            $metadata = ['title' => $service['seo_title'], 'description' => $service['seo_description'], 'related' => $service['related_services']];
            $path = route('services.show', $service['id'], false);
            $metadata['label'] = $service['name'];
            $breadcrumbs[] = ['name' => 'Layanan Kami', 'url' => self::url('/layanan')];
            foreach ($metadata['related'] as $id) {
                $related = collect(PublicContent::services())->firstWhere('id', $id);
                if ($related) {
                    $relatedLinks[] = ['title' => $related['name'], 'href' => route('services.show', $id, false)];
                }
            }
        } elseif ($metadata) {
            $path = route($routeName, [], false);
            foreach ($metadata['related'] as $name) {
                $relatedLinks[] = ['title' => $pages[$name]['label'], 'href' => route($name, [], false)];
            }
        } else {
            return [];
        }

        $canonical = self::url($path);
        if ($routeName !== 'home') {
            $breadcrumbs[] = ['name' => $metadata['label'], 'url' => $canonical];
        }

        return [
            'title' => $metadata['title'],
            'description' => $metadata['description'],
            'canonical' => $canonical,
            'image' => self::url(config('seo.share_image')),
            'imageType' => 'image/jpeg',
            'imageWidth' => 1200,
            'imageHeight' => 630,
            'imageAlt' => 'Konsulin.id — Adi Putra & Partners, Kantor Jasa Akuntan & Konsultan Hukum Perpajakan',
            'robots' => config('seo.indexable') ? 'index, follow, max-image-preview:large' : 'noindex, nofollow',
            'analyticsId' => config('seo.indexable') && preg_match('/^G-[A-Z0-9]+$/', config('seo.ga4_id') ?? '') ? config('seo.ga4_id') : null,
            'tagManagerId' => config('seo.indexable') && preg_match('/^GTM-[A-Z0-9]+$/', config('seo.gtm_id') ?? '') ? config('seo.gtm_id') : null,
            'metaPixelId' => config('seo.indexable') && preg_match('/^\d{5,20}$/', config('seo.meta_pixel_id') ?? '') ? config('seo.meta_pixel_id') : null,
            'relatedLinks' => $relatedLinks,
            'relatedTitle' => $routeName === 'services.show' ? 'Layanan yang berkaitan' : 'Kenali Konsulin lebih lanjut',
            'schema' => $routeName === 'home' ? [
                '@context' => 'https://schema.org',
                '@type' => 'WebSite',
                'name' => 'Konsulin.id',
                'url' => $canonical,
            ] : [
                '@context' => 'https://schema.org',
                '@type' => 'BreadcrumbList',
                'itemListElement' => array_map(fn ($item, $index) => [
                    '@type' => 'ListItem',
                    'position' => $index + 1,
                    'name' => $item['name'],
                    'item' => $item['url'],
                ], $breadcrumbs, array_keys($breadcrumbs)),
            ],
        ];
    }

    public static function sitemapUrls(): array
    {
        $urls = array_map(fn ($name) => self::url(route($name, [], false)), array_keys(config('seo.pages')));
        foreach (PublicContent::services() as $service) {
            $urls[] = self::url(route('services.show', $service['id'], false));
        }

        if (Schema::hasTable('articles')) {
            foreach (Article::published()->pluck('slug') as $slug) {
                $urls[] = self::url(route('blog.show', $slug, false));
            }
        }

        return $urls;
    }

    public static function organization(): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            '@id' => self::url('/#organization'),
            'name' => PublicContent::settings()['brand_name'],
            'url' => self::url(),
            'logo' => self::url('/images/og-konsulin.webp'),
            'email' => PublicContent::settings()['email'],
            'telephone' => '+'.PublicContent::settings()['whatsapp_primary'],
            'sameAs' => array_values(array_filter(array_intersect_key(PublicContent::settings(), array_flip(['instagram', 'tiktok', 'linkedin'])))),
        ];
    }
}

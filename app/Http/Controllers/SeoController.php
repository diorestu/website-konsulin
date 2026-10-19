<?php

namespace App\Http\Controllers;

use App\Support\PageSeo;
use Illuminate\Http\Response;

class SeoController extends Controller
{
    public function sitemap(): Response
    {
        return response()->view('sitemap', ['urls' => config('seo.indexable') ? PageSeo::sitemapUrls() : []])
            ->header('Content-Type', 'application/xml; charset=UTF-8')
            ->header('X-Robots-Tag', 'noindex');
    }

    public function robots(): Response
    {
        $rules = config('seo.indexable')
            ? "User-agent: *\nAllow: /\n\nSitemap: ".PageSeo::url('/sitemap.xml')."\n"
            : "User-agent: *\nDisallow: /\n";

        return response($rules)
            ->header('Content-Type', 'text/plain; charset=UTF-8');
    }
}

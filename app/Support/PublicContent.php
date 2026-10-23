<?php

namespace App\Support;

use App\Models\Service;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Schema;

class PublicContent
{
    /** @return array<int, array<string, mixed>> */
    public static function services(): array
    {
        $request = request();
        if ($request->attributes->has('public_services')) {
            return $request->attributes->get('public_services');
        }
        if (! Schema::hasTable('services')) {
            $services = array_map(static fn (array $service): array => [
                ...$service,
                'seo_title' => config('seo.services.'.$service['id'].'.title'),
                'seo_description' => config('seo.services.'.$service['id'].'.title').'. '.$service['summary'].' Hubungi Konsulin.',
                'related_services' => config('seo.services.'.$service['id'].'.related'),
            ], config('konsulin.services'));
            $request->attributes->set('public_services', $services);

            return $services;
        }

        $services = Service::where('is_active', true)->orderBy('sort_order')->orderBy('id')->get()
            ->map(static fn (Service $service, int $index): array => [
                'id' => $service->slug, 'number' => str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT),
                'name' => $service->name, 'summary' => $service->summary, 'description' => $service->description,
                'scope' => $service->scope, 'preparation' => $service->preparation,
                'seo_title' => $service->seo_title ?: $service->name,
                'seo_description' => $service->seo_description ?: $service->summary,
                'related_services' => $service->related_services,
            ])->all();
        $request->attributes->set('public_services', $services);

        return $services;
    }

    /** @return array<string, mixed> */
    public static function settings(): array
    {
        $request = request();
        if ($request->attributes->has('public_settings')) {
            return $request->attributes->get('public_settings');
        }
        $defaults = [...config('site'), 'humi_company' => (string) config('services.humi.company')];
        $settings = Schema::hasTable('site_settings') ? array_replace($defaults, SiteSetting::find('website')?->value ?? []) : $defaults;
        $request->attributes->set('public_settings', $settings);

        return $settings;
    }

    /** @return array<string, mixed> */
    public static function publicSettings(): array
    {
        $settings = self::settings();
        unset($settings['humi_company']);

        return $settings;
    }
}

<?php

namespace App\Http\Controllers;

use App\Support\PublicContent;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use Inertia\Response;
use UnexpectedValueException;

class CareerController extends Controller
{
    public function index(Request $request): Response
    {
        $page = max(1, $request->integer('page', 1));
        $careers = [];
        $pagination = ['current_page' => $page, 'last_page' => $page, 'total' => 0];
        $unavailable = false;

        try {
            $response = Http::acceptJson()->connectTimeout(3)->timeout(8)
                ->get(rtrim(config('services.humi.url'), '/').'/api/v1/companies/'.rawurlencode((string) PublicContent::settings()['humi_company']).'/careers', [
                    'page' => $page,
                    'per_page' => 12,
                ])->throw();

            $items = $response->json('data.items');
            $sourcePagination = $response->json('data.pagination');
            if ($response->json('success') !== true || ! is_array($items) || ! array_is_list($items)
                || ! is_array($sourcePagination) || ! isset($sourcePagination['current_page'], $sourcePagination['last_page'], $sourcePagination['total'])) {
                throw new UnexpectedValueException('Invalid Humi career response.');
            }

            foreach ($items as $item) {
                if (! is_array($item) || ! isset($item['id'], $item['title']) || ! is_string($item['title'])) {
                    throw new UnexpectedValueException('Invalid Humi career item.');
                }
                $applyUrl = $item['apply_url'] ?? null;
                $careers[] = [
                    'id' => $item['id'],
                    'title' => $item['title'],
                    'description' => $this->plainText($item['description'] ?? null),
                    'requirements' => $this->plainText($item['requirements'] ?? null),
                    'benefits' => $this->plainText($item['benefits'] ?? null),
                    'location' => $this->plainText($item['location'] ?? null),
                    'employment_type' => $this->plainText($item['employment_type'] ?? null),
                    'workplace_type' => $this->plainText($item['workplace_type'] ?? null),
                    'closing_date' => $this->plainText($item['closing_date'] ?? null),
                    'apply_url' => is_string($applyUrl) && filter_var($applyUrl, FILTER_VALIDATE_URL)
                        && in_array(parse_url($applyUrl, PHP_URL_SCHEME), ['https', 'http'], true) ? $applyUrl : null,
                ];
            }
            $pagination = [
                'current_page' => max(1, (int) $sourcePagination['current_page']),
                'last_page' => max(1, (int) $sourcePagination['last_page']),
                'total' => max(0, (int) $sourcePagination['total']),
            ];
        } catch (ConnectionException|RequestException|UnexpectedValueException $exception) {
            report($exception);
            $careers = [];
            $unavailable = true;
        }

        return Inertia::render('Careers', [
            'careers' => $careers,
            'pagination' => $pagination,
            'careersUnavailable' => $unavailable,
        ]);
    }

    private function plainText(mixed $value): string
    {
        if (! is_string($value)) {
            return '';
        }

        return trim(html_entity_decode(strip_tags(preg_replace('/<\/?(?:p|div|li|br)\b[^>]*>/i', "\n", $value)), ENT_QUOTES | ENT_HTML5, 'UTF-8'));
    }
}

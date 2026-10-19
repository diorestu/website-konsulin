<?php

namespace App\Http\Middleware;

use App\Support\PageSeo;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    protected $rootView = 'app';

    public function share(Request $request): array
    {
        return [...parent::share($request),
            'seo' => fn () => PageSeo::forRequest($request),
            'consultationReceived' => fn () => $request->session()->get('consultation_received', false),
        ];
    }
}

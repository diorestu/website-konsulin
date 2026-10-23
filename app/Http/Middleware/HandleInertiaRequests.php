<?php

namespace App\Http\Middleware;

use App\Support\PageSeo;
use App\Support\PublicContent;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    protected $rootView = 'app';

    public function share(Request $request): array
    {
        $this->rootView = $request->is('admin', 'admin/*') ? 'admin' : 'app';
        if ($this->rootView === 'admin') {

            return [...parent::share($request),
                'seo' => null,
                'site' => null,
                'activeServiceIds' => [],
                'admin' => fn () => $request->user()?->only(['name', 'email']),
                'flash' => ['success' => fn () => $request->session()->get('success')],
            ];
        }

        return [...parent::share($request),
            'admin' => null,
            'flash' => null,
            'activeServiceIds' => fn () => array_column(PublicContent::services(), 'id'),
            'site' => fn () => PublicContent::publicSettings(),
            'seo' => fn () => PageSeo::forRequest($request),
            'consultationReceived' => fn () => $request->session()->get('consultation_received', false),
        ];
    }
}

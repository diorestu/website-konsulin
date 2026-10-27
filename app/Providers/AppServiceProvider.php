<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Inertia\ExceptionResponse;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('access-admin', fn (User $user): bool => $user->is_admin === true);

        Inertia::handleExceptionsUsing(function (ExceptionResponse $response): ?ExceptionResponse {
            if ($response->statusCode() !== 404 || $response->request->is('api/*') || $response->request->expectsJson()) {
                return null;
            }

            return $response->rootView('error')->render(
                $response->request->is('admin', 'admin/*') ? 'Admin/NotFound' : 'NotFound',
                [
                    'seo' => null,
                    'homeUrl' => route('home', [], false),
                    'servicesUrl' => route('services.index', [], false),
                ],
            );
        });
    }
}

<?php

use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

$selectedService = static fn (Request $request): string => in_array($request->query('layanan'), array_column(config('konsulin.services'), 'id'), true)
    ? $request->query('layanan') : '';

Route::get('/sitemap.xml', [SeoController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [SeoController::class, 'robots'])->name('robots');

foreach (config('seo.redirects') as $oldPath => $destination) {
    Route::permanentRedirect($oldPath, $destination);
}

Route::get('/', fn (Request $request) => Inertia::render('Home', [
    'services' => config('konsulin.services'),
    'selectedService' => $selectedService($request),
]))->name('home');
Route::get('/tentang-kami', fn () => Inertia::render('About'))->name('about');
Route::get('/our-value', fn () => Inertia::render('Values'))->name('values');
Route::get('/layanan', fn () => Inertia::render('Services', [
    'services' => config('konsulin.services'),
]))->name('services.index');
Route::get('/layanan/{service}', [ServiceController::class, 'show'])->name('services.show');
Route::get('/blog', fn () => Inertia::render('Blog'))->name('blog');
Route::get('/kontak', fn (Request $request) => Inertia::render('Contact', [
    'services' => config('konsulin.services'),
    'selectedService' => $selectedService($request),
]))->name('contact');
Route::get('/privasi', fn () => Inertia::render('Privacy'))->name('privacy');
Route::post('/konsultasi', [ConsultationController::class, 'store'])
    ->middleware('throttle:5,1')->name('consultation.store');

<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\ServiceController;
use App\Support\PublicContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

$selectedService = static fn (Request $request): string => in_array($request->query('layanan'), array_column(PublicContent::services(), 'id'), true)
    ? $request->query('layanan') : '';

Route::get('/sitemap.xml', [SeoController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [SeoController::class, 'robots'])->name('robots');

foreach (config('seo.redirects') as $oldPath => $destination) {
    Route::permanentRedirect($oldPath, $destination);
}

Route::get('/', fn (Request $request) => Inertia::render('Home', [
    'services' => PublicContent::services(),
    'selectedService' => $selectedService($request),
]))->name('home');
Route::get('/tentang-kami', fn () => Inertia::render('About'))->name('about');
Route::get('/our-value', fn () => Inertia::render('Values'))->name('values');
Route::get('/layanan', fn () => Inertia::render('Services', [
    'services' => PublicContent::services(),
]))->name('services.index');
Route::get('/layanan/{service}', [ServiceController::class, 'show'])->name('services.show');
Route::get('/blog', fn () => Inertia::render('Blog'))->name('blog');
Route::get('/karir', [CareerController::class, 'index'])->name('careers.index');
Route::get('/kontak', fn (Request $request) => Inertia::render('Contact', [
    'services' => PublicContent::services(),
    'selectedService' => $selectedService($request),
]))->name('contact');
Route::get('/privasi', fn () => Inertia::render('Privacy'))->name('privacy');
Route::post('/konsultasi', [ConsultationController::class, 'store'])
    ->middleware('throttle:5,1')->name('consultation.store');

Route::prefix('admin')->group(function (): void {
    Route::get('/login', [AuthController::class, 'create'])->middleware('guest')->name('login');
    Route::post('/login', [AuthController::class, 'store'])->middleware(['guest', 'throttle:5,1'])->name('admin.login.store');
    Route::middleware(['auth', 'can:access-admin'])->name('admin.')->group(function (): void {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
        Route::resource('services', App\Http\Controllers\Admin\ServiceController::class)->except(['show', 'destroy']);
        Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
        Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
        Route::get('/consultations', [App\Http\Controllers\Admin\ConsultationController::class, 'index'])->name('consultations.index');
        Route::get('/consultations/{consultation}', [App\Http\Controllers\Admin\ConsultationController::class, 'show'])->whereNumber('consultation')->name('consultations.show');
        Route::patch('/consultations/{consultation}', [App\Http\Controllers\Admin\ConsultationController::class, 'update'])->whereNumber('consultation')->name('consultations.update');
        Route::get('/account', [AccountController::class, 'edit'])->name('account.edit');
        Route::put('/account/password', [AccountController::class, 'updatePassword'])->name('account.password');
    });
});

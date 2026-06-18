<?php

use App\Http\Controllers\Admin\DashboardConntroller;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',                     [FrontController::class, 'index'])->name('homepage');

Route::get('storage-link', function () {
    $targetFolder = base_path().'/storage/app/public';
    $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
    symlink($targetFolder,$linkFolder);
    echo 'Symlink process successfully completed';
});

Route::get('/tentang-kami',         [FrontController::class, 'about'])->name('about');
Route::get('/our-value',            [FrontController::class, 'value'])->name('value');
Route::get('/layanan-dan-jasa',     [FrontController::class, 'services'])->name('service');
Route::get('/testimoni',            [FrontController::class, 'testimoni'])->name('testimonial');
Route::get('/kontak',               [FrontController::class, 'contact'])->name('contact');
Route::post('/kirim-pesan',         [FrontController::class, 'kirim_pesan'])->name('send.message');

Route::prefix('layanan-dan-jasa')->group(function () {
    Route::get('/pembuatan-laporan-keuangan',           [FrontController::class, 'laporan_keuangan'])->name('services.laporan_keuangan');
    Route::get('/perencanaan-model-usaha',              [FrontController::class, 'model_usaha'])->name('services.model_usaha');
    Route::get('/pengurusan-pelaporan-pajak',           [FrontController::class, 'pelaporan_pajak'])->name('services.pelaporan_pajak');
    Route::get('/pendirian-legaltias-pt-perorangan',    [FrontController::class, 'pendirian_pt'])->name('services.pendirian_pt');
    Route::get('/pengurusan-npwp',                      [FrontController::class, 'npwp'])->name('services.npwp');
    Route::get('/businees-advisory',                    [FrontController::class, 'business_advisory'])->name('services.business_advisory');
    Route::get('/pengurusan-sertifikat-elektronik',     [FrontController::class, 'pengurusan_sertifikat'])->name('services.pengurusan_sertifikat');
    Route::get('/branding-usaha',                       [FrontController::class, 'branding'])->name('services.branding');
    Route::get('/pendirian-pt-badan',                   [FrontController::class, 'pendirian_pt_badan'])->name('services.pendirian_pt_badan');
    Route::get('/pendirian-cv',                         [FrontController::class, 'pendirian_cv'])->name('services.pendirian_cv');
    Route::get('/pendirian-yayasan',                    [FrontController::class, 'pendirian_yayasan'])->name('services.pendirian_yayasan');
    Route::get('/sewa-virtual-office',                  [FrontController::class, 'virtual_office'])->name('services.virtual_office');




});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('admin')->group(function () {
        // DASHBOARD
        Route::get('/dashboard',                        [DashboardConntroller::class, 'index'])->name('admin.dashboard');
        // WEBPAGE SECTION
        Route::post('module-webpage/delimages/{id}',    [AdminPageController::class, 'deleteImage'])->name("module-webpage.delimages");
        Route::post('module-webpage/upload/{id}',       [AdminPageController::class, 'uploadImages'])->name('module-webpage.upload');
        Route::resource('module-webpage',               AdminPageController::class);
        // SLIDER
        Route::post('module-slider/delimages/{id}',     [AdminSliderController::class, 'deleteImage'])->name("module-slider.delimages");
        Route::post('module-slider/upload',             [AdminSliderController::class, 'uploadImages'])->name('module-slider.upload');
        Route::resource('module-slider',                AdminSliderController::class);
        // NEWS
        Route::post('module-news/delimages/{id}',       [AdminNewsController::class, 'deleteImage'])->name("module-news.delimages");
        Route::post('module-news/upload/{id}',          [AdminNewsController::class, 'uploadImages'])->name('module-news.upload');
        Route::resource('module-news',                  AdminNewsController::class);
        // PROJECT
        Route::get('module-project/frontimg/{id}',      [AdminProjectController::class, 'frontImage'])->name("module-project.frontimg");
        Route::post('module-project/delimages/{id}',    [AdminProjectController::class, 'deleteImage'])->name("module-project.delimages");
        Route::post('module-project/upload/{id}',       [AdminProjectController::class, 'uploadImages'])->name('module-project.upload');
        Route::resource('module-project',               AdminProjectController::class);
        // CONTACT
        Route::resource('module-contact',               AdminContactController::class);
        // SETTING & PROFILE
        Route::resource('settings',                     CompanyController::class);
        Route::post('profile/upload',                   [ProfileController::class, 'uploadImages'])->name('profile.upload');
        Route::get('/profile',                          [ProfileController::class, 'edit'])->name('profile.edit');
        Route::get('/change-password',                  [ProfileController::class, 'changePassword'])->name('profile.changePwd');
        Route::patch('/profile',                        [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile',                       [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

require __DIR__ . '/auth.php';
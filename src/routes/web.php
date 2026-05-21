<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\ChiSiamoController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

// ── Sito pubblico ─────────────────────────────────────────────
Route::get('/',          [PageController::class, 'home'])->name('home');
Route::get('/chi-siamo', [ChiSiamoController::class, 'index'])->name('chi-siamo');

Route::get('/servizi', [PageController::class, 'servizi'])->name('servizi');

Route::get('/servizi/{slug}', [PageController::class, 'categoria'])->name('servizi.categoria')
    ->where('slug', 'segreteria-operativa|comunicazione|contabilita-veryfico|consulenze|fundraising');

Route::get('/servizi/{categoria}/{slug}', [ServiceController::class, 'show'])->name('servizi.show')
    ->where('categoria', 'segreteria-operativa|comunicazione|contabilita-veryfico|consulenze|fundraising');

Route::get('/news',        [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

// Newsletter
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])
    ->name('newsletter.subscribe')
    ->middleware('throttle:6,1');

Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/cookie-policy',  [PageController::class, 'cookiePolicy'])->name('cookie-policy');
Route::get('/note-legali',    [PageController::class, 'noteLegali'])->name('note-legali');
Route::get('/sitemap.xml',    [SitemapController::class, 'index'])->name('sitemap');

// ── Admin ──────────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {

    // Auth (guest)
    Route::get('/login',  [Admin\AuthController::class, 'showLogin'])->name('login')->middleware('guest');
    Route::post('/login', [Admin\AuthController::class, 'login'])->middleware('guest');
    Route::post('/logout', [Admin\AuthController::class, 'logout'])->name('logout');

    // Authenticated
    Route::middleware('admin')->group(function () {
        Route::get('/', [Admin\DashboardController::class, 'index'])->name('dashboard');

        Route::resource('news',       Admin\NewsController::class)->except('show');
        Route::resource('categories', Admin\NewsCategoryController::class)->except('show');
        Route::resource('services',   Admin\AdminServiceController::class)->except('show');

        Route::resource('team',       Admin\TeamMemberController::class)
            ->except('show')
            ->parameters(['team' => 'id']);

        Route::resource('governance', Admin\GovernanceMemberController::class)
            ->except('show')
            ->parameters(['governance' => 'id']);

        Route::get('users',           [Admin\UserController::class, 'index'])->name('users.index');
        Route::get('users/password',  [Admin\UserController::class, 'editPassword'])->name('users.password');
        Route::put('users/password',  [Admin\UserController::class, 'updatePassword'])->name('users.password.update');
    });
});

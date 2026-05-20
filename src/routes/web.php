<?php

use App\Http\Controllers\ChiSiamoController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/',          [PageController::class, 'home'])->name('home');
Route::get('/chi-siamo', [ChiSiamoController::class, 'index'])->name('chi-siamo');
Route::get('/servizi',   [PageController::class, 'servizi'])->name('servizi');

Route::get('/servizi/{slug}', [PageController::class, 'categoria'])->name('servizi.categoria')
    ->where('slug', 'segreteria-operativa|comunicazione|contabilita-veryfico|consulenze|fundraising');

Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/cookie-policy',  [PageController::class, 'cookiePolicy'])->name('cookie-policy');
Route::get('/note-legali',    [PageController::class, 'noteLegali'])->name('note-legali');

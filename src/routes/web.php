<?php

use App\Models\News;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $latestNews = News::published()->latest('published_at')->with('category')->take(3)->get();
    return view('pages.home', compact('latestNews'));
});

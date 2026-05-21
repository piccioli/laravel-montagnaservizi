<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Service;

class SitemapController extends Controller
{
    public function index()
    {
        $articles = News::published()
            ->latest('published_at')
            ->get(['slug', 'published_at', 'updated_at']);

        $services = Service::orderBy('category_slug')
            ->orderBy('sort_order')
            ->get(['category_slug', 'slug', 'updated_at']);

        $content = view('sitemap', compact('articles', 'services'))->render();

        return response('<?xml version="1.0" encoding="UTF-8"?>' . "\n" . $content)
            ->header('Content-Type', 'application/xml; charset=utf-8');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Service;

class PageController extends Controller
{
    public function home()
    {
        $latestNews = News::published()->latest('published_at')->with('category')->take(3)->get();
        return view('pages.home', compact('latestNews'));
    }

    public function servizi()
    {
        return view('pages.servizi');
    }

    public function categoria(string $slug)
    {
        $allowed = ['segreteria-operativa', 'comunicazione', 'contabilita-veryfico', 'consulenze', 'fundraising'];

        abort_if(! in_array($slug, $allowed, true), 404);

        $services = Service::forCategory($slug)->orderBy('sort_order')->get();
        return view("pages.servizi.{$slug}", compact('services'));
    }

    public function privacyPolicy()
    {
        return view('pages.privacy-policy');
    }

    public function cookiePolicy()
    {
        return view('pages.cookie-policy');
    }

    public function noteLegali()
    {
        return view('pages.note-legali');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $categories  = NewsCategory::orderBy('name')->get();
        $activeSlug  = $request->query('categoria');

        $query = News::published()->latest('published_at')->with('category');

        if ($activeSlug) {
            $query->whereHas('category', fn ($q) => $q->where('slug', $activeSlug));
        }

        $articles = $query->paginate(12)->withQueryString();

        return view('pages.news.index', compact('articles', 'categories', 'activeSlug'));
    }

    public function show(string $slug)
    {
        $article = News::published()
            ->where('slug', $slug)
            ->with('category')
            ->firstOrFail();

        return view('pages.news.show', compact('article'));
    }
}

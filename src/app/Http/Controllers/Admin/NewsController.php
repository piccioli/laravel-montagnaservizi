<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $articles = News::with('category')->latest('updated_at')->paginate(15);
        return view('admin.news.index', compact('articles'));
    }

    public function create()
    {
        $categories = NewsCategory::orderBy('name')->get();
        return view('admin.news.form', ['article' => null, 'categories' => $categories]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'            => ['required', 'string', 'max:255'],
            'slug'             => ['required', 'string', 'max:255', 'unique:news,slug'],
            'news_category_id' => ['nullable', 'exists:news_categories,id'],
            'excerpt'          => ['nullable', 'string', 'max:500'],
            'body'             => ['required', 'string'],
            'cover_image'      => ['nullable', 'image', 'max:4096'],
            'published_at'     => ['nullable', 'date'],
        ]);

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('news', 'public');
        }

        News::create($data);
        return redirect()->route('admin.news.index')->with('success', 'Articolo creato.');
    }

    public function edit(News $news)
    {
        $categories = NewsCategory::orderBy('name')->get();
        return view('admin.news.form', ['article' => $news, 'categories' => $categories]);
    }

    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title'            => ['required', 'string', 'max:255'],
            'slug'             => ['required', 'string', 'max:255', 'unique:news,slug,' . $news->id],
            'news_category_id' => ['nullable', 'exists:news_categories,id'],
            'excerpt'          => ['nullable', 'string', 'max:500'],
            'body'             => ['required', 'string'],
            'cover_image'      => ['nullable', 'image', 'max:4096'],
            'published_at'     => ['nullable', 'date'],
        ]);

        if ($request->hasFile('cover_image')) {
            if ($news->cover_image) {
                Storage::disk('public')->delete($news->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('news', 'public');
        }

        $news->update($data);
        return redirect()->route('admin.news.index')->with('success', 'Articolo aggiornato.');
    }

    public function destroy(News $news)
    {
        if ($news->cover_image) {
            Storage::disk('public')->delete($news->cover_image);
        }
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Articolo eliminato.');
    }
}

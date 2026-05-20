<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsCategoryController extends Controller
{
    public function index()
    {
        $categories = NewsCategory::withCount('news')->orderBy('name')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.form', ['category' => null]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'slug' => ['required', 'string', 'max:150', 'unique:news_categories,slug'],
        ]);

        NewsCategory::create($data);
        return redirect()->route('admin.categories.index')->with('success', 'Categoria creata.');
    }

    public function edit(NewsCategory $category)
    {
        return view('admin.categories.form', compact('category'));
    }

    public function update(Request $request, NewsCategory $category)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'slug' => ['required', 'string', 'max:150', 'unique:news_categories,slug,' . $category->id],
        ]);

        $category->update($data);
        return redirect()->route('admin.categories.index')->with('success', 'Categoria aggiornata.');
    }

    public function destroy(NewsCategory $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Categoria eliminata.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminServiceController extends Controller
{
    private const CATEGORIES = [
        'segreteria-operativa' => 'Segreteria Operativa',
        'comunicazione'        => 'Comunicazione',
        'contabilita-veryfico' => 'Contabilità Veryfico',
        'consulenze'           => 'Consulenze',
        'fundraising'          => 'Fundraising',
    ];

    public function index()
    {
        $services    = Service::orderBy('category_slug')->orderBy('sort_order')->paginate(20);
        $categoryMap = self::CATEGORIES;
        return view('admin.services.index', compact('services', 'categoryMap'));
    }

    public function create()
    {
        $categories = self::CATEGORIES;
        return view('admin.services.form', ['service' => null, 'categories' => $categories]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_slug' => ['required', 'string', 'in:' . implode(',', array_keys(self::CATEGORIES))],
            'slug'          => ['required', 'string', 'max:255', 'unique:services,slug'],
            'title'         => ['required', 'string', 'max:255'],
            'subtitle'      => ['nullable', 'string', 'max:255'],
            'description'   => ['required', 'string', 'max:500'],
            'body'          => ['nullable', 'string'],
            'sort_order'    => ['nullable', 'integer', 'min:0'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        Service::create($data);
        return redirect()->route('admin.services.index')->with('success', 'Servizio creato.');
    }

    public function edit($id)
    {
        $service    = Service::findOrFail($id);
        $categories = self::CATEGORIES;
        return view('admin.services.form', compact('service', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $data = $request->validate([
            'category_slug' => ['required', 'string', 'in:' . implode(',', array_keys(self::CATEGORIES))],
            'slug'          => ['required', 'string', 'max:255', 'unique:services,slug,' . $service->id],
            'title'         => ['required', 'string', 'max:255'],
            'subtitle'      => ['nullable', 'string', 'max:255'],
            'description'   => ['required', 'string', 'max:500'],
            'body'          => ['nullable', 'string'],
            'sort_order'    => ['nullable', 'integer', 'min:0'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $service->update($data);
        return redirect()->route('admin.services.index')->with('success', 'Servizio aggiornato.');
    }

    public function destroy($id)
    {
        Service::findOrFail($id)->delete();
        return redirect()->route('admin.services.index')->with('success', 'Servizio eliminato.');
    }
}

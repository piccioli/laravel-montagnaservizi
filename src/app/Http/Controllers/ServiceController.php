<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    private const CATEGORY_LABELS = [
        'segreteria-operativa' => 'Segreteria Operativa',
        'comunicazione'        => 'Comunicazione',
        'contabilita-veryfico' => 'Contabilità Veryfico',
        'consulenze'           => 'Consulenze',
        'fundraising'          => 'Fundraising',
    ];

    public function show(string $categorySlug, string $slug)
    {
        abort_if(! array_key_exists($categorySlug, self::CATEGORY_LABELS), 404);

        $service      = Service::where('category_slug', $categorySlug)
            ->where('slug', $slug)
            ->firstOrFail();
        $categoryName = self::CATEGORY_LABELS[$categorySlug];

        return view('pages.servizi.show', compact('service', 'categorySlug', 'categoryName'));
    }
}

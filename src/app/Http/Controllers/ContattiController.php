<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContattiController extends Controller
{
    public function index(Request $request)
    {
        $source      = $request->query('source', '');
        $typeformUrl = config('services.typeform.url');

        return view('pages.contatti', compact('typeformUrl', 'source'));
    }
}

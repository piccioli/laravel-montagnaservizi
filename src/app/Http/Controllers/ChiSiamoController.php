<?php

namespace App\Http\Controllers;

use App\Models\GovernanceMember;
use App\Models\TeamMember;

class ChiSiamoController extends Controller
{
    public function index()
    {
        $teamMembers       = TeamMember::active()->ordered()->get();
        $governanceMembers = GovernanceMember::active()->ordered()->get();

        return view('pages.chi-siamo', compact('teamMembers', 'governanceMembers'));
    }
}

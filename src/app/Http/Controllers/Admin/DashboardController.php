<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GovernanceMember;
use App\Models\News;
use App\Models\Service;
use App\Models\TeamMember;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'news_total'       => News::count(),
            'news_published'   => News::published()->count(),
            'services'         => Service::count(),
            'team_members'     => TeamMember::where('is_active', true)->count(),
            'governance'       => GovernanceMember::where('is_active', true)->count(),
        ];

        $latestNews = News::latest('updated_at')->with('category')->take(5)->get();

        return view('admin.dashboard', compact('stats', 'latestNews'));
    }
}

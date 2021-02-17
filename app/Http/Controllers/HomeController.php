<?php

namespace App\Http\Controllers;

use App\Models\Admin\Blog;
use App\Models\Admin\Category;
use App\Models\Admin\PanelMode;
use App\Models\Admin\ServiceSection;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\WorkshopPreview;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Retrieving models
        $site_info = SiteInfo::first();
        $blogs = Blog::orderBy('id', 'desc')
            ->take(6)
            ->get();
        $projects_count = WorkshopPreview::all()->count();
        $blogs_count = Blog::all()->count();
        $services_count = ServiceSection::all()->count();

        // Initial int value
        $i = 1 ;

        return view('admin-panel.dashboard', compact('site_info','blogs',
            'projects_count', 'blogs_count', 'services_count', 'i'));
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Breadcrumbs;
use App\Models\Admin\Category;
use App\Models\Admin\ColorPicker;
use App\Models\Admin\GoogleAnalytic;
use App\Models\Admin\OtherSection;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\Social;
use App\Models\Frontend\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieving models
        $site_infos = SiteInfo::first();
        $google_analytic = GoogleAnalytic::first();
        $breadcrumb = Breadcrumbs::first();
        $color_picker = ColorPicker::first();
        $social_media = Social::all();
        $blogs = Blog::join("categories",'categories.id', '=', 'blogs.category_id')
            ->where('categories.status',1)
            ->orderBy('blogs.id', 'desc')
            ->paginate(6);
        $other_sections = OtherSection::all();

        // For Section Enable/Disable
        foreach ($other_sections as $other_section) {
            $section_arr[$other_section->section] = $other_section->status;
        }

        return view('frontend.blog-page.index', compact('site_infos', 'google_analytic', 'social_media',
            'breadcrumb', 'color_picker',  'blogs', 'section_arr'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // Retrieving models
        $site_infos = SiteInfo::first();
        $google_analytic = GoogleAnalytic::first();
        $breadcrumb = Breadcrumbs::first();
        $color_picker = ColorPicker::first();
        $social_media = Social::all();

        $blog = Blog::where('blogs.slug', '=', $slug)
            ->firstOrFail();

        // Update view column
        Blog::find($blog->id)->update(
            ['view' => $blog->view + 1]
        );
        $blog_categories = Blog::select(DB::raw('count(*) as category_count, category_id'))
            ->groupBy('category_id')
            ->get();
        $recent_posts = Blog::join("categories",'categories.id', '=', 'blogs.category_id')
            ->where('categories.status',1)
            ->orderBy('blogs.id', 'desc')
            ->take(3)
            ->get();
        $comments = Comment::where('blog_id', '=', $blog->id)->where('approval', '=', 1)->get();
        $other_sections = OtherSection::all();

        // For Section Enable/Disable
        foreach ($other_sections as $other_section) {
            $section_arr[$other_section->section] = $other_section->status;
        }

        return view('frontend.blog-page.show', compact('site_infos', 'google_analytic', 'breadcrumb', 'color_picker',
            'social_media', 'blog', 'blog_categories', 'recent_posts', 'comments', 'section_arr'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $category_name
     * @return \Illuminate\Http\Response
     */
    public function category_show($category_name)
    {
        // Retrieving models
        $site_infos = SiteInfo::first();
        $google_analytic = GoogleAnalytic::first();
        $breadcrumb = Breadcrumbs::first();
        $color_picker = ColorPicker::first();
        $social_media = Social::all();
        $blogs = Blog::join("categories",'categories.id', '=', 'blogs.category_id')
            ->where('categories.category_slug', '=', $category_name)
            ->orderBy('blogs.id', 'desc')
            ->paginate(6);
        $category =  Category::where('category_slug', '=', $category_name)->first();

        $other_sections = OtherSection::all();

        // For Section Enable/Disable
        foreach ($other_sections as $other_section) {
            $section_arr[$other_section->section] = $other_section->status;
        }

        if (count($blogs) < 1) {
            abort(404);
        }

        return view('frontend.blog-page.category-show', compact('site_infos', 'google_analytic', 'social_media',
            'breadcrumb', 'color_picker', 'blogs', 'category', 'section_arr'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // Retrieving models
        $site_infos = SiteInfo::first();
        $google_analytic = GoogleAnalytic::first();
        $breadcrumb = Breadcrumbs::first();
        $color_picker = ColorPicker::first();
        $social_media = Social::all();

        // Search
        $search = $request->get('search');

        $blogs = Blog::join("categories",'categories.id', '=', 'blogs.category_id')
        ->where('categories.status',1)
        ->where('title', 'like', '%'.$search.'%')
        ->orderBy('blogs.id', 'desc')
        ->get();

        $other_sections = OtherSection::all();

        // For Section Enable/Disable
        foreach ($other_sections as $other_section) {
            $section_arr[$other_section->section] = $other_section->status;
        }

        return view('frontend.blog-page.search-index', compact ('site_infos', 'google_analytic', 'social_media',
            'breadcrumb', 'color_picker',  'blogs', 'section_arr'));
    }

}

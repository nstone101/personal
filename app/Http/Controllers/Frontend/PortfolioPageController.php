<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Breadcrumbs;
use App\Models\Admin\ColorPicker;
use App\Models\Admin\GoogleAnalytic;
use App\Models\Admin\OtherSection;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\Social;
use App\Models\Admin\WorkshopCategory;
use App\Models\Admin\WorkshopPreview;
use App\Models\Admin\WorkshopSlider;
use App\Models\Frontend\Comment;

class PortfolioPageController extends Controller
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
        $workshop_projects = WorkshopPreview::join("workshop_categories",'workshop_categories.id', '=', 'workshop_previews.workshop_category_id')
            ->where('workshop_categories.status',1)
            ->orderBy('workshop_previews.id', 'desc')
            ->get();
        $grouped_workshop_categories = WorkshopCategory::orderBy('order', 'asc')->get()->where('status', 1)->groupBy('category_name');
        $other_sections = OtherSection::all();

        // For Section Enable/Disable
        foreach ($other_sections as $other_section) {
            $section_arr[$other_section->section] = $other_section->status;
        }

        return view('frontend.portfolio-page.index', compact('site_infos', 'google_analytic', 'social_media',
            'breadcrumb', 'color_picker',  'workshop_projects', 'grouped_workshop_categories', 'section_arr'));
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
        $breadcrumb = Breadcrumbs::first();
        $color_picker = ColorPicker::first();
        $social_media = Social::all();
        $workshop_project = WorkshopPreview::where('workshop_previews.slug', '=', $slug)
            ->firstOrFail();
        $workshop_sliders = WorkshopSlider::where('workshop_preview_id', $workshop_project->id)->get();
        $comments = Comment::where('workshop_preview_id', '=', $workshop_project->id)->where('approval', '=', 1)->get();
        $other_sections = OtherSection::all();

        // For Section Enable/Disable
        foreach ($other_sections as $other_section) {
            $section_arr[$other_section->section] = $other_section->status;
        }

        return view('frontend.portfolio-page.show', compact('site_infos', 'breadcrumb', 'color_picker',
            'social_media', 'workshop_project', 'workshop_sliders', 'comments', 'section_arr'));
    }
}

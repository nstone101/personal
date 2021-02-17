<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Breadcrumbs;
use App\Models\Admin\ColorPicker;
use App\Models\Admin\Gallery;
use App\Models\Admin\GalleryCategory;
use App\Models\Admin\GoogleAnalytic;
use App\Models\Admin\OtherSection;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\Social;
use Illuminate\Http\Request;

class GalleryPageController extends Controller
{

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
        $gallery_categories = GalleryCategory::all();
        $gallery_category = GalleryCategory::where('slug', '=', $slug)
            ->firstOrFail();

        $galleries = Gallery::where('gallery_category_id', $gallery_category->id)
            ->where('status', 1)
            ->orderBy('order', 'asc')->paginate(12);

        $other_sections = OtherSection::all();

        // For Section Enable/Disable
        foreach ($other_sections as $other_section) {
            $section_arr[$other_section->section] = $other_section->status;
        }

        return view('frontend.gallery-page.show', compact('site_infos', 'google_analytic',
            'breadcrumb', 'color_picker', 'social_media', 'section_arr', 'galleries', 'gallery_categories',
            'gallery_category'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function category_select(Request $request)
    {
        // Get Category Name
        $gallery_category_name = $request->get('gallery_category_name');

        return redirect()->route('gallery-page.show', $gallery_category_name);
    }


}

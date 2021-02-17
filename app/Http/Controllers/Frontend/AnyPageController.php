<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\AnyPage;
use App\Models\Admin\Breadcrumbs;
use App\Models\Admin\ColorPicker;
use App\Models\Admin\GoogleAnalytic;
use App\Models\Admin\OtherSection;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\Social;
use Illuminate\Http\Request;

class AnyPageController extends Controller
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
        $any_page = AnyPage::where('any_pages.slug', '=', $slug)
            ->firstOrFail();

        $other_sections = OtherSection::all();

        // For Section Enable/Disable
        foreach ($other_sections as $other_section) {
            $section_arr[$other_section->section] = $other_section->status;
        }

        return view('frontend.any-page.show', compact('site_infos', 'google_analytic', 'breadcrumb',
            'color_picker', 'social_media', 'any_page', 'section_arr'));
    }
}

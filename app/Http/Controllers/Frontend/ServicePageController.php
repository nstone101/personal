<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Breadcrumbs;
use App\Models\Admin\ColorPicker;
use App\Models\Admin\GoogleAnalytic;
use App\Models\Admin\ServiceSection;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\Social;
use App\Models\Admin\OtherSection;
use App\Models\Admin\Sponsor;
use App\Models\Admin\WhyChooseSection;
use App\Models\Admin\WhyChooseSectionItem;
use Illuminate\Http\Request;

class ServicePageController extends Controller
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
        $services = ServiceSection::orderBy('order', 'asc')->get();
        $breadcrumb = Breadcrumbs::first();
        $color_picker = ColorPicker::first();
        $why_choose_section = WhyChooseSection::first();
        $why_choose_items = WhyChooseSectionItem::all();
        $sponsors = Sponsor::all();
        $social_media = Social::all();
        $other_sections = OtherSection::all();

        // For Section Enable/Disable
        foreach ($other_sections as $other_section) {
            $section_arr[$other_section->section] = $other_section->status;
        }

        return view('frontend.service-page.index', compact('site_infos', 'services', 'breadcrumb',
            'color_picker', 'why_choose_section', 'why_choose_items', 'sponsors', 'social_media', 'section_arr',
            'google_analytic'));
    }

}

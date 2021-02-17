<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\AboutSection;
use App\Models\Admin\AboutSectionInfo;
use App\Models\Admin\AnyPage;
use App\Models\Admin\ClientSection;
use App\Models\Admin\ColorPicker;
use App\Models\Admin\CounterSection;
use App\Models\Admin\CustomSection;
use App\Models\Admin\ExternalUrl;
use App\Models\Admin\FixedContent;
use App\Models\Admin\Gallery;
use App\Models\Admin\GalleryCategory;
use App\Models\Admin\GoogleAnalytic;
use App\Models\Admin\HomepageVersion;
use App\Models\Admin\ResumeSection;
use App\Models\Admin\ServiceSection;
use App\Models\Admin\SkillSection;
use App\Models\Admin\SkillSectionItem;
use App\Models\Admin\SliderView;
use App\Models\Admin\Blog;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\Section;
use App\Models\Admin\OtherSection;
use App\Models\Admin\Social;
use App\Models\Admin\StaticView;
use App\Models\Admin\TeamSection;
use App\Models\Admin\VideoView;
use App\Models\Admin\WorkshopCategory;
use App\Models\Admin\WorkshopPreview;

class HomeController extends Controller
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
        $homepage_version = HomepageVersion::first();
        $fixed_content = FixedContent::first();
        $static_view = StaticView::first();
        $sliders = SliderView::orderBy('order', 'asc')->get();
        $video_view = VideoView::first();
        $google_analytic = GoogleAnalytic::first();
        $about_section = AboutSection::first();
        $color_picker = ColorPicker::first();
        $about_section_infos = AboutSectionInfo::orderBy('order', 'asc')->get();
        $special_sections = CustomSection::orderBy('order', 'asc')->get();
        $resume_boxs = ResumeSection::orderBy('order', 'asc')->get();
        $sections = Section::all();
        $other_sections = OtherSection::all();
        $skill_section = SkillSection::first();
        $skill_items = SkillSectionItem::orderBy('order', 'asc')->get();
        $counters = CounterSection::orderBy('id', 'desc')
            ->take(4)
            ->get();
        $services = ServiceSection::orderBy('order', 'asc')->get();
        $social_media = Social::all();
        $workshop_projects = WorkshopPreview::join("workshop_categories",'workshop_categories.id', '=', 'workshop_previews.workshop_category_id')
            ->where('workshop_categories.status',1)
            ->orderBy('workshop_previews.id', 'desc')
            ->get();
        $grouped_workshop_categories = WorkshopCategory::orderBy('order', 'asc')->get()->where('status', 1)->groupBy('category_name');
        $clients = ClientSection::where('approval', 1)
            ->orderBy('id', 'desc')
            ->take(10)
            ->get();
        $teams = TeamSection::orderBy('id', 'desc')
        ->take(3)
        ->get();
        $recent_posts = Blog::join("categories",'categories.id', '=', 'blogs.category_id')
            ->where('categories.status', 1)
            ->orderBy('blogs.id', 'desc')
            ->take(3)
            ->get();
        $featured_posts = Blog::join("categories",'categories.id', '=', 'blogs.category_id')
            ->where('categories.status', 1)
            ->where('blogs.featured', 1)
            ->orderBy('blogs.id', 'desc')
            ->take(6)
            ->get();
        $gallery_categories = GalleryCategory::where('status', 1)
            ->orderBy('id', 'desc')
            ->get();
        $any_pages = AnyPage::where('status', 1)
            ->orderBy('order', 'asc')
            ->get();
        $external_url = ExternalUrl::first();

        // For Section Enable/Disable
        foreach ($sections as $section) {
            $section_arr[$section->section] = $section->status;
        }

        foreach ($other_sections as $other_section) {
            $section_arr[$other_section->section] = $other_section->status;
        }

        if ($section_arr['maintenance_mode'] === 1) {
            // Maintenance mode view
            return view('frontend.maintenance-mode.index', compact('section_arr','site_infos'));

        } else {
            // Get homepage
            return view('frontend.home.index', compact('color_picker','site_infos', 'homepage_version',
                'fixed_content', 'static_view', 'sliders', 'video_view', 'google_analytic', 'about_section',
                'about_section_infos', 'resume_boxs', 'sections', 'other_sections', 'skill_section', 'skill_items',
                'counters', 'services', 'social_media', 'workshop_projects', 'grouped_workshop_categories', 'clients',
                'teams', 'recent_posts', 'section_arr', 'special_sections', 'featured_posts', 'gallery_categories',
                'any_pages', 'external_url'));
        }

    }

}

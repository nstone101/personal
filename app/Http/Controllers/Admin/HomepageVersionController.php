<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\HomepageVersion;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\SliderView;
use App\Models\Admin\StaticView;
use App\Models\Admin\VideoView;
use Illuminate\Http\Request;

class HomepageVersionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving models
        $site_info = SiteInfo::first();
        $homepage_version = HomepageVersion::first();
        $static_view= StaticView::all();
        $sliders = SliderView::all();
        $video = VideoView::all();

        return view('admin-panel.homepage-version.create', compact('site_info',  'homepage_version', 'static_view',
            'sliders', 'video'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Retrieving models
        $static_view= StaticView::all();
        $sliders = SliderView::all();
        $video = VideoView::all();

        // Get All Request
        $input = $request->all();

        if ($input['choose_version'] != 7) {
            // Form validation
            if (count($static_view) > 0 && count($sliders) > 0 && count($video) > 0) {
                $request->validate([
                    'choose_version' => 'integer|required|in:1,2,3,4,5,6',
                ]);
            } elseif (count($static_view) > 0 && count($video) > 0) {
                $request->validate([
                    'choose_version' => 'integer|required|in:1,3,4,5,6',
                ]);
            } elseif (count($static_view) > 0 && count($sliders) > 0) {
                $request->validate([
                    'choose_version' => 'integer|required|in:1,2,4,5,6',
                ]);
            } elseif (count($video) > 0 && count($sliders) > 0) {
                $request->validate([
                    'choose_version' => 'integer|required|in:2,3',
                ]);
            } elseif (count($static_view) > 0){
                $request->validate([
                    'choose_version' => 'integer|required|in:1,4,5,6',
                ]);
            } elseif (count($sliders) > 0) {
                $request->validate([
                    'choose_version' => 'integer|required|in:2',
                ]);
            } else {
                $request->validate([
                    'choose_version' => 'integer|required|in:3',
                ]);
            }
        }


        // Record to database
        HomepageVersion::firstOrCreate(['choose_version' => $input['choose_version']]);

        return redirect()->route('homepage-version.create')
            ->with('success','Created  successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Retrieving models
        $static_view= StaticView::all();
        $sliders = SliderView::all();
        $video = VideoView::all();

        // Get All Request
        $input = $request->all();

        if ($input['choose_version'] != 7) {
            // Form validation
            if (count($static_view) > 0 && count($sliders) > 0 && count($video) > 0) {
                $request->validate([
                    'choose_version' => 'integer|required|in:1,2,3,4,5,6',
                ]);
            } elseif (count($static_view) > 0 && count($video) > 0) {
                $request->validate([
                    'choose_version' => 'integer|required|in:1,3,4,5,6',
                ]);
            } elseif (count($static_view) > 0 && count($sliders) > 0) {
                $request->validate([
                    'choose_version' => 'integer|required|in:1,2,4,5,6',
                ]);
            } elseif (count($video) > 0 && count($sliders) > 0) {
                $request->validate([
                    'choose_version' => 'integer|required|in:2,3',
                ]);
            } elseif (count($static_view) > 0){
                $request->validate([
                    'choose_version' => 'integer|required|in:1,4,5,6',
                ]);
            } elseif (count($sliders) > 0) {
                $request->validate([
                    'choose_version' => 'integer|required|in:2',
                ]);
            } else {
                $request->validate([
                    'choose_version' => 'integer|required|in:3',
                ]);
            }
        }

        // Update to database
        HomepageVersion::find($id)->update($input);

        return redirect()->route('homepage-version.create')
            ->with('success','Created  successfully.');
    }


}

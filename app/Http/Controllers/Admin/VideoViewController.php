<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\VideoView;
use Illuminate\Http\Request;

class VideoViewController extends Controller
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
        $video_view = VideoView::first();

        return view('admin-panel.hero-setting.video-view.create', compact('site_info', 'video_view'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        $request->validate([
            'video_link'   =>  'required|max:255',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        VideoView::firstOrCreate(['video_link' => $input['video_link']]);

        return redirect()->route('video-view.create')
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
        // Form validation
        $request->validate([
            'video_link'   =>  'required|max:255',
        ]);

        // Get All Request
        $input = $request->all();

        // Update to database
        VideoView::find($id)->update($input);

        return redirect()->route('video-view.create')
            ->with('success','Updated  successfully.');
    }

}

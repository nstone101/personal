<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\StaticView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StaticViewController extends Controller
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
        $static_view = StaticView::first();

        return view('admin-panel.hero-setting.static-view.create', compact('site_info', 'static_view'));
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
            'static_image' => 'required|image|mimes:png,jpeg,jpg|max:2048',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('static_image')){

            // Get image file
            $static_image = $request->file('static_image');

            // Folder path
            $folder ='fibonacci/adminpanel/assets/img/bg/';

            // Make image name
            $static_image_name =  time().'-'.$static_image->getClientOriginalName();

            // Upload image
            $static_image->move($folder, $static_image_name);

            // Set input
            $input['static_image']= $static_image_name;

        }

        // Record to database
        StaticView::firstOrCreate(['static_image' => $input['static_image']]);

        return redirect()->route('static-view.create')
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
            'static_image' => 'image|mimes:png,jpeg,jpg|max:2048',
        ]);

        // Get a model
        $static_view = StaticView::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('static_image')){

            // Get image file
            $static_image = $request->file('static_image');

            // Folder path
            $folder ='fibonacci/adminpanel/assets/img/bg/';

            // Make image name
            $static_image_name =  time().'-'.$static_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$static_view->static_image));

            // Upload image
            $static_image->move($folder, $static_image_name);

            // Set input
            $input['static_image']= $static_image_name;

        }

        // Update to database
        StaticView::find($id)->update($input);

        return redirect()->route('static-view.create')
            ->with('success','Updated  successfully.');
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\SiteInfo;
use App\Models\Admin\SliderView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class SliderViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieving models
        $site_info = SiteInfo::first();
        $slider_views = SliderView::all();

        return view('admin-panel.hero-setting.slider-view.index', compact( 'site_info', 'slider_views'));
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
            'slider_image'   =>  'required|image|mimes:png,jpeg,jpg|max:2048',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('slider_image')){

            // Get image file
            $slider_image_file = $request->file('slider_image');

            // Folder path
            $folder ='fibonacci/adminpanel/assets/img/slider/';

            // Make image name
            $slider_image_name =  time().'-'.$slider_image_file->getClientOriginalName();

            // Upload image
            $slider_image_file->move($folder, $slider_image_name);

            // Set input
            $input['slider_image']= $slider_image_name;

        }

        if($input['order'] == '') {
            //Default order
            $input['order'] = 0;
        }

        // Record to database
        SliderView::firstOrCreate([
            'slider_image' => $input['slider_image'],
            'order' => $input['order']
        ]);

        return redirect()->route('slider-view.index')
            ->with('success','Created  successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Retrieving models
        $site_info = SiteInfo::first();
        $slider_view = SliderView::find($id);

        return view('admin-panel.hero-setting.slider-view.edit', compact('slider_view', 'site_info'));
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
            'slider_image'   =>  'image|mimes:png,jpeg,jpg|max:2048',
        ]);

        // Retrieving a model
        $slider_view = SliderView::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('slider_image')){

            // Get image file
            $slider_image_file = $request->file('slider_image');

            // Folder path
            $folder ='fibonacci/adminpanel/assets/img/slider/';

            // Make image name
            $slider_image_name =  time().'-'.$slider_image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$slider_view->slider_image));

            // Upload image
            $slider_image_file->move($folder, $slider_image_name);

            // Set input
            $input['slider_image']= $slider_image_name;

        }

        if($input['order'] == '') {
            //Default order
            $input['order'] = 0;
        }

        // Record to database
        SliderView::find($id)->update($input);

        return redirect()->route('slider-view.index')
            ->with('success','Updated  successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Retrieve a model
        $slider_view = SliderView::find($id);

        // Folder path
        $folder ='fibonacci/adminpanel/assets/img/slider/';

        // Delete Image
        File::delete(public_path($folder.$slider_view->slider_image));

        // Delete record
        $slider_view->delete();

        return redirect()->route('slider-view.index')
            ->with('success','Deleted  successfully.');
    }
}

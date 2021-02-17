<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\WorkshopPreview;
use App\Models\Admin\WorkshopSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WorkshopSliderController extends Controller
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
        $projects = WorkshopPreview::all();

        if(count($projects) > 0) {
            // Retrieving models
            $sliders = WorkshopSlider::all()->sortByDesc('id');

            // Initial int value
            $i = 1 ;

            return view('admin-panel.workshop.slider.index', compact('site_info', 'projects', 'sliders', 'i'));

        } else{
            return redirect()->route('workshop-project.index')
                ->with('success','Please create a project.');
        }

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
            'workshop_preview_id'   =>  'required',
            'slider_image'   =>  'required|image|mimes:jpeg,jpg,png|max:2048',
            'order'   =>  'integer',
        ]);

        // Get All Request
        $input = $request->all();

        if($input['order'] == '') {
            //Default order
            $input['order'] = 0;
        }

        if($request->hasFile('slider_image')){

            // Get image file
            $slider_image_file = $request->file('slider_image');

            // Folder path
            $folder = 'fibonacci/adminpanel/assets/img/portfolio/slider/';

            // Make image name
            $slider_image_name =  time().'-'.$slider_image_file->getClientOriginalName();

            // Upload file
            $slider_image_file->move($folder, $slider_image_name);

            // Set input
            $input['slider_image']= $slider_image_name;

        }

        // Record to database
        WorkshopSlider::create($input);

        return redirect()->route('workshop-slider.index')
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
        $projects = WorkshopPreview::all();
        $slider = WorkshopSlider::find($id);

        return view('admin-panel.workshop.slider.edit', compact('projects', 'slider', 'site_info'));
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
            'workshop_preview_id'   =>  'required',
            'slider_image'   =>  'image|mimes:jpeg,jpg,png|max:2048',
            'order'   =>  'integer',
        ]);

        $slider = WorkshopSlider::find($id);

        // Get All Request
        $input = $request->all();

        if($input['order'] == '') {
            //Default order
            $input['order'] = 0;
        }

        if($request->hasFile('slider_image')){

            // Get image file
            $slider_image_file = $request->file('slider_image');

            // Folder path
            $folder = 'fibonacci/adminpanel/assets/img/portfolio/slider/';

            // Make image name
            $slider_image_name =  time().'-'.$slider_image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$slider->slider_image));

            // Upload file
            $slider_image_file->move($folder, $slider_image_name);

            // Set input
            $input['slider_image']= $slider_image_name;

        }

        // Update to database
        WorkshopSlider::find($id)->update($input);

        return redirect()->route('workshop-slider.index')
            ->with('success','Updated successfully.');
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
        $slider = WorkshopSlider::find($id);

        // Folder path
        $folder = 'fibonacci/adminpanel/assets/img/portfolio/slider/';

        // Delete Image
        File::delete(public_path($folder.$slider->slider_image));

        // Delete record
        $slider->delete();

        return redirect()->route('workshop-slider.index')
            ->with('success','Deleted successfully.');
    }
}

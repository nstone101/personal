<?php

namespace App\Http\Controllers\Admin;


use App\Models\Admin\AboutSection;
use App\Models\Admin\AboutSectionInfo;
use App\Models\Admin\SiteInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;


class AboutSectionController extends Controller
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
        $about_section = AboutSection::first();
        $infos = AboutSectionInfo::all();

        // Start int value
        $i = "1";

        return view('admin-panel.about-section.create', compact('site_info', 'about_section', 'infos', 'i'));
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
            'title'   =>  'required|max:255',
            'about_me'   =>  'required',
            'about_image'   =>  'required|image|mimes:png,jpeg,jpg|max:2048',
            'video_link'   =>  'max:255',
            'cv_file'   =>  'mimes:pdf|max:2048',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('about_image') || $request->hasFile('cv_file')){

            // Get image file
            $about_image_file = $request->file('about_image');

            // Folder path
            $folder ='fibonacci/adminpanel/assets/img/about/';

            // Make image name
            $about_image_name =  time().'-'.$about_image_file->getClientOriginalName();

            // Upload image
            $about_image_file->move($folder, $about_image_name);

            // Set input
            $input['about_image']= $about_image_name;
        }
        if( $request->hasFile('cv_file')){

            // Get cv file
            $cv_file = $request->file('cv_file');

            // Folder path
            $folder ='fibonacci/adminpanel/assets/img/about/';

            // Make cv name
            $cv_file_name =  time().'-'.$cv_file->getClientOriginalName();

            // Upload file
            $cv_file->move($folder, $cv_file_name);

            // Set input
            $input['cv_file']= $cv_file_name;
        } else {
            // Set input
            $input['cv_file']= null;
        }

        // Record to database
        AboutSection::firstOrCreate([
            'title' => $input['title'],
            'about_me' => $input['about_me'],
            'about_image' => $input['about_image'],
            'video_link' => $input['video_link'],
            'cv_file' => $input['cv_file']
        ]);

        return redirect()->route('about-section.create')
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
            'title'   =>  'required|max:255',
            'about_me'   =>  'required',
            'about_image'   =>  'image|mimes:png,jpeg,jpg|max:2048',
            'video_link'   =>  'max:255',
            'cv_file'   =>  'mimes:pdf|max:2048',
        ]);

        // Get breadcrumbs
        $about_section = AboutSection::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('about_image')){

            // Get image file
            $about_image_file = $request->file('about_image');

            // Folder path
            $folder ='fibonacci/adminpanel/assets/img/about/';

            // Make image name
            $about_image_name =  time().'-'.$about_image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$about_section->about_image));

            // Upload image
            $about_image_file->move($folder, $about_image_name);

            // Set input
            $input['about_image']= $about_image_name;
        }
        if($request->hasFile('cv_file')){

            // Get cv file
            $cv_file = $request->file('cv_file');

            // Folder path
            $folder ='fibonacci/adminpanel/assets/img/about/';

            // Make image name
            $cv_file_name =  time().'-'.$cv_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$about_section->cv_file));

            // Upload image
            $cv_file->move($folder, $cv_file_name);

            // Set input
            $input['cv_file']= $cv_file_name;
        }


        // Update to database
        AboutSection::find($id)->update($input);

        return redirect()->route('about-section.create')
            ->with('success','Updated  successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_info(Request $request)
    {
        // Form validation
        $request->validate([
            'name'   =>  'required|max:255',
            'description'   =>  'required|max:255',
            'order'   =>  'integer',
        ]);

        // Get All Request
        $input = $request->all();

        if($input['order'] == '') {
            //Default order
            $input['order'] = 0;
        }

        // Record to database
        AboutSectionInfo::create($input);

        return redirect()->route('about-section.create')
            ->with('success','Created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_info($id)
    {
        // Retrieving models
        $site_info = SiteInfo::first();
        $info = AboutSectionInfo::find($id);

        return view('admin-panel.about-section.edit', compact('info', 'site_info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_info(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'name'   =>  'required|max:255',
            'description'   =>  'required|max:255',
            'order'   =>  'integer',
        ]);

        // Get All Request
        $input = $request->all();

        if($input['order'] == '') {
            //Default order
            $input['order'] = 0;
        }

        // Record to database
        AboutSectionInfo::find($id)->update($input);

        return redirect()->route('about-section.create')
            ->with('success','Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_info($id)
    {
        // Retrieve a model
        $info = AboutSectionInfo::find($id);

        // Delete record
        $info->delete();

        return redirect()->route('about-section.create')
            ->with('success','Deleted  successfully.');
    }


}

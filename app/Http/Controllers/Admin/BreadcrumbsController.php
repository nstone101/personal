<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Breadcrumbs;
use App\Models\Admin\SiteInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class BreadcrumbsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving models
        $breadcrumbs = Breadcrumbs::first();
        $site_info = SiteInfo::first();

        return view('admin-panel.breadcrumb.create', compact('breadcrumbs', 'site_info'));
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
            'breadcrumb_image' => 'required|image|mimes:png,jpeg,jpg|max:2048',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('breadcrumb_image')){

            // Get image file
            $breadcrumb_image = $request->file('breadcrumb_image');

            // Folder path
            $folder ='fibonacci/adminpanel/assets/img/breadcrumb/';

            // Make image name
            $breadcrumb_image_name =  time().'-'.$breadcrumb_image->getClientOriginalName();

            // Upload image
            $breadcrumb_image->move($folder, $breadcrumb_image_name);

            // Set input
            $input['breadcrumb_image']= $breadcrumb_image_name;

        } else {
            return redirect()->route('breadcrumbs.create');
        }

        // Record to database
        Breadcrumbs::firstOrCreate(['breadcrumb_image' => $input['breadcrumb_image']]);

        return redirect()->route('breadcrumbs.create')
            ->with('success','Uploaded  successfully.');
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
            'breadcrumb_image' => 'image|mimes:png,jpeg,jpg|max:2048',
        ]);

        // Get breadcrumbs
        $breadcrumbs = Breadcrumbs::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('breadcrumb_image')){

            // Get image file
            $breadcrumb_image = $request->file('breadcrumb_image');

            // Folder path
            $folder ='fibonacci/adminpanel/assets/img/breadcrumb/';

            // Make image name
            $breadcrumb_image_name =  time().'-'.$breadcrumb_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$breadcrumbs->breadcrumb_image));

            // Upload image
            $breadcrumb_image->move($folder, $breadcrumb_image_name);

            // Set input
            $input['breadcrumb_image']= $breadcrumb_image_name;

        } else {
            return redirect()->route('breadcrumbs.create');
        }

        // Update to database
        Breadcrumbs::find($id)->update($input);

        return redirect()->route('breadcrumbs.create')
            ->with('success','Uploaded  successfully.');
    }

}

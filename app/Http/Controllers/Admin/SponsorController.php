<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\SiteInfo;
use App\Models\Admin\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class SponsorController extends Controller
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
        $sponsors = Sponsor::all();

        return view('admin-panel.sponsor.index', compact('site_info','sponsors'));
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
            'sponsor_image'   =>  'required|image|mimes:png|max:300'
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('sponsor_image')){

            // Get image file
            $sponsor_image = $request->file('sponsor_image');

            // Folder path
            $folder ='fibonacci/adminpanel/assets/img/partner/';

            // Make image name
            $sponsor_image_name =  time().'-'.$sponsor_image->getClientOriginalName();

            // Upload image
            $sponsor_image->move($folder, $sponsor_image_name);

            // Set input
            $input['sponsor_image']= $sponsor_image_name;

        }

        // Record to database
        Sponsor::firstOrCreate([
            'sponsor_image' => $input['sponsor_image']
        ]);

        return redirect()->route('sponsor.index')
            ->with('success','Created successfully.');
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
        $sponsor = Sponsor::find($id);

        // Folder path
        $folder ='fibonacci/adminpanel/assets/img/partner/';

        // Delete Image
        File::delete(public_path($folder.$sponsor->sponsor_image));

        // Delete record
        $sponsor->delete();

        return redirect()->route('sponsor.index')
            ->with('success','Deleted  successfully.');
    }
}

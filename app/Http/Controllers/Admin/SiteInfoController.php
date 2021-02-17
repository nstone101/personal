<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\SiteInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class SiteInfoController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving a model
        $site_info = SiteInfo::first();

        return view('admin-panel.site-info.create', compact('site_info'));
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
            'copyright'     =>  'required|max:255',
            'favicon'     =>  'required|mimes:ico,png|max:300',
            'white_logo'     =>  'required|image|mimes:png,svg|max:300',
            'colored_logo'     =>  'required|image|mimes:png,svg|max:300',
            'footer_logo'     =>  'required|image|mimes:png,svg|max:300',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('favicon') || $request->hasFile('white_logo') || $request->hasFile('colored_logo') || $request->hasFile('footer_logo')){

            // Get image file
            $favicon = $request->file('favicon');
            $white_logo = $request->file('white_logo');
            $colored_logo = $request->file('colored_logo');
            $footer_logo = $request->file('footer_logo');

            // Folder path
            $folder ='fibonacci/adminpanel/assets/img/icon/';

            if(isset($favicon)) {
                // Make image name
                $favicon_name =  time().'1-'.$favicon->getClientOriginalName();

                // Upload image
                $favicon->move($folder, $favicon_name);

                // Set input
                $input['favicon']= $favicon_name;
            }
            if (isset($white_logo)) {
                // Make image name
                $white_logo_name =  time().'2-'.$white_logo->getClientOriginalName();

                // Upload image
                $white_logo->move($folder, $white_logo_name);

                // Set input
                $input['white_logo']= $white_logo_name;
            }
            if(isset($colored_logo)) {
                // Make image name
                $colored_logo_name =  time().'3-'.$colored_logo->getClientOriginalName();

                // Upload image
                $colored_logo->move($folder, $colored_logo_name);

                // Set input
                $input['colored_logo']= $colored_logo_name;
            }
            if(isset($footer_logo)) {
                // Make image name
                $footer_logo_name =  time().'4-'.$footer_logo->getClientOriginalName();

                // Upload image
                $footer_logo->move($folder, $footer_logo_name);

                // Set input
                $input['footer_logo']= $footer_logo_name;
            }

        } else {
          return redirect()->route('site-info.create');
        }

        // Record to database
        SiteInfo::firstOrCreate(
            ['copyright' => $input['copyright']],
            [
                'favicon' => $input['favicon'],
                'white_logo' => $input['white_logo'],
                'colored_logo' => $input['colored_logo'],
                'footer_logo' => $input['footer_logo']
            ]
        );

        return redirect()->route('site-info.create')
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
            'copyright'     =>  'required|max:255',
            'favicon'     =>  'mimes:ico,png|max:300',
            'white_logo'     =>  'image|mimes:png,svg|max:300',
            'colored_logo'     =>  'image|mimes:png,svg|max:300',
            'footer_logo'     =>  'image|mimes:png,svg|max:300',
        ]);

        // Get site info
        $site_info = SiteInfo::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('favicon') || $request->hasFile('white_logo') || $request->hasFile('colored_logo') || $request->hasFile('footer_logo')){

            // Get image file
            $favicon = $request->file('favicon');
            $white_logo = $request->file('white_logo');
            $colored_logo = $request->file('colored_logo');
            $footer_logo = $request->file('footer_logo');

            // Folder path
            $folder ='fibonacci/adminpanel/assets/img/icon/';

            if(isset($favicon)) {
                // Make image name
                $favicon_name =  time().'1-'.$favicon->getClientOriginalName();

                // Delete Image
                File::delete(public_path($folder.$site_info->favicon));

                // Upload image
                $favicon->move($folder, $favicon_name);

                // Set input
                $input['favicon']= $favicon_name;
            }
            if (isset($white_logo)) {
                // Make image name
                $white_logo_name =  time().'2-'.$white_logo->getClientOriginalName();

                // Delete Image
                File::delete(public_path($folder.$site_info->white_logo));

                // Upload image
                $white_logo->move($folder, $white_logo_name);

                // Set input
                $input['white_logo']= $white_logo_name;
            }
            if(isset($colored_logo)) {
                // Make image name
                $colored_logo_name =  time().'3-'.$colored_logo->getClientOriginalName();

                // Delete Image
                File::delete(public_path($folder.$site_info->colored_logo));

                // Upload image
                $colored_logo->move($folder, $colored_logo_name);

                // Set input
                $input['colored_logo']= $colored_logo_name;
            }
            if(isset($footer_logo)) {
                // Make image name
                $footer_logo_name =  time().'4-'.$footer_logo->getClientOriginalName();

                // Delete Image
                File::delete(public_path($folder.$site_info->footer_logo));

                // Upload image
                $footer_logo->move($folder, $footer_logo_name);

                // Set input
                $input['footer_logo']= $footer_logo_name;
            }

        }

        // Update to database
        SiteInfo::find($site_info->id)->update($input);

        return redirect()->route('site-info.create')
            ->with('success','Updated  successfully.');
    }

}

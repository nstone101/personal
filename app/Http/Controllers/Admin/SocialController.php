<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\SiteInfo;
use App\Models\Admin\Social;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieving models
        $socials = Social::all();
        $site_info = SiteInfo::first();

        return view('admin-panel.social-media.index', compact('site_info', 'socials'));
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
            'social_media'   =>  'required|max:255',
            'link'   =>  'max:255',
            'status'   =>  'integer|max:1',
        ]);

        // Get All Request
        $input = $request->all();

        if($input['status'] == '') {
            //Default status
            $input['status'] = 1;
        }

        // Record to database
        Social::firstOrCreate([
            'social_media' => $input['social_media'],
            'link' => $input['link'],
            'status' => $input['status']
        ]);

        return redirect()->route('social-media.index')
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
        // Retrieve a model
        $social = Social::find($id);

        return view('admin-panel.social-media.edit', compact('social'));
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
            'social_media'   =>  'required|max:255',
            'link'   =>  'max:255',
            'status'   =>  'integer|max:1',
        ]);

        // Get All Request
        $input = $request->all();

        if($input['status'] == '') {
            //Default status
            $input['status'] = 1;
        }

        // Update to database
        Social::find($id)->update($input);

        return redirect()->route('social-media.index')
            ->with('success','Updated  successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_status($id)
    {
        //Find a model
        $social = Social::find($id);

        if ($social->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        // Update to database
        Social::find($id)->update(['status' => $status]);

        return redirect()->route('social-media.index')
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
        $social = Social::find($id);

        // Delete record
        $social->delete();

        return redirect()->route('social-media.index')
            ->with('success','Deleted  successfully.');
    }

}

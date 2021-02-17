<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Seo;
use App\Models\Admin\SiteInfo;
use Illuminate\Http\Request;

class SeoController extends Controller
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
        $seo = Seo::first();

        return view('admin-panel.seo.create', compact('site_info', 'seo'));
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
            'site_name'   =>  'required|max:70',
            'site_description'   =>  'required|max:150',
            'site_keywords'   =>  'required',
            'fb_app_id'   =>  'max:70',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        Seo::firstOrCreate([
            'site_name' => $input['site_name'],
            'site_description' => $input['site_description'],
            'site_keywords' => $input['site_keywords'],
            'fb_app_id' => $input['fb_app_id']
        ]);

        return redirect()->route('seo.create')
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
            'site_name'   =>  'required|max:70',
            'site_description'   =>  'required|max:150',
            'site_keywords'   =>  'required',
            'fb_app_id'   =>  'max:70',
        ]);

        // Get All Request
        $input = $request->all();

        // Update to database
        Seo::find($id)->update($input);

        return redirect()->route('seo.create')
            ->with('success','Updated  successfully.');
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ServiceSection;
use App\Models\Admin\SiteInfo;
use Illuminate\Http\Request;

class ServiceSectionController extends Controller
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
        $services = ServiceSection::all();

        // Initial int value
        $i = 1 ;

        return view('admin-panel.service-section.index', compact('site_info','services', 'i'));
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
            'icon'   =>  'required|max:255',
            'title'   =>  'required|max:255',
            'description'   =>  'required',
            'order'   =>  'integer',
        ]);

        // Get All Request
        $input = $request->all();

        if($input['order'] == '') {
            //Default order
            $input['order'] = 0;
        }

        // Record to database
        ServiceSection::firstOrCreate([
            'icon' => $input['icon'],
            'title' => $input['title'],
            'description' => $input['description'],
            'order' => $input['order']
        ]);

        return redirect()->route('service-section.index')
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
        $service = ServiceSection::find($id);

        return view('admin-panel.service-section.edit', compact('service', 'site_info'));
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
            'icon'   =>  'required|max:255',
            'title'   =>  'required|max:255',
            'description'   =>  'required',
            'order'   =>  'integer',
        ]);

        // Get All Request
        $input = $request->all();

        if($input['order'] == '') {
            //Default order
            $input['order'] = 0;
        }

        // Update to database
        ServiceSection::find($id)->update($input);

        return redirect()->route('service-section.index')
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
        // Retrive a model
        $service = ServiceSection::find($id);

        // Delete model
        $service->delete();

        return redirect()->route('service-section.index')
            ->with('success','Deleted  successfully.');
    }
}

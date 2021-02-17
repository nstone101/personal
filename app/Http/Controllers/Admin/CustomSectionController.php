<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\CustomSection;
use App\Models\Admin\SiteInfo;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Http\Request;

class CustomSectionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieving models
        $site_info = SiteInfo::first();
        $special_sections = CustomSection::all();

        return view('admin-panel.custom-section.index', compact('site_info', 'special_sections'));
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
        $special_section = CustomSection::find($id);

        return view('admin-panel.custom-section.edit', compact('skill_item', 'site_info', 'special_section'));
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
            'description'   =>  'required|max:1000',
            'order'   =>  'integer',
            'btn_name'   =>  'max:100',
            'btn_link'   =>  'max:100',
        ]);

        // Get All Request
        $input = $request->all();

        if($input['order'] == '') {
            //Default order
            $input['order'] = 0;
        }

        // Record to database
        CustomSection::firstOrCreate([
            'title' => $input['title'],
            'description' => Purifier::clean($input['description']),
            'order' => $input['order'],
            'btn_name' => $input['btn_name'],
            'btn_link' => $input['btn_link']
        ]);

        return redirect()->route('custom-section.index')
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
            'description'   =>  'required|max:1000',
            'order'   =>  'integer',
            'btn_name'   =>  'max:100',
            'btn_link'   =>  'max:100',
        ]);

        // Get All Request
        $input = $request->all();

        if($input['order'] == '') {
            //Default order
            $input['order'] = 0;
        }

        // XSS Purifier
        $input['description'] = Purifier::clean($input['description']);

        // Update to database
        CustomSection::find($id)->update($input);

        return redirect()->route('custom-section.index')
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
        $special_section = CustomSection::find($id);

        // Delete record
        $special_section->delete();

        return redirect()->route('custom-section.index')
            ->with('success','Deleted  successfully.');
    }
}

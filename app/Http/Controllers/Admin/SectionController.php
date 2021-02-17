<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Section;
use App\Models\Admin\OtherSection;
use App\Models\Admin\SiteInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieving models
        $sections = Section::all();
        $other_sections = OtherSection::all();
        $site_info = SiteInfo::first();

        return view('admin-panel.section.index', compact( 'site_info', 'sections', 'other_sections'));
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
        $section = Section::find($id);

        return view('admin-panel.section.edit', compact('section', 'site_info'));
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
            'heading'   =>  'required|max:255',
            'description'   =>  'max:500'
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        Section::find($id)->update($input);

        return redirect()->route('section.index')
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
        $section = Section::find($id);

        if ($section->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        // Update to database
        Section::find($id)->update(['status' => $status]);

        return redirect()->route('section.index')
            ->with('success','Updated  successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_status_other($id)
    {
        //Find a model
        $other_section = OtherSection::find($id);

        if ($other_section->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        // Update to database
        OtherSection::find($id)->update(['status' => $status]);

        return redirect()->route('section.index')
            ->with('success','Updated  successfully.');
    }

}

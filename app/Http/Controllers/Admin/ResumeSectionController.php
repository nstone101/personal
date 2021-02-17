<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ResumeSection;
use App\Models\Admin\SiteInfo;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Http\Request;

class ResumeSectionController extends Controller
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
        $resume_boxs = ResumeSection::all();

        // Initial int value
        $i = 1 ;

        return view('admin-panel.resume-section.index', compact('site_info', 'resume_boxs', 'i'));
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
            'start_year'   =>  'required|max:45',
            'end_year'   =>  'required|max:45',
            'order'   =>  'integer',
        ]);

        // Get All Request
        $input = $request->all();

        if($input['order'] == '') {
            //Default order
            $input['order'] = 0;
        }

        // Record to database
        ResumeSection::firstOrCreate([
            'icon' => $input['icon'],
            'title' => $input['title'],
            'description' => $input['description'],
            'start_year' => $input['start_year'],
            'end_year' => $input['end_year'],
            'order' => $input['order']
        ]);

        return redirect()->route('resume-section.index')
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
        $resume_box = ResumeSection::find($id);

        return view('admin-panel.resume-section.edit', compact('resume_box', 'site_info'));
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
            'start_year'   =>  'required|max:45',
            'end_year'   =>  'required|max:45',
            'order'   =>  'integer',
        ]);

        // Get All Request
        $input = $request->all();

        if($input['order'] == '') {
            //Default order
            $input['order'] = 0;
        }

        // Update to database
        ResumeSection::find($id)->update($input);

        return redirect()->route('resume-section.index')
            ->with('success','Created  successfully.');
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
        $resume_box = ResumeSection::find($id);

        // Delete model
        $resume_box->delete();

        return redirect()->route('resume-section.index')
            ->with('success','Deleted  successfully.');
    }
}

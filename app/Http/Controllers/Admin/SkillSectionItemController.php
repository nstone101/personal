<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\SkillSection;
use App\Models\Admin\SkillSectionItem;
use Illuminate\Http\Request;

class SkillSectionItemController extends Controller
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
        $skill_items = SkillSectionItem::all();
        $skill_section = SkillSection::first();

        // Start int value
        $i = "1";

        return view('admin-panel.skill-section.index', compact('site_info', 'skill_items', 'skill_section' , 'i'));
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
            'text'   =>  'required|max:255',
            'percent'   =>  'required',
            'order'   =>  'integer',
        ]);

        // Get All Request
        $input = $request->all();

        if($input['order'] == '') {
            //Default order
            $input['order'] = 0;
        }

        // Record to database
        SkillSectionItem::create($input);

        return redirect()->route('skill.index')
            ->with('success','Created successfully.');
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
        $skill_item = SkillSectionItem::find($id);

        return view('admin-panel.skill-section.edit', compact('skill_item', 'site_info'));
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
            'text'   =>  'required|max:255',
            'percent'   =>  'required',
            'order'   =>  'integer',
        ]);

        // Get All Request
        $input = $request->all();

        if($input['order'] == '') {
            //Default order
            $input['order'] = 0;
        }

        // Record to database
        SkillSectionItem::find($id)->update($input);

        return redirect()->route('skill.index')
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
        // Retrieve a model
        $skill_item = SkillSectionItem::find($id);

        // Delete record
        $skill_item->delete();

        return redirect()->route('skill.index')
            ->with('success','Deleted  successfully.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\WhyChooseSection;
use App\Models\Admin\WhyChooseSectionItem;
use Illuminate\Http\Request;

class WhyChooseSectionItemController extends Controller
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
        $why_choose_items = WhyChooseSectionItem::all();
        $why_choose_section = WhyChooseSection::first();

        // Start int value
        $i = "1";

        return view('admin-panel.why-choose-section.index', compact('site_info','why_choose_items', 'why_choose_section' , 'i'));
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
            'item'   =>  'required|max:255',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        WhyChooseSectionItem::firstOrCreate([
            'item' => $input['item']
        ]);

        return redirect()->route('why-choose.index')
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
        $why_choose_item = WhyChooseSectionItem::find($id);

        return view('admin-panel.why-choose-section.edit', compact('why_choose_item', 'site_info'));
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
            'item'   =>  'required|max:255',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        WhyChooseSectionItem::find($id)->update($input);

        return redirect()->route('why-choose.index')
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
        $why_choose_item = WhyChooseSectionItem::find($id);

        // Delete record
        $why_choose_item->delete();

        return redirect()->route('why-choose.index')
            ->with('success','Deleted  successfully.');
    }
}

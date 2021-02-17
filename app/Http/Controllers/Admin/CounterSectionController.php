<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\CounterSection;
use App\Models\Admin\SiteInfo;
use Illuminate\Http\Request;

class CounterSectionController extends Controller
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
        $counters = CounterSection::all();

        // Initial int value
        $i = 1 ;

        return view('admin-panel.counter-section.index', compact('site_info', 'counters', 'i'));
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
            'icon'   =>  'required',
            'timer'   =>  'required|integer',
            'heading'   =>  'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        CounterSection::firstOrCreate([
            'icon' => $input['icon'],
            'timer' => $input['timer'],
            'heading' => $input['heading']
        ]);

        return redirect()->route('counter-section.index')
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
        $counter = CounterSection::find($id);

        return view('admin-panel.counter-section.edit', compact('counter', 'site_info'));
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
            'icon'   =>  'required',
            'timer'   =>  'required|integer',
            'heading'   =>  'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Update to database
        CounterSection::find($id)->update($input);

        return redirect()->route('counter-section.index')
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
        $counter = CounterSection::find($id);

        // Delete model
        $counter->delete();

        return redirect()->route('counter-section.index')
            ->with('success','Deleted  successfully.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\FixedContent;
use App\Models\Admin\SiteInfo;
use Illuminate\Http\Request;

class FixedContentController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieve a model
        $fixed_content = FixedContent::first();
        $site_info = SiteInfo::first();

        return view('admin-panel.hero-setting.fixed-content.create', compact('site_info', 'fixed_content'));
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
            'colored_title'   =>  'required|max:45',
            'animated_title_1'   =>  'required|max:45',
            'animated_title_2'   =>  'required|max:45',
            'description'   =>  'required|max:255',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        FixedContent::firstOrCreate([
            'colored_title' => $input['colored_title'],
            'animated_title_1' => $input['animated_title_1'],
            'animated_title_2' => $input['animated_title_2'],
            'description' => $input['description']
        ]);

        return redirect()->route('fixed-content.create')
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
            'colored_title'   =>  'required|max:45',
            'animated_title_1'   =>  'required|max:45',
            'animated_title_2'   =>  'required|max:45',
            'description'   =>  'required|max:255',
        ]);

        // Get All Request
        $input = $request->all();

        // Update to database
        FixedContent::find($id)->update($input);

        return redirect()->route('fixed-content.create')
            ->with('success','Updated  successfully.');
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ExternalUrl;
use App\Models\Admin\SiteInfo;
use Illuminate\Http\Request;

class ExternalUrlController extends Controller
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
        $external_url = ExternalUrl::first();

        return view('admin-panel.external-url.create', compact('site_info', 'external_url'));
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
            'btn_name'   =>  'required|max:255',
            'btn_link'   =>  'required',
            'status'   =>  'integer',
        ]);

        // Get All Request
        $input = $request->all();

        if($input['status'] == '') {
            //Default status
            $input['status'] = 1;
        }

        // Record to database
        ExternalUrl::firstOrCreate([
            'btn_name' => $input['btn_name'],
            'btn_link' => $input['btn_link'],
            'status' => $input['status']
        ]);

        return redirect()->route('external-url.create')
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
            'btn_name'   =>  'required|max:255',
            'btn_link'   =>  'required',
            'status'   =>  'integer',
        ]);

        // Get All Request
        $input = $request->all();

        if($input['status'] == '') {
            //Default status
            $input['status'] = 0;
        }

        // Update to database
        ExternalUrl::find($id)->update($input);

        return redirect()->route('external-url.create')
            ->with('success','Updated  successfully.');
    }

}

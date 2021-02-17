<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\GoogleAnalytic;
use App\Models\Admin\SiteInfo;
use Illuminate\Http\Request;

class GoogleAnalyticController extends Controller
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
        $google_analytic = GoogleAnalytic::first();

        return view('admin-panel.google-analytic.create', compact('site_info', 'google_analytic'));
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
            'google_analytic_code'   =>  'required|max:255',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        GoogleAnalytic::firstOrCreate(['google_analytic_code' => $input['google_analytic_code']]);

        return redirect()->route('google-analytic.create')
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
            'google_analytic_code'   =>  'required|max:255',
        ]);

        // Get All Request
        $input = $request->all();

        // Update to database
        GoogleAnalytic::find($id)->update($input);

        return redirect()->route('google-analytic.create')
            ->with('success','Updated  successfully.');
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ColorPicker;
use App\Models\Admin\SiteInfo;
use Illuminate\Http\Request;

class ColorPickerController extends Controller
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
        $color_picker = ColorPicker::first();

        return view('admin-panel.color-picker.create', compact('site_info', 'color_picker'));
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
            'color_code'   =>  'required|max:255',
            'rgba'   =>  'required|max:255',
            'footer_color_code'   =>  'required|max:255',
            'copyright_code'   =>  'required|max:255',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        ColorPicker::firstOrCreate([
            'color_code' => $input['color_code'],
            'rgba' => $input['rgba'],
            'footer_color_code' => $input['footer_color_code'],
            'copyright_code' => $input['copyright_code']
        ]);

        return redirect()->route('color-picker.create')
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
            'color_code'   =>  'required|max:255',
            'rgba'   =>  'required|max:255',
            'footer_color_code'   =>  'required|max:255',
            'copyright_code'   =>  'required|max:255',
        ]);

        // Get All Request
        $input = $request->all();

        // Update to database
        ColorPicker::find($id)->update($input);

        return redirect()->route('color-picker.create')
            ->with('success','Updated  successfully.');
    }

}

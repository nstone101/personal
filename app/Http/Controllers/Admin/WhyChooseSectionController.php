<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\WhyChooseSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WhyChooseSectionController extends Controller
{
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
            'why_choose_image'   =>  'required|image|mimes:png,jpeg,jpg|max:2048',
            'title'   =>  'required|max:255',
            'description'   =>  'required',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('why_choose_image')){

            // Get image file
            $why_choose_image = $request->file('why_choose_image');

            // Folder path
            $folder ='fibonacci/adminpanel/assets/img/why-choose/';

            // Make image name
            $why_choose_image_name =  time().'-'.$why_choose_image->getClientOriginalName();

            // Upload image
            $why_choose_image->move($folder, $why_choose_image_name);

            // Set input
            $input['why_choose_image']= $why_choose_image_name;

        }

        // Record to database
        WhyChooseSection::firstOrCreate([
            'title' => $input['title'],
            'description' => $input['description'],
            'why_choose_image' => $input['why_choose_image']
        ]);

        return redirect()->route('why-choose.index')
            ->with('success','Uploaded  successfully.');
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
            'why_choose_image'   =>  'image|mimes:png,jpeg,jpg|max:2048',
            'title'   =>  'required|max:255',
            'description'   =>  'required',
        ]);

        $why_choose_background = WhyChooseSection::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('why_choose_image')){

            // Get image file
            $why_choose_image = $request->file('why_choose_image');

            // Folder path
            $folder ='fibonacci/adminpanel/assets/img/why-choose/';

            // Make image name
            $why_choose_image_name =  time().'-'.$why_choose_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$why_choose_background->why_choose_image));

            // Upload image
            $why_choose_image->move($folder, $why_choose_image_name);

            // Set input
            $input['why_choose_image']= $why_choose_image_name;

        }

        // Record to database
        WhyChooseSection::find($id)->update($input);

        return redirect()->route('why-choose.index')
            ->with('success','Updated  successfully.');
    }
}

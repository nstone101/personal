<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SkillSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SkillSectionController extends Controller
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
            'skill_image'   =>  'required|image|mimes:png,jpeg,jpg|max:2048',
            'title'   =>  'required|max:255',
            'description'   =>  'required',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('skill_image')){

            // Get image file
            $skill_image = $request->file('skill_image');

            // Folder path
            $folder ='fibonacci/adminpanel/assets/img/skill/';

            // Make image name
            $skill_image_name =  time().'-'.$skill_image->getClientOriginalName();

            // Upload image
            $skill_image->move($folder, $skill_image_name);

            // Set input
            $input['skill_image']= $skill_image_name;

        }

        // Record to database
        SkillSection::firstOrCreate([
            'title' => $input['title'],
            'description' => $input['description'],
            'skill_image' => $input['skill_image']
        ]);

        return redirect()->route('skill.index')
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
            'skill_image'   =>  'image|mimes:png,jpeg,jpg|max:2048',
            'title'   =>  'required|max:255',
            'description'   =>  'required',
        ]);

        $skill_background = SkillSection::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('skill_image')){

            // Get image file
            $skill_image = $request->file('skill_image');

            // Folder path
            $folder ='fibonacci/adminpanel/assets/img/skill/';

            // Make image name
            $skill_image_name =  time().'-'.$skill_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$skill_background->skill_image));

            // Upload image
            $skill_image->move($folder, $skill_image_name);

            // Set input
            $input['skill_image']= $skill_image_name;

        }

        // Record to database
        SkillSection::find($id)->update($input);

        return redirect()->route('skill.index')
            ->with('success','Updated  successfully.');
    }

}

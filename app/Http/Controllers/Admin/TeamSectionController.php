<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\TeamSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeamSectionController extends Controller
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
        $teams = TeamSection::all();

        // Initial int value
        $i = 1 ;

        return view('admin-panel.team-section.index', compact('site_info','teams','i'));
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
            'name'   =>  'required|max:255',
            'job'   =>  'required|max:255',
            'facebook'   =>  'max:255',
            'twitter'   =>  'max:255',
            'instagram'   =>  'max:255',
            'team_image'   =>  'required|image|mimes:png,jpeg,jpg|max:2048',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('team_image')){

            // Get image file
            $team_image_file = $request->file('team_image');

            // Folder path
            $folder = 'fibonacci/adminpanel/assets/img/team/';

            // Make image name
            $team_image_name =  time().'-'.$team_image_file->getClientOriginalName();

            // Original size upload file
            $team_image_file->move($folder, $team_image_name);

            // Set input
            $input['team_image']= $team_image_name;

        }

        // Record to database
        TeamSection::firstOrCreate([
            'name' => $input['name'],
            'job' => $input['job'],
            'facebook' => $input['facebook'],
            'twitter' => $input['twitter'],
            'instagram' => $input['instagram'],
            'team_image' => $input['team_image']
        ]);

        return redirect()->route('team-section.index')
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
        $team = TeamSection::find($id);
        $site_info = SiteInfo::first();

        return view('admin-panel.team-section.edit', compact('team', 'site_info'));
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
            'name'   =>  'required|max:255',
            'job'   =>  'required|max:255',
            'facebook'   =>  'max:255',
            'twitter'   =>  'max:255',
            'instagram'   =>  'max:255',
            'team_image'   =>  'image|mimes:png,jpeg,jpg|max:2048',
        ]);

        $team = TeamSection::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('team_image')){

            // Get image file
            $team_image_file = $request->file('team_image');

            // Folder path
            $folder = 'fibonacci/adminpanel/assets/img/team/';

            // Make image name
            $team_image_name =  time().'-'.$team_image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$team->client_image));


            // Original size upload file
            $team_image_file->move($folder, $team_image_name);

            // Set input
            $input['team_image']= $team_image_name;

        }

        // Update to database
        TeamSection::find($id)->update($input);

        return redirect()->route('team-section.index')
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
        $team = TeamSection::find($id);

        // Folder path
        $folder = 'fibonacci/adminpanel/assets/img/team/';

        // Delete Image
        File::delete(public_path($folder.$team->team_image));

        // Delete record
        $team->delete();

        return redirect()->route('team-section.index')
            ->with('success','Deleted  successfully.');
    }

}

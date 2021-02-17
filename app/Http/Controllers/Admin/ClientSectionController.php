<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ClientSection;
use App\Models\Admin\SiteInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ClientSectionController extends Controller
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
        $clients = ClientSection::all()->sortByDesc("id");

        // Initial int value
        $i = 1 ;

        return view('admin-panel.client-section.index', compact('site_info','clients','i'));
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
            'name' => 'required|max:255',
            'job' => 'required|max:255',
            'feedback' => 'required|max:500',
            'star' => 'integer|required',
            'client_image' => 'image|mimes:png,jpeg,jpg|max:2048'
        ]);

        // Get All Request
        $input = $request->all();

        if ($request->hasFile('client_image')) {

            // Get image file
            $client_image_file = $request->file('client_image');

            // Folder path
            $folder = 'fibonacci/adminpanel/assets/img/client/';

            // Make image name
            $client_image_name = time() . '-' . $client_image_file->getClientOriginalName();

            // Original size upload file
            $client_image_file->move($folder, $client_image_name);

            // Set input
            $input['client_image'] = $client_image_name;

        } else {
            // Set input
            $input['client_image'] = null;
        }

        // Star Control
        if (in_array($input['star'], array(1, 2, 3, 4, 5))) {
            // Record to database
            ClientSection::firstOrCreate([
                'name' => $input['name'],
                'job' => $input['job'],
                'feedback' => $input['feedback'],
                'star' => $input['star'],
                'client_image' => $input['client_image']
            ]);

            return redirect()->to('/' . '#testimonials')
                ->with('success', 'text.your_review_is_pending_approval');
        }

        return redirect()->to('/' . '#testimonials')
            ->with('warning', 'text.please_try_again');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

        // Update to database
        ClientSection::find($id)->update(['approval' => 1]);

        return redirect()->route('client-section.index')
            ->with('success','Approved  successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function mark_all_approval_update()
    {
        $clients = ClientSection::all()->where('approval', '=', 0);

        // Update to database
        foreach ($clients as $client) {
            ClientSection::find($client->id)->update(['approval' => 1]);
        }

        return redirect()->route('client-section.index')
            ->with('success','All have been successfully approved.');
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
        $client = ClientSection::find($id);

        // Folder path
        $folder = 'fibonacci/adminpanel/assets/img/client/';

        // Delete Image
        File::delete(public_path($folder.$client->client_image));

        // Delete record
        $client->delete();

        return redirect()->route('client-section.index')
            ->with('success','Deleted  successfully.');
    }

}

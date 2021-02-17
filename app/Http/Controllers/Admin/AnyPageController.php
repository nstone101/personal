<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AnyPage;
use App\Models\Admin\SiteInfo;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class AnyPageController extends Controller
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
        $any_pages = AnyPage::all()->sortByDesc('id');

        // Initial int value
        $i = 1 ;

        return view('admin-panel.any-page.index', compact('site_info', 'any_pages', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving models
        $site_info = SiteInfo::first();

        return view('admin-panel.any-page.create', compact( 'site_info'));
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
            'page_title'   =>  'required|unique:any_pages',
            'description'   =>  'required',
            'breadcrumb_image'   =>  'image|mimes:jpeg,jpg,png|max:2048',
            'status'   =>  'integer',
            'order'   =>  'integer',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('breadcrumb_image')){

            // Get image file
            $breadcrumb_image_file = $request->file('breadcrumb_image');

            // Folder path
            $folder ='fibonacci/adminpanel/assets/img/breadcrumb/page-breadcrumb/';

            // Make image name
            $breadcrumb_image_name =  time().'-'.$breadcrumb_image_file->getClientOriginalName();

            // Upload image
            $breadcrumb_image_file->move($folder, $breadcrumb_image_name);

            // Set input
            $input['breadcrumb_image']= $breadcrumb_image_name;

        } else {
            // Set input
            $input['breadcrumb_image']= null;
        }

        if($input['status'] == '') {
            //Default status
            $input['status'] = 1;
        }

        if($input['order'] == '') {
            //Default order
            $input['order'] = 0;
        }

        // Record to database
        AnyPage::firstOrCreate(
            [
                'page_title' => $input['page_title'],
                'description' => Purifier::clean($input['description']),
                'breadcrumb_image' => $input['breadcrumb_image'],
                'status' => $input['status'],
                'order' => $input['order']
            ]
        );

        return redirect()->route('any-page.index')
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
        $any_page = AnyPage::find($id);

        return view('admin-panel.any-page.edit', compact( 'any_page', 'site_info'));
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
            'page_title'   =>  [
                'required',
                Rule::unique('any_pages')->ignore($id),
            ],
            'description'   =>  'required',
            'breadcrumb_image'   =>  'image|mimes:jpeg,jpg,png|max:2048',
            'status'   =>  'integer',
            'order'   =>  'integer',
        ]);

        $any_page = AnyPage::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('breadcrumb_image')){

            // Get image file
            $breadcrumb_image_file = $request->file('breadcrumb_image');

            // Folder path
            $folder = 'fibonacci/adminpanel/assets/img/breadcrumb/page-breadcrumb/';

            // Make image name
            $breadcrumb_image_name =  time().'.'.$breadcrumb_image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$any_page->breadcrumb_image));

            // Original size upload file
            $breadcrumb_image_file->move($folder, $breadcrumb_image_name);

            // Set input
            $input['breadcrumb_image']= $breadcrumb_image_name;

        }

        if($input['status'] == '') {
            //Default status
            $input['status'] = 1;
        }

        if($input['order'] == '') {
            //Default order
            $input['order'] = 0;
        }

        // XSSCleaner Cleaner
        $input['description'] = Purifier::clean($input['description']);

        // Update to database
        AnyPage::find($id)->update($input);

        return redirect()->route('any-page.index')
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
        $any_page = AnyPage::find($id);

        // Folder path
        $folder = 'fibonacci/adminpanel/assets/img/breadcrumb/page-breadcrumb/';

        // Delete Image
        File::delete(public_path($folder.$any_page->breadcrumb_image));

        // Delete record
        $any_page->delete();

        return redirect()->route('any-page.index')
            ->with('success','Deleted  successfully.');
    }
}

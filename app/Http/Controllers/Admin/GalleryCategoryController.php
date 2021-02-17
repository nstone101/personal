<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\GalleryCategory;
use App\Models\Admin\SiteInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class GalleryCategoryController extends Controller
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
        $categories = GalleryCategory::all();

        // Initial int value
        $i = 1 ;

        return view('admin-panel.gallery.category.index', compact('site_info', 'categories', 'i'));
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
            'category_name'   =>  'required|unique:gallery_categories|max:255',
            'status'   =>  'integer',
            'order'   =>  'integer',
            'category_image'   =>  'image|mimes:png,jpeg,jpg|max:2048',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('category_image')){

            // Get image file
            $category_image_file = $request->file('category_image');

            // Folder path
            $folder = 'fibonacci/adminpanel/assets/img/gallery/category/';

            // Make image name
            $category_image_name =  time().'-'.$category_image_file->getClientOriginalName();

            // Original size upload file
            $category_image_file->move($folder, $category_image_name);

            // Set input
            $input['category_image']= $category_image_name;

        } else {
            // Set input
            $input['category_image']= null;
        }

        if ($input['status'] == '') {
            //Default status
            $input['status'] = 1;
        }

        if($input['order'] == '') {
            //Default order
            $input['order'] = 0;
        }

        // Record to database
        GalleryCategory::firstOrCreate([
            'category_name' => $input['category_name'],
            'order' => $input['order'],
            'status' => $input['status'],
            'category_image' => $input['category_image']
        ]);

        return redirect()->route('gallery-category.index')
            ->with('success','Created successfully.');
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
        $category = GalleryCategory::find($id);

        return view('admin-panel.gallery.category.edit', compact('category', 'site_info'));
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
            'category_name'   =>  [
                'required',
                'max:255',
                Rule::unique('gallery_categories')->ignore($id),
            ],
            'status'   =>  'integer',
            'order'   =>  'integer',
            'category_image'   =>  'image|mimes:png,jpeg,jpg|max:2048',
        ]);

        $category = GalleryCategory::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('category_image')){

            // Get image file
            $category_image_file = $request->file('category_image');

            // Folder path
            $folder = 'fibonacci/adminpanel/assets/img/gallery/category/';

            // Make image name
            $category_image_name =  time().'-'.$category_image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$category->category_image));


            // Original size upload file
            $category_image_file->move($folder, $category_image_name);

            // Set input
            $input['category_image']= $category_image_name;

        }

        if($input['status'] == '') {
            //Default status
            $input['status'] = 1;
        }

        if($input['order'] == '') {
            //Default order
            $input['order'] = 0;
        }

        // Update to database
        GalleryCategory::find($id)->update($input);

        return redirect()->route('gallery-category.index')
            ->with('success','Updated  successfully.');
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
        $category = GalleryCategory::find($id);

        if ($category->category_image != null) {
            // Folder path
            $folder = 'fibonacci/adminpanel/assets/img/gallery/category/';

            // Delete Image
            File::delete(public_path($folder.$category->category_image));
        }

        // Delete model
        $category->delete();

        return redirect()->route('gallery-category.index')
            ->with('success','Deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Gallery;
use App\Models\Admin\GalleryCategory;
use App\Models\Admin\SiteInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
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
        $galleries = Gallery::all()->sortByDesc('id');
        $categories = GalleryCategory::all();

        if(count($categories) > 0) {
            // Initial int value
            $i = 1 ;
            return view('admin-panel.gallery.index', compact('site_info', 'galleries', 'categories','i'));
        } else{
            return redirect()->route('gallery-category.index')
                ->with('success','Please create a category.');
        }

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
            'gallery_category_id'   =>  'integer|required',
            'gallery_image' => 'required',
            'gallery_image.*' => 'image|mimes:png,jpeg,jpg',
            'status'   =>  'integer',
            'order'   =>  'integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Find category
        $category = GalleryCategory::find($input['gallery_category_id']);

        if($request->hasFile('gallery_image')){

            $gallery_image_array = $request->file('gallery_image');

            // Array length
            $array_len = count($gallery_image_array);

            for($i = 0; $i < $array_len; $i++) {

                // Get image file
                $gallery_image_file = $gallery_image_array[$i];

                // Folder path
                $folder = 'fibonacci/adminpanel/assets/img/gallery/';

                // Make image name
                $gallery_image_name = time() .$i. '-' . $gallery_image_file->getClientOriginalName();

                // Original size upload file
                $gallery_image_file->move($folder, $gallery_image_name);

                // Set input
                $input['gallery_image'] = $gallery_image_name;

                // Record to database
                Gallery::create([
                    'gallery_category_name' => $category->category_name,
                    'gallery_category_id' => $input['gallery_category_id'],
                    'gallery_image' => $input['gallery_image'],
                    'display_name' => null,
                    'note' => null,
                    'external_url' => null,
                    'order' => 0,
                    'status' => 1
                ]);
            }

        }

        return redirect()->route('gallery.index')
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
        /// Retrieving models
        $site_info = SiteInfo::first();
        $gallery = Gallery::find($id);
        $categories = GalleryCategory::all();

        return view('admin-panel.gallery.edit', compact('gallery', 'categories', 'site_info'));
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
        $request->validate([
            'gallery_category_id'   =>  'integer|required',
            'gallery_image'   =>  'image|mimes:png,jpeg,jpg|max:2048',
            'status'   =>  'integer',
            'order'   =>  'integer',
        ]);

        $gallery = Gallery::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('gallery_image')){

            // Get image file
            $gallery_image_file = $request->file('gallery_image');

            // Folder path
            $folder = 'fibonacci/adminpanel/assets/img/gallery/';

            // Make image name
            $gallery_image_name =  time().'-'.$gallery_image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$gallery->gallery_image));

            // Original size upload file
            $gallery_image_file->move($folder, $gallery_image_name);

            // Set input
            $input['gallery_image']= $gallery_image_name;

        }

        if($input['status'] == '') {
            //Default status
            $input['status'] = 0;
        }

        if($input['order'] == '') {
            //Default order
            $input['order'] = 0;
        }

        // Find category
        $category = GalleryCategory::find($input['gallery_category_id']);
        $input['gallery_category_name'] = $category->category_name;

        // Update to database
        Gallery::find($id)->update($input);

        return redirect()->route('gallery.index')
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
        $gallery = Gallery::find($id);

        // Folder path
        $folder = 'fibonacci/adminpanel/assets/img/gallery/';

        // Delete Image
        File::delete(public_path($folder.$gallery->gallery_image));

        // Delete record
        $gallery->delete();

        return redirect()->route('gallery.index')
            ->with('success','Deleted  successfully.');
    }

}

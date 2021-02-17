<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Category;
use App\Models\Admin\SiteInfo;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
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
        $blogs = Blog::all()->sortByDesc('id');
        $categories = Category::all();

        if(count($categories) > 0) {
            // Initial int value
            $i = 1 ;
            return view('admin-panel.blog.index', compact('site_info', 'blogs', 'categories','i'));
        } else{
            return redirect()->route('blog-category.index')
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
            'category_id'   =>  'integer|required',
            'title'   =>  'required|max:255',
            'short_description'   =>  'required|max:255',
            'description'   =>  'required',
            'blog_image'   =>  'image|mimes:png,jpeg,jpg|max:2048'
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('blog_image')){

            // Get image file
            $blog_image_file = $request->file('blog_image');

            // Folder path
            $folder = 'fibonacci/adminpanel/assets/img/blog/';
            $folder1 = 'fibonacci/adminpanel/assets/img/blog/thumbnail1/';

            // Make image name
            $blog_image_name =  time().'-'.$blog_image_file->getClientOriginalName();

            // Resizing an uploaded file
            Image::make($request->file('blog_image'))->fit(600, 400)->save($folder1.$blog_image_name);

            // Original size upload file
            $blog_image_file->move($folder, $blog_image_name);

            // Set input
            $input['blog_image']= $blog_image_name;

        } else {
            // Set input
            $input['blog_image']= null;
        }

        // Find category
        $category = Category::find($input['category_id']);

        // Record to database
        Blog::firstOrCreate([
            'category_name' => $category->category_name,
            'category_id' => $input['category_id'],
            'title' => $input['title'],
            'short_description' => $input['short_description'],
            'description' => Purifier::clean($input['description']),
            'blog_image' => $input['blog_image']
        ]);

        return redirect()->route('blog.index')
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
        $blog = Blog::find($id);
        $categories = Category::all();

        return view('admin-panel.blog.edit', compact('blog', 'categories', 'site_info'));
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
            'category_id'   =>  'integer|required',
            'title'   =>  'required|max:255',
            'short_description'   =>  'required|max:255',
            'description'   =>  'required',
            'blog_image'   =>  'image|mimes:png,jpeg,jpg|max:2048'
        ]);

        $blog = Blog::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('blog_image')){

            // Get image file
            $blog_image_file = $request->file('blog_image');

            // Folder path
            $folder = 'fibonacci/adminpanel/assets/img/blog/';
            $folder1 = 'fibonacci/adminpanel/assets/img/blog/thumbnail1/';

            // Make image name
            $blog_image_name =  time().'-'.$blog_image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$blog->blog_image));
            File::delete(public_path($folder1.$blog->blog_image));

            // Resizing an uploaded file
            Image::make($request->file('blog_image'))->fit(600, 400)->save($folder1.$blog_image_name);

            // Original size upload file
            $blog_image_file->move($folder, $blog_image_name);

            // Set input
            $input['blog_image']= $blog_image_name;

        }

        // Find category
        $category = Category::find($input['category_id']);
        $input['category_name'] = $category->category_name;

        // XSS Purifier
        $input['description'] = Purifier::clean($input['description']);

        // Update to database
        Blog::find($id)->update($input);

        return redirect()->route('blog.index')
            ->with('success','Updated successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_feature($id)
    {
        //Find a model
        $blog = Blog::find($id);

        if ($blog->featured == 1) {
            $featured = 0;
        } else {
            $featured = 1;
        }

        // Update to database
        Blog::find($id)->update(['featured' => $featured]);

        return redirect()->route('blog.index')
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
        $blog = Blog::find($id);

        // Folder path
        $folder = 'fibonacci/adminpanel/assets/img/blog/';
        $folder1 = 'fibonacci/adminpanel/assets/img/blog/thumbnail1/';

        // Delete Image
        File::delete(public_path($folder.$blog->blog_image));
        File::delete(public_path($folder1.$blog->blog_image));

        // Delete record
        $blog->delete();

        return redirect()->route('blog.index')
            ->with('success','Deleted  successfully.');
    }

}

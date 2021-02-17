<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\SiteInfo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
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
        $categories = Category::all();

        // Initial int value
        $i = 1 ;

        return view('admin-panel.blog.category.index', compact('site_info','categories', 'i'));
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
            'category_name'   =>  'required|unique:categories|max:255',
            'status'   =>  'integer',
            'order'   =>  'integer',
        ]);

        // Get All Request
        $input = $request->all();

        if($input['status'] == '') {
            //Default status
            $input['status'] = 1;
        }

        if($input['order'] == '') {
            //Default order
            $input['order'] = 0;
        }

        // Record to database
        Category::firstOrCreate([
            'category_name' => $input['category_name'],
            'status' => $input['status'],
            'order' => $input['order']
        ]);

        return redirect()->route('blog-category.index')
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
        $category = Category::find($id);

        return view('admin-panel.blog.category.edit', compact('category', 'site_info'));
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
                Rule::unique('categories')->ignore($id),
            ],
            'status'   =>  'integer',
            'order'   =>  'integer',
        ]);

        // Get All Request
        $input = $request->all();

        if($input['status'] == '') {
            //Default status
            $input['status'] = 0;
        }

        if($input['order'] == '') {
            //Default order
            $input['order'] = 0;
        }

        // Update to database
        Category::find($id)->update($input);

        return redirect()->route('blog-category.index')
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
        // Retrivieng a model
        $category = Category::find($id);

        // Delete model
        $category->delete();

        return redirect()->route('blog-category.index')
            ->with('success','Deleted  successfully.');
    }
}

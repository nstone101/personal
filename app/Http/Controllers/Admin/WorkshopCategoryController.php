<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Category;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\WorkshopCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;


class WorkshopCategoryController extends Controller
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
        $categories = WorkshopCategory::all();

        // Initial int value
        $i = 1 ;

        return view('admin-panel.workshop.category.index', compact('site_info', 'categories', 'i'));
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
            'category_name'   =>  'required|unique:workshop_categories|max:255',
            'status'   =>  'integer',
            'order'   =>  'integer',
        ]);

        // Get All Request
        $input = $request->all();

        if ($input['status'] == '') {
            //Default status
            $input['status'] = 1;
        }

        if($input['order'] == '') {
            //Default order
            $input['order'] = 0;
        }

        // Record to database
        WorkshopCategory::firstOrCreate([
            'category_name' => $input['category_name'],
            'order' => $input['order'],
            'status' => $input['status']
        ]);

        return redirect()->route('workshop-category.index')
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
        $category = WorkshopCategory::find($id);

        return view('admin-panel.workshop.category.edit', compact('category', 'site_info'));
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
                 Rule::unique('workshop_categories')->ignore($id),
            ],
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

        // Update to database
        WorkshopCategory::find($id)->update($input);

        return redirect()->route('workshop-category.index')
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
        $category = WorkshopCategory::find($id);

        // Delete model
        $category->delete();

        return redirect()->route('workshop-category.index')
            ->with('success','Deleted successfully.');
    }
}

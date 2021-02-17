<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\WorkshopCategory;
use App\Models\Admin\WorkshopPreview;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class WorkshopProjectController extends Controller
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
        $projects = WorkshopPreview::all()->sortByDesc('id');

        // Initial int value
        $i = 1 ;

        return view('admin-panel.workshop.project.index', compact('site_info', 'projects', 'i'));
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
        $categories = WorkshopCategory::all()->where('status',1);

        if(count($categories) > 0) {
            return view('admin-panel.workshop.project.create', compact('categories', 'site_info'));
        } else{
            return redirect()->route('workshop-category.index')
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
            'workshop_category_id'   =>  'integer|required',
            'project_name'   =>  'required|unique:workshop_previews|max:255',
            'description'   =>  'required',
            'preview_image'   =>  'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('preview_image')){

            // Get image file
            $preview_image_file = $request->file('preview_image');

            // Folder path
            $folder1 = 'fibonacci/adminpanel/assets/img/portfolio/thumbnail1/';
            $folder2 = 'fibonacci/adminpanel/assets/img/portfolio/thumbnail2/';

            // Make image name
            $preview_image_name =  time().'-'.$preview_image_file->getClientOriginalName();

            // Resizing an uploaded file
            Image::make($request->file('preview_image'))->fit(900, 1200)->save($folder1.$preview_image_name);
            Image::make($request->file('preview_image'))->fit(1000, 1000)->save($folder2.$preview_image_name);

            // Set input
            $input['preview_image']= $preview_image_name;

        }

        // Find category
        $workshop_category = WorkshopCategory::find($input['workshop_category_id']);

        // Record to database
        WorkshopPreview::firstOrCreate(
            [
                'workshop_category_name' => $workshop_category->category_name,
                'workshop_category_id' => $input['workshop_category_id'],
                'preview_image' => $input['preview_image'],
                'project_name' => $input['project_name'],
                'description' => Purifier::clean($input['description']),
                'client' => $input['client'],
                'value' => $input['value'],
                'author' => $input['author'],
                'start_date' => $input['start_date'],
                'end_date' => $input['end_date']
            ]
        );

        return redirect()->route('workshop-project.index')
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
        $project = WorkshopPreview::find($id);
        $categories = WorkshopCategory::all()->where('status',1);

        return view('admin-panel.workshop.project.edit', compact('project', 'categories', 'site_info'));
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
            'project_name'   =>  [
                'required',
                'max:255',
                Rule::unique('workshop_previews')->ignore($id),
            ],
            'workshop_category_id'   =>  'integer|required',
            'description'   =>  'required',
            'preview_image'   =>  'image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $project = WorkshopPreview::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('preview_image')){

            // Get image file
            $preview_image_file = $request->file('preview_image');

            // Folder path
            $folder1 = 'fibonacci/adminpanel/assets/img/portfolio/thumbnail1/';
            $folder2 = 'fibonacci/adminpanel/assets/img/portfolio/thumbnail2/';

            // Make image name
            $preview_image_name =  time().'-'.$preview_image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder1.$project->preview_image));
            File::delete(public_path($folder2.$project->preview_image));

            // Resizing an uploaded file
            Image::make($request->file('preview_image'))->fit(900, 1200)->save($folder1.$preview_image_name);
            Image::make($request->file('preview_image'))->fit(1000, 1000)->save($folder2.$preview_image_name);

            // Set input
            $input['preview_image']= $preview_image_name;

        }

        // Find category
        $workshop_category = WorkshopCategory::find($input['workshop_category_id']);
        $input['workshop_category_name'] = $workshop_category->category_name;

        // XSSCleaner Cleaner
        $input['description'] = Purifier::clean($input['description']);

        // Update to database
        WorkshopPreview::find($id)->update($input);

        return redirect()->route('workshop-project.index')
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
        $project = WorkshopPreview::find($id);

        // Folder path
        $folder1 = 'fibonacci/adminpanel/assets/img/portfolio/thumbnail1/';
        $folder2 = 'fibonacci/adminpanel/assets/img/portfolio/thumbnail2/';

        // Delete Image
        File::delete(public_path($folder1.$project->preview_image));
        File::delete(public_path($folder2.$project->preview_image));

        // Delete record
        $project->delete();

        return redirect()->route('workshop-project.index')
            ->with('success','Deleted  successfully.');
    }
}

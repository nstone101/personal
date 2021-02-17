<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Language;
use App\Models\Admin\LanguageKeyword;
use App\Models\Admin\SiteInfo;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving models
        $languages = Language::all();
        $site_info = SiteInfo::first();

        // Start int value
        $i = "1";

        return view('admin-panel.language-section.create', compact('site_info', 'languages', 'i'));
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
        $language = Language::find($id);

        return view('admin-panel.language-section.edit', compact('language', 'site_info'));
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
            'language_name'   =>  'required|unique:languages',
            'language_code'   =>  'required|unique:languages',
        ]);

        // Get All Request
        $input = $request->all();

        //Default status
        $input['status'] = 0;

        // Record to database
        Language::firstOrCreate([
            'language_name' => $input['language_name'],
            'language_code' => $input['language_code'],
            'status' => $input['status']
        ]);

        return redirect()->route('language-section.create')
            ->with('success','Created  successfully.');
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
            'language_name'   =>  [
                'required',
                Rule::unique('languages')->ignore($id),
            ],
            'language_code'   =>  [
                'required',
                Rule::unique('languages')->ignore($id),
            ],
        ]);

        // Get All Request
        $input = $request->all();

        // Update to database
        Language::find($id)->update($input);

        return redirect()->route('language-section.create')
            ->with('success','Updated  successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_language(Request $request)
    {
        // Form validation
        $request->validate([
            'language'   =>  'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Retrieve a model
        $language = Language::where('language_code', $input['language'])->first();

        if (empty($language)) {

            return redirect()->route('language-section.create')
                ->with('warning','Please try again!');

        } else {

            $language = Language::where('language_code', $input['language'])->first();

            $language_keyword = LanguageKeyword::where('language_id', $language->id)->first();

            if (empty($language_keyword)) {

                return redirect()->route('language-section.create')
                    ->with('warning','Please create keywords!');

            } else {

                // Retrieve a model
                $languages = Language::all();

                foreach ($languages as $language) {

                    if ($language->language_code === $input['language']) {
                        // Update to database status = 1
                        Language::find($language->id)->update(['status' => 1]);
                    } else {
                        // Update to database status = 0
                        Language::find($language->id)->update(['status' => 0]);
                    }

                }

                return redirect()->route('language-section.create')
                    ->with('success','Updated  successfully.');

            }

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id == 1) {
            return redirect()->route('language-section.create')
                ->with('warning','You are not authorized to delete this operation.');
        }

        // Retrieving models
        $language = Language::find($id);


        $language_keyword = LanguageKeyword::where('language_id', $id)->first();

        // Delete record
        $language->delete();

        if (isset($language_keyword)) {
            $language_keyword->delete();
        }

        // Update to database
        $default_langauge = Language::first();

        // Update to database status = 1
        Language::find($default_langauge->id)->update(['status' => 1]);

        return redirect()->route('language-section.create')
            ->with('success','Deleted  successfully.');
    }


}

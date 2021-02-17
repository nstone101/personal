<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ContactSection;
use App\Models\Admin\SiteInfo;
use Illuminate\Http\Request;

class ContactSectionController extends Controller
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
        $messages = ContactSection::all()->sortByDesc("id");

        return view('admin-panel.contact-section.index', compact('messages', 'site_info'));
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
        ContactSection::find($id)->update(['read' => 1]);

        return redirect()->route('message.index')
            ->with('success','Updated  successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function mark_all_read_update()
    {
        $messages = ContactSection::all()->where('read', 0);

        // Update to database
        foreach ($messages as $message) {
            ContactSection::find($message->id)->update(['read' => 1]);
        }

        return redirect()->route('message.index')
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
        $message = ContactSection::find($id);

        // Delete record
        $message->delete();

        return redirect()->route('message.index')
            ->with('success','Deleted  successfully.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SiteInfo;
use App\Models\Frontend\Comment;

class CommentSectionController extends Controller
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
        $comments = Comment::all()->sortByDesc("id");

        return view('admin-panel.comment-section.index', compact('comments', 'site_info'));
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
        Comment::find($id)->update(['approval' => 1]);

        return redirect()->route('comment-section.index')
            ->with('success','Updated  successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function mark_all_approval_update()
    {
        $comments = Comment::all()->where('approval', '=', 0);

        // Update to database
        foreach ($comments as $comment) {
            Comment::find($comment->id)->update(['approval' => 1]);
        }

        return redirect()->route('comment-section.index')
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
        $comment = Comment::find($id);

        // Delete record
        $comment->delete();

        return redirect()->route('comment-section.index')
            ->with('success','Deleted  successfully.');
    }
}

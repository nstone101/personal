<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\WorkshopPreview;
use App\Models\Frontend\Commednt;
use App\Models\Frontend\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CommentController extends Controller
{

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
            'name'   =>  'required|max:255',
            'comment'   =>  'required|max:500',
        ]);

        // Get All Request
        $input = $request->all();

        // Decrypt
        $page = Crypt::decrypt($input['page']);

        if ($page == 112) {
            $workshop_project_id = Crypt::decrypt($input['workshop_project_id']);

            $workshop_project = WorkshopPreview::find($workshop_project_id);

            $input['workshop_preview_id'] = $workshop_project->id;
            $slug = $workshop_project->slug;
            $input['page'] = 'project';
        } else {
            $input['workshop_preview_id'] = null;
        }

        if ($page == 98) {
            $blog_id = Crypt::decrypt($input['blog_id']);

            $blog = Blog::find($blog_id);

            $input['blog_id'] = $blog->id;
            $slug = $blog->slug;
            $input['page'] = 'blog';
        } else {
            $input['blog_id'] = null;
        }

        // Record to database
        Comment::firstOrCreate([
            'workshop_preview_id' => $input['workshop_preview_id'],
            'blog_id' => $input['blog_id'],
            'name' => $input['name'],
            'comment' => $input['comment'],
            'page' => $input['page'],
        ]);

        if($page == 112) {
            return redirect()->route('portfolio-page.show', $slug)
                ->with('success','frontend.your_comment_is_pending_approval');
        } else {
            return redirect()->route('blog-page.show', $slug)
                ->with('success','frontend.your_comment_is_pending_approval');
        }
    }

}

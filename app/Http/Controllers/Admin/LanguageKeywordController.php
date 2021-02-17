<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\LanguageKeyword;
use App\Models\Admin\SiteInfo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LanguageKeywordController extends Controller
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
            'language_id'   =>  'required|unique:language_keywords',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        LanguageKeyword::firstOrCreate([
            'language_id' => $input['language_id'],
            'home' => $input['home'],
            'about' => $input['about'],
            'portfolio' => $input['portfolio'],
            'contact' => $input['contact'],
            'hire_me' => $input['hire_me'],
            'testimonial' => $input['testimonial'],
            'by_admin' => $input['by_admin'],
            'read_more' => $input['read_more'],
            'search_results' => $input['search_results'],
            'nothing_found' => $input['nothing_found'],
            'search_here' => $input['search_here'],
            'search' => $input['search'],
            'blog_details' => $input['blog_details'],
            'reply' => $input['reply'],
            'leave_a_comment' => $input['leave_a_comment'],
            'your_name' => $input['your_name'],
            'your_job' => $input['your_job'],
            'select_rating' => $input['select_rating'],
            'your_feedback' => $input['your_feedback'],
            'your_comment' => $input['your_comment'],
            'your_email' => $input['your_email'],
            'your_message' => $input['your_message'],
            'subject_here' => $input['subject_here'],
            'send_message' => $input['send_message'],
            'all' => $input['all'],
            'recent_posts' => $input['recent_posts'],
            'do_you_need_a_project' => $input['do_you_need_a_project'],
            'view_all' => $input['view_all'],
            'portfolio_details' => $input['portfolio_details'],
            'project_detail' => $input['project_detail'],
            'we_are_coming_soon' => $input['we_are_coming_soon'],
            'project_share' => $input['project_share'],
            'blog_share' => $input['blog_share'],
            'send_review' => $input['send_review'],
            'your_review_is_pending_approval' => $input['your_review_is_pending_approval'],
            'please_try_again' => $input['please_try_again'],
            'your_message_has_been_delivered' => $input['your_message_has_been_delivered'],
            'your_comment_is_pending_approval' => $input['your_comment_is_pending_approval'],
            'select' => $input['select'],
            'services' => $input['services'],
            'blog' => $input['blog'],
            'client' => $input['client'],
            'project_name' => $input['project_name'],
            'category' => $input['category'],
            'value' => $input['value'],
            'author' => $input['author'],
            'start_date' => $input['start_date'],
            'end_date' => $input['end_date'],
            'pages' => $input['pages'],
            'page_share' => $input['page_share'],
            'gallery' => $input['gallery'],
            'comments' => $input['comments'],
            'download_cv' => $input['download_cv'],
            'image' => $input['image'],
            'size' => $input['size'],
            'add' => $input['add'],
            'blogs' => $input['blogs'],
            'new' => $input['new'],
            'feedback' => $input['feedback'],
            'no_records_created_yet' => $input['no_records_created_yet'],

        ]);

        return redirect()->route('language-section.create')
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
        $language_keyword = LanguageKeyword::where('language_id', $id)->first();

        if (empty($language_keyword)) {
            // If not yet created keywords
            $control_id = 0;
        } else {
            $control_id = 1;
        }

        return view('admin-panel.language-keyword.edit', compact('language_keyword', 'site_info',
            'control_id', 'id'));
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
        // Get All Request
        $input = $request->all();

        $language_keyword = LanguageKeyword::where('language_id', $id)->first();

        // Update to database
        LanguageKeyword::find($language_keyword->id)->update($input);

        return redirect()->route('language-section.create')
            ->with('success','Updated  successfully.');
    }

}

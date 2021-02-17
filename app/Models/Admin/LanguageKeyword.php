<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class LanguageKeyword extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'home',
        'about',
        'portfolio',
        'contact',
        'hire_me',
        'testimonial',
        'by_admin',
        'read_more',
        'search_results',
        'nothing_found',
        'search_here',
        'search',
        'blog_details',
        'reply',
        'leave_a_comment',
        'your_name',
        'your_job',
        'select_rating',
        'your_feedback',
        'your_comment',
        'your_email',
        'your_message',
        'subject_here',
        'send_message',
        'all',
        'recent_posts',
        'do_you_need_a_project',
        'view_all',
        'portfolio_details' ,
        'project_detail',
        'we_are_coming_soon',
        'project_share',
        'blog_share',
        'send_review',
        'your_review_is_pending_approval',
        'please_try_again',
        'your_message_has_been_delivered',
        'your_comment_is_pending_approval',
        'select',
        'services',
        'blog',
        'client',
        'project_name',
        'category',
        'value',
        'author',
        'start_date',
        'end_date',
        'pages',
        'page_share',
        'gallery',
        'comments',
        'download_cv',
        'image',
        'size',
        'add',
        'blogs',
        'new',
        'feedback',
        'no_records_created_yet',
    ];
}

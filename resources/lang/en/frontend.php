<?php

use App\Models\Admin\LanguageKeyword;
use App\Models\Admin\Language;
use Illuminate\Support\Facades\Schema;

$columns = Schema::getColumnListing('language_keywords');

$language = Language::where('status', 1)->first();

$language_keyword = LanguageKeyword::where('language_id', $language->id)->first();

if (isset($language_keyword)) {
    return [

        /*
        |--------------------------------------------------------------------------
        | Language Translate
        |--------------------------------------------------------------------------
        |
        | The following language lines are the default lines which match reasons
        | that are given by the password broker for a password update attempt
        | has failed, such as for an invalid token or invalid new password.
        |
        */
        $columns[2] => $language_keyword->home,
        $columns[3] => $language_keyword->about,
        $columns[4] => $language_keyword->portfolio,
        $columns[5] => $language_keyword->contact,
        $columns[6] => $language_keyword->hire_me,
        $columns[7] => $language_keyword->testimonial,
        $columns[8] => $language_keyword->by_admin,
        $columns[9] => $language_keyword->read_more,
        $columns[10] => $language_keyword->search_results,
        $columns[11] => $language_keyword->nothing_found,
        $columns[12] => $language_keyword->search_here,
        $columns[13] => $language_keyword->search,
        $columns[14] => $language_keyword->blog_details,
        $columns[15] => $language_keyword->reply,
        $columns[16] => $language_keyword->leave_a_comment,
        $columns[17] => $language_keyword->your_name,
        $columns[18] => $language_keyword->your_job,
        $columns[19] => $language_keyword->select_rating,
        $columns[20] => $language_keyword->your_feedback,
        $columns[21] => $language_keyword->your_comment,
        $columns[22] => $language_keyword->your_email,
        $columns[23] => $language_keyword->your_message,
        $columns[24] => $language_keyword->subject_here,
        $columns[25] => $language_keyword->send_message,
        $columns[26] => $language_keyword->all,
        $columns[27] => $language_keyword->recent_posts,
        $columns[28] => $language_keyword->do_you_need_a_project,
        $columns[29] => $language_keyword->view_all,
        $columns[30] => $language_keyword->portfolio_details,
        $columns[31] => $language_keyword->project_detail,
        $columns[32] => $language_keyword->we_are_coming_soon,
        $columns[33] => $language_keyword->project_share,
        $columns[34] => $language_keyword->blog_share,
        $columns[35] => $language_keyword->send_review,
        $columns[36] => $language_keyword->your_review_is_pending_approval,
        $columns[37] => $language_keyword->please_try_again,
        $columns[38] => $language_keyword->your_message_has_been_delivered,
        $columns[39] => $language_keyword->your_comment_is_pending_approval,
        $columns[40] => $language_keyword->select,
        $columns[41] => $language_keyword->services,
        $columns[42] => $language_keyword->blog,
        $columns[43] => $language_keyword->client,
        $columns[44] => $language_keyword->project_name,
        $columns[45] => $language_keyword->category,
        $columns[46] => $language_keyword->value,
        $columns[47] => $language_keyword->author,
        $columns[48] => $language_keyword->start_date,
        $columns[49] => $language_keyword->end_date,
        $columns[50] => $language_keyword->pages,
        $columns[51] => $language_keyword->page_share,
        $columns[52] => $language_keyword->gallery,
        $columns[53] => $language_keyword->comments,
        $columns[54] => $language_keyword->download_cv,
        $columns[55] => $language_keyword->image,
        $columns[56] => $language_keyword->size,
        $columns[57] => $language_keyword->add,
        $columns[58] => $language_keyword->blogs,
        $columns[59] => $language_keyword->new,
        $columns[60] => $language_keyword->feedback,
        $columns[61] => $language_keyword->no_records_created_yet,

    ];
}

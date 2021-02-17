<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_keywords', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('language_id');
            $table->text('home');
            $table->text('about');
            $table->text('portfolio');
            $table->text('contact');
            $table->text('hire_me');
            $table->text('testimonial');
            $table->text('by_admin');
            $table->text('read_more');
            $table->text('search_results');
            $table->text('nothing_found');
            $table->text('search_here');
            $table->text('search');
            $table->text('blog_details');
            $table->text('reply');
            $table->text('leave_a_comment');
            $table->text('your_name');
            $table->text('your_job');
            $table->text('select_rating');
            $table->text('your_feedback');
            $table->text('your_comment');
            $table->text('your_email');
            $table->text('your_message');
            $table->text('subject_here');
            $table->text('send_message');
            $table->text('all');
            $table->text('recent_posts');
            $table->text('do_you_need_a_project');
            $table->text('view_all');
            $table->text('portfolio_details');
            $table->text('project_detail');
            $table->text('we_are_coming_soon');
            $table->text('project_share');
            $table->text('blog_share');
            $table->text('send_review');
            $table->text('your_review_is_pending_approval');
            $table->text('please_try_again');
            $table->text('your_message_has_been_delivered');
            $table->text('your_comment_is_pending_approval');
            $table->text('select');
            $table->text('services');
            $table->text('blog');
            $table->text('client');
            $table->text('project_name');
            $table->text('category');
            $table->text('value');
            $table->text('author');
            $table->text('start_date');
            $table->text('end_date');
            $table->text('pages');
            $table->text('page_share');
            $table->text('gallery');
            $table->text('comments');
            $table->text('download_cv');
            $table->text('image');
            $table->text('size');
            $table->text('add');
            $table->text('blogs');
            $table->text('new');
            $table->text('feedback');
            $table->text('no_records_created_yet');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('language_keywords');
    }
}

<?php

use App\Models\Admin\LanguageKeyword;
use Illuminate\Database\Seeder;

class LanguageKeywordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ID to zero
        LanguageKeyword::truncate();

        // Create datas
        LanguageKeyword::create([


            'language_id' => 1,
            'home' => 'Home',
            'about' => 'About',
            'portfolio' => 'Portfolio',
            'contact' => 'Contact',
            'hire_me' => 'Hire Me',
            'testimonial' => 'Testimonial',
            'by_admin' => 'By Admin',
            'read_more' => 'Read More',
            'search_results' => 'Search Results',
            'nothing_found' => 'Nothing Found',
            'search_here' => 'Search...',
            'search' => 'Search',
            'blog_details' => 'Blog Details',
            'reply' => 'Reply',
            'leave_a_comment' => 'Leave A Comment',
            'your_name' => 'Your Name *',
            'your_job' => 'Your Job *',
            'select_rating' => 'Select Rating',
            'your_feedback' => 'Your Feedback *',
            'your_comment' => 'Your Comment *',
            'your_email' => 'Your Email *',
            'your_message' => 'Your Message *',
            'subject_here' => 'Subject *',
            'send_message' => 'Send Message',
            'all' => 'All',
            'recent_posts' => 'Recent Posts',
            'do_you_need_a_project' => 'Do you need a project?',
            'view_all' => 'View All',
            'portfolio_details' => 'Portfolio Details',
            'project_detail' => 'Project Detail',
            'we_are_coming_soon' => 'We Are Coming Soon',
            'project_share' => 'Project Share',
            'blog_share' => 'Blog Share',
            'send_review' => 'Send Review',
            'your_review_is_pending_approval' => 'Your review is pending approval.',
            'please_try_again' => 'Please try again.',
            'your_message_has_been_delivered' => 'Your message has been delivered.',
            'your_comment_is_pending_approval' => 'Your comment is pending approval.',
            'select' => 'Select',
            'services' => 'Services',
            'blog' => 'Blog',
            'client' => 'Client',
            'project_name' => 'Project Name',
            'category' => 'Category',
            'value' => 'Value',
            'author' => 'Author',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'pages' => 'Pages',
            'page_share' => 'Page Share',
            'gallery' => 'Gallery',
            'comments' => 'Comments',
            'download_cv' => 'Download Cv',
            'image' => 'Image',
            'size' => 'size',
            'add' => 'Add',
            'blogs' => 'Blogs',
            'new' => 'New',
            'feedback' => 'Feedback',
            'no_records_created_yet' => 'No records created yet.'

        ]);
    }
}

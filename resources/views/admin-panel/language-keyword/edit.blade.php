@extends('layouts.admin-panel.master')

@section('title', 'Language Keywords')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.language_keywords') }}</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ url('admin-panel/dashboard') }}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{ __('text.language_keywords') }}</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-12">
                    @if ($message = Session::get('success'))
                        <div id="alert_message" class="alert alert-success custom-alert alert-dismissible fade show" role="alert">
                            <span>{{ $message }}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div id="alert_message" class="alert alert-danger custom-alert alert-dismissible fade show" role="alert">
                            <strong>{{ __('Whoops') }}!</strong> {{ __('There were some problems with your input') }}.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('text.language_keywords') }}</h4>
                        </div>
                        <div class="card-body">
                          @if ($control_id != 0)
                                    <form action="{{ route('language-keyword.update', $id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="home">{{ __('Home') }} <span class="text-red">*</span></label>
                                                    <input id="home" type="text" name="home" class="form-control" value="{{ $language_keyword->home }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="about">{{ __('About') }} <span class="text-red">*</span></label>
                                                    <input id="about" type="text" name="about" class="form-control" value="{{ $language_keyword->about }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="portfolio">{{ __('Portfolio') }} <span class="text-red">*</span></label>
                                                    <input id="portfolio" type="text" name="portfolio" class="form-control" value="{{ $language_keyword->portfolio }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="contact">{{ __('Contact') }} <span class="text-red">*</span></label>
                                                    <input id="contact" type="text" name="contact" class="form-control" value="{{ $language_keyword->contact }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="hire_me">{{ __('Hire Me') }} <span class="text-red">*</span></label>
                                                    <input id="hire_me" type="text" name="hire_me" class="form-control" value="{{ $language_keyword->hire_me }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="testimonial">{{ __('Testimonial') }} <span class="text-red">*</span></label>
                                                    <input id="testimonial" type="text" name="testimonial" class="form-control" value="{{ $language_keyword->testimonial }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="by_admin">{{ __('By Admin') }} <span class="text-red">*</span></label>
                                                    <input id="by_admin" type="text" name="by_admin" class="form-control" value="{{ $language_keyword->by_admin }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="read_more">{{ __('Read More') }} <span class="text-red">*</span></label>
                                                    <input id="read_more" type="text" name="read_more" class="form-control" value="{{ $language_keyword->read_more }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="search_results">{{ __('Search Results') }} <span class="text-red">*</span></label>
                                                    <input id="search_results" type="text" name="search_results" class="form-control" value="{{ $language_keyword->search_results }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="nothing_found">{{ __('Nothing Found') }} <span class="text-red">*</span></label>
                                                    <input id="nothing_found" type="text" name="nothing_found" class="form-control" value="{{ $language_keyword->nothing_found }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="search_here">{{ __('Search...') }} <span class="text-red">*</span></label>
                                                    <input id="search_here" type="text" name="search_here" class="form-control" value="{{ $language_keyword->search_here }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="search">{{ __('Search') }} <span class="text-red">*</span></label>
                                                    <input id="search" type="text" name="search" class="form-control" value="{{ $language_keyword->search }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="blog_details">{{ __('Blog Details') }} <span class="text-red">*</span></label>
                                                    <input id="blog_details" type="text" name="blog_details" class="form-control" value="{{ $language_keyword->blog_details }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="reply">{{ __('Reply') }} <span class="text-red">*</span></label>
                                                    <input id="reply" type="text" name="reply" class="form-control" value="{{ $language_keyword->reply }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="leave_a_comment">{{ __('Leave A Comment') }} <span class="text-red">*</span></label>
                                                    <input id="leave_a_comment" type="text" name="leave_a_comment" class="form-control" value="{{ $language_keyword->leave_a_comment }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="your_name">{{ __('Your Name *') }} <span class="text-red">*</span></label>
                                                    <input id="your_name" type="text" name="your_name" class="form-control" value="{{ $language_keyword->your_name }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="your_job">{{ __('Your Job *') }} <span class="text-red">*</span></label>
                                                    <input id="your_job" type="text" name="your_job" class="form-control" value="{{ $language_keyword->your_job }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="select_rating">{{ __('Select Rating') }} <span class="text-red">*</span></label>
                                                    <input id="select_rating" type="text" name="select_rating" class="form-control" value="{{ $language_keyword->select_rating }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="your_feedback">{{ __('Your Feedback *') }} <span class="text-red">*</span></label>
                                                    <input id="your_feedback" type="text" name="your_feedback" class="form-control" value="{{ $language_keyword->your_feedback }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="your_comment">{{ __('Your Comment *') }} <span class="text-red">*</span></label>
                                                    <input id="your_comment" type="text" name="your_comment" class="form-control" value="{{ $language_keyword->your_comment }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="your_email">{{ __('Your Email *') }} <span class="text-red">*</span></label>
                                                    <input id="your_email" type="text" name="your_email" class="form-control" value="{{ $language_keyword->your_email }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="your_message">{{ __('Your Message *') }} <span class="text-red">*</span></label>
                                                    <input id="your_message" type="text" name="your_message" class="form-control" value="{{ $language_keyword->your_message }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="subject_here">{{ __('Subject *') }} <span class="text-red">*</span></label>
                                                    <input id="subject_here" type="text" name="subject_here" class="form-control" value="{{ $language_keyword->subject_here }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="send_message">{{ __('Send Message') }} <span class="text-red">*</span></label>
                                                    <input id="send_message" type="text" name="send_message" class="form-control" value="{{ $language_keyword->send_message }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="all">{{ __('All') }} <span class="text-red">*</span></label>
                                                    <input id="all" type="text" name="all" class="form-control" value="{{ $language_keyword->all }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="recent_posts">{{ __('Recent Posts') }} <span class="text-red">*</span></label>
                                                    <input id="recent_posts" type="text" name="recent_posts" class="form-control" value="{{ $language_keyword->recent_posts }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="do_you_need_a_project">{{ __('Do you need a project?') }} <span class="text-red">*</span></label>
                                                    <input id="do_you_need_a_project" type="text" name="do_you_need_a_project" class="form-control" value="{{ $language_keyword->do_you_need_a_project }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="view_all">{{ __('View All') }} <span class="text-red">*</span></label>
                                                    <input id="view_all" type="text" name="view_all" class="form-control" value="{{ $language_keyword->view_all }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="portfolio_details">{{ __('Portfolio Details') }} <span class="text-red">*</span></label>
                                                    <input id="portfolio_details" type="text" name="portfolio_details" class="form-control" value="{{ $language_keyword->portfolio_details }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="project_detail">{{ __('Project Detail') }} <span class="text-red">*</span></label>
                                                    <input id="project_detail" type="text" name="project_detail" class="form-control" value="{{ $language_keyword->project_detail }}" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="we_are_coming_soon">{{ __('We Are Coming Soon') }} <span class="text-red">*</span></label>
                                                    <input id="we_are_coming_soon" type="text" name="we_are_coming_soon" value="{{ $language_keyword->we_are_coming_soon }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="project_share">{{ __('Project Share') }} <span class="text-red">*</span></label>
                                                    <input id="project_share" type="text" name="project_share"  value="{{ $language_keyword->project_share }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="blog_share">{{ __('Blog Share') }} <span class="text-red">*</span></label>
                                                    <input id="blog_share" type="text" name="blog_share"  value="{{ $language_keyword->blog_share }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="send_review">{{ __('Send Review') }} <span class="text-red">*</span></label>
                                                    <input id="send_review" type="text" name="send_review"  value="{{ $language_keyword->send_review }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="your_review_is_pending_approval">{{ __('Your review is pending approval.') }} <span class="text-red">*</span></label>
                                                    <input id="your_review_is_pending_approval" type="text" name="your_review_is_pending_approval"  value="{{ $language_keyword->your_review_is_pending_approval }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="please_try_again">{{ __('Please try again.') }} <span class="text-red">*</span></label>
                                                    <input id="please_try_again" type="text" name="please_try_again"  value="{{ $language_keyword->please_try_again }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="your_message_has_been_delivered">{{ __('Your message has been delivered.') }} <span class="text-red">*</span></label>
                                                    <input id="your_message_has_been_delivered" type="text" name="your_message_has_been_delivered"  value="{{ $language_keyword->your_message_has_been_delivered }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="your_comment_is_pending_approval">{{ __('Your comment is pending approval.') }} <span class="text-red">*</span></label>
                                                    <input id="your_comment_is_pending_approval" type="text" name="your_comment_is_pending_approval"  value="{{ $language_keyword->your_comment_is_pending_approval }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="select">{{ __('Select') }} <span class="text-red">*</span></label>
                                                    <input id="select" type="text" name="select" value="{{ $language_keyword->select }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="services">{{ __('Services') }} <span class="text-red">*</span></label>
                                                    <input id="services" type="text" name="services" value="{{ $language_keyword->services }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="blog">{{ __('Blog') }} <span class="text-red">*</span></label>
                                                    <input id="blog" type="text" name="blog" value="{{ $language_keyword->blog }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="client">{{ __('Client') }} <span class="text-red">*</span></label>
                                                    <input id="client" type="text" name="client" value="{{ $language_keyword->client }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="project_name">{{ __('Project Name') }} <span class="text-red">*</span></label>
                                                    <input id="project_name" type="text" name="project_name" value="{{ $language_keyword->project_name }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="category">{{ __('Category') }} <span class="text-red">*</span></label>
                                                    <input id="category" type="text" name="category" value="{{ $language_keyword->category }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="value">{{ __('Value') }} <span class="text-red">*</span></label>
                                                    <input id="value" type="text" name="value" value="{{ $language_keyword->value }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="author">{{ __('Author') }} <span class="text-red">*</span></label>
                                                    <input id="author" type="text" name="author" value="{{ $language_keyword->author }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="start_date">{{ __('Start Date') }} <span class="text-red">*</span></label>
                                                    <input id="start_date" type="text" name="start_date" value="{{ $language_keyword->start_date }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="end_date">{{ __('End Date') }} <span class="text-red">*</span></label>
                                                    <input id="end_date" type="text" name="end_date" value="{{ $language_keyword->end_date }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="pages">{{ __('Pages') }} <span class="text-red">*</span></label>
                                                    <input id="pages" type="text" name="pages" value="{{ $language_keyword->pages }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="page_share">{{ __('Page Share') }} <span class="text-red">*</span></label>
                                                    <input id="page_share" type="text" name="page_share" value="{{ $language_keyword->page_share }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="gallery">{{ __('Gallery') }} <span class="text-red">*</span></label>
                                                    <input id="gallery" type="text" name="gallery" value="{{ $language_keyword->gallery }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="comments">{{ __('Comments') }} <span class="text-red">*</span></label>
                                                    <input id="comments" type="text" name="comments" value="{{ $language_keyword->comments }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="download_cv">{{ __('Download Cv') }} <span class="text-red">*</span></label>
                                                    <input id="download_cv" type="text" name="download_cv" value="{{ $language_keyword->download_cv }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="image">{{ __('Image') }} <span class="text-red">*</span></label>
                                                    <input id="image" type="text" name="image" value="{{ $language_keyword->image }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="size">{{ __('size') }} <span class="text-red">*</span></label>
                                                    <input id="size" type="text" name="size" value="{{ $language_keyword->size }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="add">{{ __('Add') }} <span class="text-red">*</span></label>
                                                    <input id="add" type="text" name="add" value="{{ $language_keyword->add }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="blogs">{{ __('Blogs') }} <span class="text-red">*</span></label>
                                                    <input id="blogs" type="text" name="blogs" value="{{ $language_keyword->blogs }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="new">{{ __('New') }} <span class="text-red">*</span></label>
                                                    <input id="new" type="text" name="new" value="{{ $language_keyword->new }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="feedback">{{ __('Feedback') }} <span class="text-red">*</span></label>
                                                    <input id="feedback" type="text" name="feedback" value="{{ $language_keyword->feedback }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                                <div class="form-group p-0 margin-bottom-20 mt-0">
                                                    <label for="no_records_created_yet">{{ __('No records created yet.') }} <span class="text-red">*</span></label>
                                                    <input id="no_records_created_yet" type="text" name="no_records_created_yet" value="{{ $language_keyword->no_records_created_yet }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="spinner fa fa-spinner fa-spin"></i> {{ __('text.update') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                              @else
                                <form action="{{ route('language-keyword.store') }}" method="POST">
                                    @csrf
                                    <input id="language_id" name="language_id" type="hidden" value="{{ $id }}">
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="home">{{ __('Home') }} <span class="text-red">*</span></label>
                                                <input id="home" type="text" name="home" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="about">{{ __('About') }} <span class="text-red">*</span></label>
                                                <input id="about" type="text" name="about" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="portfolio">{{ __('Portfolio') }} <span class="text-red">*</span></label>
                                                <input id="portfolio" type="text" name="portfolio" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="contact">{{ __('Contact') }} <span class="text-red">*</span></label>
                                                <input id="contact" type="text" name="contact" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="hire_me">{{ __('Hire Me') }} <span class="text-red">*</span></label>
                                                <input id="hire_me" type="text" name="hire_me" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="testimonial">{{ __('Testimonial') }} <span class="text-red">*</span></label>
                                                <input id="testimonial" type="text" name="testimonial" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="by_admin">{{ __('By Admin') }} <span class="text-red">*</span></label>
                                                <input id="by_admin" type="text" name="by_admin" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="read_more">{{ __('Read More') }} <span class="text-red">*</span></label>
                                                <input id="read_more" type="text" name="read_more" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="search_results">{{ __('Search Results') }} <span class="text-red">*</span></label>
                                                <input id="search_results" type="text" name="search_results" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="nothing_found">{{ __('Nothing Found') }} <span class="text-red">*</span></label>
                                                <input id="nothing_found" type="text" name="nothing_found" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="search_here">{{ __('Search...') }} <span class="text-red">*</span></label>
                                                <input id="search_here" type="text" name="search_here" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="search">{{ __('Search') }} <span class="text-red">*</span></label>
                                                <input id="search" type="text" name="search" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="blog_details">{{ __('Blog Details') }} <span class="text-red">*</span></label>
                                                <input id="blog_details" type="text" name="blog_details" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="reply">{{ __('Reply') }} <span class="text-red">*</span></label>
                                                <input id="reply" type="text" name="reply" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="leave_a_comment">{{ __('Leave A Comment') }} <span class="text-red">*</span></label>
                                                <input id="leave_a_comment" type="text" name="leave_a_comment" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="your_name">{{ __('Your Name *') }} <span class="text-red">*</span></label>
                                                <input id="your_name" type="text" name="your_name" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="your_job">{{ __('Your Job *') }} <span class="text-red">*</span></label>
                                                <input id="your_job" type="text" name="your_job" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="select_rating">{{ __('Select Rating') }} <span class="text-red">*</span></label>
                                                <input id="select_rating" type="text" name="select_rating" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="your_feedback">{{ __('Your Feedback *') }} <span class="text-red">*</span></label>
                                                <input id="your_feedback" type="text" name="your_feedback" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="your_comment">{{ __('Your Comment *') }} <span class="text-red">*</span></label>
                                                <input id="your_comment" type="text" name="your_comment" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="your_email">{{ __('Your Email *') }} <span class="text-red">*</span></label>
                                                <input id="your_email" type="text" name="your_email" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="your_message">{{ __('Your Message *') }} <span class="text-red">*</span></label>
                                                <input id="your_message" type="text" name="your_message" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="subject_here">{{ __('Subject *') }} <span class="text-red">*</span></label>
                                                <input id="subject_here" type="text" name="subject_here" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="send_message">{{ __('Send Message') }} <span class="text-red">*</span></label>
                                                <input id="send_message" type="text" name="send_message" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="all">{{ __('All') }} <span class="text-red">*</span></label>
                                                <input id="all" type="text" name="all" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="recent_posts">{{ __('Recent Posts') }} <span class="text-red">*</span></label>
                                                <input id="recent_posts" type="text" name="recent_posts" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="do_you_need_a_project">{{ __('Do you need a project?') }} <span class="text-red">*</span></label>
                                                <input id="do_you_need_a_project" type="text" name="do_you_need_a_project" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="view_all">{{ __('View All') }} <span class="text-red">*</span></label>
                                                <input id="view_all" type="text" name="view_all" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="portfolio_details">{{ __('Portfolio Details') }} <span class="text-red">*</span></label>
                                                <input id="portfolio_details" type="text" name="portfolio_details" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="project_detail">{{ __('Project Detail') }} <span class="text-red">*</span></label>
                                                <input id="project_detail" type="text" name="project_detail" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="we_are_coming_soon">{{ __('We Are Coming Soon') }} <span class="text-red">*</span></label>
                                                <input id="we_are_coming_soon" type="text" name="we_are_coming_soon" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="project_share">{{ __('Project Share') }} <span class="text-red">*</span></label>
                                                <input id="project_share" type="text" name="project_share" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="blog_share">{{ __('Blog Share') }} <span class="text-red">*</span></label>
                                                <input id="blog_share" type="text" name="blog_share" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="send_review">{{ __('Send Review') }} <span class="text-red">*</span></label>
                                                <input id="send_review" type="text" name="send_review" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="your_review_is_pending_approval">{{ __('Your review is pending approval.') }} <span class="text-red">*</span></label>
                                                <input id="your_review_is_pending_approval" type="text" name="your_review_is_pending_approval" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="please_try_again">{{ __('Please try again.') }} <span class="text-red">*</span></label>
                                                <input id="please_try_again" type="text" name="please_try_again" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="your_message_has_been_delivered">{{ __('Your message has been delivered.') }} <span class="text-red">*</span></label>
                                                <input id="your_message_has_been_delivered" type="text" name="your_message_has_been_delivered" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="your_comment_is_pending_approval">{{ __('Your comment is pending approval.') }} <span class="text-red">*</span></label>
                                                <input id="your_comment_is_pending_approval" type="text" name="your_comment_is_pending_approval" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="select">{{ __('Select') }} <span class="text-red">*</span></label>
                                                <input id="select" type="text" name="select" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="services">{{ __('Services') }} <span class="text-red">*</span></label>
                                                <input id="services" type="text" name="services" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="blog">{{ __('Blog') }} <span class="text-red">*</span></label>
                                                <input id="blog" type="text" name="blog" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="client">{{ __('Client') }} <span class="text-red">*</span></label>
                                                <input id="client" type="text" name="client" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="project_name">{{ __('Project Name') }} <span class="text-red">*</span></label>
                                                <input id="project_name" type="text" name="project_name" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="category">{{ __('Category') }} <span class="text-red">*</span></label>
                                                <input id="category" type="text" name="category" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="value">{{ __('Value') }} <span class="text-red">*</span></label>
                                                <input id="value" type="text" name="value" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="author">{{ __('Author') }} <span class="text-red">*</span></label>
                                                <input id="author" type="text" name="author" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="start_date">{{ __('Start Date') }} <span class="text-red">*</span></label>
                                                <input id="start_date" type="text" name="start_date" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="end_date">{{ __('End Date') }} <span class="text-red">*</span></label>
                                                <input id="end_date" type="text" name="end_date" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="pages">{{ __('Pages') }} <span class="text-red">*</span></label>
                                                <input id="pages" type="text" name="pages" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="page_share">{{ __('Page Share') }} <span class="text-red">*</span></label>
                                                <input id="page_share" type="text" name="page_share" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="gallery">{{ __('Gallery') }} <span class="text-red">*</span></label>
                                                <input id="gallery" type="text" name="gallery" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="comments">{{ __('Comments') }} <span class="text-red">*</span></label>
                                                <input id="comments" type="text" name="comments" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="download_cv">{{ __('Download Cv') }} <span class="text-red">*</span></label>
                                                <input id="download_cv" type="text" name="download_cv" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="image">{{ __('Image') }} <span class="text-red">*</span></label>
                                                <input id="image" type="text" name="image" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="size">{{ __('size') }} <span class="text-red">*</span></label>
                                                <input id="size" type="text" name="size" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="add">{{ __('Add') }} <span class="text-red">*</span></label>
                                                <input id="add" type="text" name="add" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="blogs">{{ __('Blogs') }} <span class="text-red">*</span></label>
                                                <input id="blogs" type="text" name="blogs" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="new">{{ __('New') }} <span class="text-red">*</span></label>
                                                <input id="new" type="text" name="new" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="feedback">{{ __('Feedback') }} <span class="text-red">*</span></label>
                                                <input id="feedback" type="text" name="feedback" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="no_records_created_yet">{{ __('No records created yet.') }} <span class="text-red">*</span></label>
                                                <input id="no_records_created_yet" type="text" name="no_records_created_yet" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success">
                                                <i class="spinner fa fa-spinner fa-spin"></i> {{ __('text.create') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@extends('layouts.frontend.master')

@section('title', 'Blog Details')

@section('content')

    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section section" style="@if (isset($breadcrumb)) background-image: url('{{ asset('fibonacci/adminpanel/assets/img/breadcrumb/'.$breadcrumb->breadcrumb_image) }}'); @else background-image: url('{{ asset('fibonacci/adminpanel/assets/img/dummy/1903x750.png') }}'); @endif">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb-inner text-center">
                        <h1>{{ $blog->title }}</h1>
                        <ul class="breadcrumb-links">
                            <li>
                                <a href="{{url('/')}}">{{ __('frontend.home') }}</a>
                            </li>
                            <li>
                                {{ $blog->title }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </section>
    <!-- Breadcrumb Section end -->

    <!-- Blog Single Section Start -->
    <section class="portfolio-single-section blog-single-section section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if ($message = Session::get('success'))
                        <div id="alert_message" class="alert alert-success custom-alert alert-dismissible fade show mb-50" role="alert">
                            <span>{{ __($message) }}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('frontend.close') }}">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div id="alert_message" class="alert alert-danger custom-alert alert-dismissible fade show mb-50" role="alert">
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
            <div class="blog-single-inner">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        @if ($blog->blog_image != '')
                            <img src="{{ asset('fibonacci/adminpanel/assets/img/blog/'.$blog->blog_image) }}" class="img-fluid round-item blog-single-img" alt="blog image">
                        @endif
                        <h2 class="blog-single-title">{{ $blog->title }}</h2>
                        <div class="blog-links">
                            <a href="#0" class="d-inline-block"><i class="far fa-user"></i>{{ __('frontend.by_admin')  }}</a>
                            <a href="#0" class="d-inline-block"><i class="far fa-clock"></i>{{ Carbon\Carbon::parse($blog->created_at)->isoFormat('LL') }}</a>
                            <a href="#0" class="d-inline-block"><i class="far fa-eye"></i>{{ $blog->view }}</a>
                        </div>
                        <p class="blog-inner-text">@php echo html_entity_decode($blog->description); @endphp</p>
                        <div class="comments-wrap comment-block-mt">
                            @if (count($comments) > 0)
                                <h5 class="inner-header-title">{{ __('frontend.comments') }} <span>({{ count($comments) }})</span></h5>
                            @endif
                            <div class="row">
                                <div class="col-md-12">
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($comments as $comment)
                                        @if ($i == 0)
                                            <div class="media comments-item mt-0">
                                                <img class="img-fluid round-item mr-4" src="{{ asset('fibonacci/adminpanel/assets/img/dummy/profile.png') }}" alt="profile image">
                                                <div class="media-body">
                                                    <h6 class="comments-title">{{ $comment->name }}</h6>
                                                    <p class="comment-text">{{ $comment->comment }}</p>
                                                    <a href="#" class="comments-reply-btn" data-scroll-nav="1">
                                                        <span class="fa fa-reply mr-2"></span> {{ __('frontend.reply') }}
                                                    </a>
                                                </div>
                                            </div>
                                        @else
                                            <div class="media comments-item">
                                                <img class="img-fluid round-item mr-4" src="{{ asset('fibonacci/adminpanel/assets/img/dummy/profile.png') }}" alt="profile image">
                                                <div class="media-body">
                                                    <h6 class="comments-title">{{ $comment->name }}</h6>
                                                    <p class="comment-text">{{ $comment->comment }}</p>
                                                    <a href="#" class="comments-reply-btn" data-scroll-nav="1">
                                                        <span class="fa fa-reply mr-2"></span> {{ __('frontend.reply') }}
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach
                                </div>
                                <div class="col-md-12" data-scroll-index="1">
                                    <div class="leave-comment-wrapper @if (count($comments) > 0) comment-block-mt @endif">
                                        <h5 class="inner-header-title">{{ __('frontend.leave_a_comment') }}</h5>
                                        <form  action="{{ route('comment.store') }}" method="POST">
                                            @csrf
                                            <input name="blog_id" type="hidden" value="{{ Crypt::encrypt($blog->id) }}">
                                            <input name="page" type="hidden" value="{{ Crypt::encrypt(98) }}">
                                            <div class="row">
                                                <div class="comment-form-group col-md-12">
                                                    <input type="text" name="name" class="comment-form-control" placeholder="{{ __('frontend.your_name') }}" required="">
                                                </div>
                                                <div class="comment-form-group col-md-12">
                                                    <textarea class="comment-form-control text-area" name="comment" cols="30" rows="5" placeholder="{{ __('frontend.your_comment') }}" required></textarea>
                                                </div>
                                                <div class="comment-form-group mb-0 col-md-12">
                                                    <button type="submit" class="default-button">
                                                        <i class="spinner fa fa-spinner fa-spin"></i> {{ __('frontend.send_message') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- .row -->
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="blog-sidebar">
                            <div class="blog-widgets">
                                <h5 class="inner-header-title">{{ __('frontend.search') }}</h5>
                                <form action="{{ route('blog-page.search') }}" method="POST">
                                    @csrf
                                    <div class="blog-search-bar position-relative">
                                        <input type="text" name="search" placeholder="{{ __('frontend.search_here') }}" class="search-form-control" required>
                                        <button type="submit" class="blog-search-btn"><span class="fa fa-search"></span></button>
                                    </div>
                                </form>
                            </div>
                            <div class="blog-widgets">
                                <h5 class="inner-header-title">{{ __('frontend.category') }}</h5>
                                <ul class="blog-category-list clearfix">
                                    <li>
                                        <a href="{{ url('/blog') }}">{{ __('frontend.all') }}</a>
                                    </li>
                                    @foreach ($blog_categories as $blog_category)
                                    <li>
                                        <a href="{{ url('/blog/category/'.$blog_category->category->category_slug) }}">{{$blog_category->category->category_name }}<span class="category-count">({{ $blog_category->category_count }})</span></a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="blog-widgets">
                                <h5 class="inner-header-title">{{ __('frontend.recent_posts') }}</h5>
                                @foreach ($recent_posts as $recent_post)
                                <div class="recent-post-item">
                                    <div class="recent-post-img mr-3">
                                        <a href="{{ route('blog-page.show',$recent_post->slug) }}">
                                            @if ($recent_post->blog_image == '')
                                                <img class="img-fluid round-item recent-post-img-size" src="{{ asset('fibonacci/adminpanel/assets/img/dummy/no_image.jpg') }}" alt="recent-blog image">
                                            @else
                                                <img class="img-fluid round-item recent-post-img-size" src="{{ asset('fibonacci/adminpanel/assets/img/blog/thumbnail1/'.$recent_post->blog_image) }}" alt="recent-blog image">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="recent-post-body">
                                        <a href="{{ route('blog-page.show',$recent_post->slug) }}">
                                            <h6 class="recent-post-title">{{ $recent_post->title }}</h6>
                                        </a>
                                        <p class="recent-post-date"><i class="mdi mdi-calendar-range-outline"></i>{{ Carbon\Carbon::parse($recent_post->created_at)->isoFormat('DD/MM/YYYY') }}</p>
                                    </div>
                                </div>
                                    @endforeach
                            </div>
                            <div class="blog-widgets">
                                <div class="project-details">
                                    <h5 class="inner-header-title">{{ __('frontend.blog_share') }}</h5>
                                    <ul class="project-share">
                                        <li>
                                            <a href="{{$blog->getShareUrl('whatsapp')}}" class="project-share-link" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{$blog->getShareUrl('twitter')}}" class="project-share-link" target="_blank"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{$blog->getShareUrl('pinterest')}}" class="project-share-link" target="_blank"><i class="fab fa-pinterest"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .row -->
            </div>
        </div>
        <!-- .container -->
    </section>
    <!-- Blog Single Section End -->

@endsection

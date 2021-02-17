@extends('layouts.frontend.master')

@section('title', 'Blog Category')

@section('content')

    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section section" style="@if (isset($breadcrumb)) background-image: url('{{ asset('fibonacci/adminpanel/assets/img/breadcrumb/'.$breadcrumb->breadcrumb_image) }}'); @else background-image: url('{{ asset('fibonacci/adminpanel/assets/img/dummy/1903x750.png') }}'); @endif">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb-inner text-center">
                        <h1>{{ $category->category_name }}</h1>
                        <ul class="breadcrumb-links">
                            <li>
                                <a href="{{url('/')}}">{{ __('frontend.home') }}</a>
                            </li>
                            <li>
                                {{ $category->category_name }}
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

    <!-- Blog Grid Section Start -->
    <section class="blog-grid-section section">
        <div class="container">
            <div class="blog-single-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            @foreach ($blogs as $blog)
                                <div class="col-md-6 col-lg-4">
                                    <div class="blog-item blog-grid-item">
                                        <div class="blog-img">
                                            <a href="{{ url('blog/'.$blog->slug) }}">
                                                @if ($blog->blog_image == '')
                                                    <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/no_image.jpg') }}" class="img-fluid round-item" alt="Blog image">
                                                @else
                                                    <img src="{{ asset('fibonacci/adminpanel/assets/img/blog/thumbnail1/'.$blog->blog_image) }}" class="img-fluid round-item" alt="Blog image">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="blog-inner">
                                            <div class="blog-meta">
                                                <span class="mr-2"><i class="mdi mdi-calendar-account-outline"></i>{{ __('frontend.by_admin') }}</span>
                                                <span><i class="mdi mdi-calendar-range"></i>{{ Carbon\Carbon::parse($blog->created_at)->isoFormat('MMMM') }} {{ Carbon\Carbon::parse($blog->created_at)->isoFormat('DD') }}</span>
                                            </div>
                                            <h5 class="blog-title">
                                                <a href="{{ url('blog/'.$blog->slug) }}">{{ $blog->title }}</a>
                                            </h5>
                                            <p class="blog-desc">{{ $blog->short_description }}</p>
                                            <a href="{{ url('blog/'.$blog->slug) }}" class="blog-more-link">{{ __('frontend.read_more') }} <i class="fa fa-angle-right ml-2"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- .row -->
            </div>
            <div class="pagination-wrap">
                {{ $blogs->links() }}
            </div>
        </div>
        <!-- .container -->
    </section>
    <!-- Blog Grid Section End -->

@endsection

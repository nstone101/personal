@extends('layouts.frontend.master')

@section('title', 'Project Details')

@section('content')

    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section section" style="@if (isset($breadcrumb)) background-image: url('{{ asset('fibonacci/adminpanel/assets/img/breadcrumb/'.$breadcrumb->breadcrumb_image) }}'); @else background-image: url('{{ asset('fibonacci/adminpanel/assets/img/dummy/1903x750.png') }}'); @endif">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb-inner text-center">
                        <h1>{{ $workshop_project->project_name }}</h1>
                        <ul class="breadcrumb-links">
                            <li>
                                <a href="{{url('/')}}">{{ __('frontend.home') }}</a>
                            </li>
                            <li>
                                {{ $workshop_project->project_name }}
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

    <!-- Portfolio Single Section Start -->
    <section class="portfolio-single-section section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if ($message = Session::get('success'))
                        <div id="alert_message" class="alert alert-success custom-alert alert-dismissible fade show mb-50" role="alert">
                            <span>{{ __($message) }}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
            <!-- .row -->
            @if (count($workshop_sliders) == 1)
                <div class="row">
                    <div class="col-lg-12">
                        <div class="portfolio-carousel owl-carousel owl-theme">
                            @foreach ($workshop_sliders as $slider)
                                <div class="item">
                                    <img src="{{ asset('fibonacci/adminpanel/assets/img/portfolio/slider/'.$slider->slider_image) }}" class="img-fluid" alt="slider image">
                                </div>
                                <div class="item">
                                    <img src="{{ asset('fibonacci/adminpanel/assets/img/portfolio/slider/'.$slider->slider_image) }}" class="img-fluid" alt="slider image">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- .row -->
            @elseif (count($workshop_sliders) > 1)
                <div class="row">
                    <div class="col-lg-12">
                        <div class="portfolio-carousel owl-carousel owl-theme">
                            @foreach ($workshop_sliders as $slider)
                                <div class="item">
                                    <img src="{{ asset('fibonacci/adminpanel/assets/img/portfolio/slider/'.$slider->slider_image) }}" class="img-fluid" alt="slider image">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- .row -->
            @endif
            <div class="portolio-single-inner">
                <div class="row">
                    <div class="col-md-7">
                        <p class="portfolio-inner-text">@php echo html_entity_decode($workshop_project->description); @endphp</p>
                    </div>
                    <div class="col-md-5">
                        <div class="project-details">
                            <h5 class="inner-header-title">{{ __('frontend.project_detail') }}</h5>
                            <ul class="project-info">
                                <li class="d-flex justify-content-between">
                                    <b>{{ __('frontend.project_name') }}</b>
                                    <span>{{ $workshop_project->project_name }}</span>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <b>{{ __('frontend.category') }}</b>
                                    <span>{{ $workshop_project->workshop_category->category_name }}</span>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <b>{{ __('frontend.client') }}</b>
                                    <span>{{ $workshop_project->client }}</span>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <b>{{ __('frontend.value') }}</b>
                                    <span>{{ $workshop_project->value }}</span>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <b>{{ __('frontend.author') }}</b>
                                    <span>{{ $workshop_project->author }}</span>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <b>{{ __('frontend.start_date') }}</b>
                                    <span>{{ Carbon\Carbon::parse($workshop_project->start_date)->isoFormat('LL') }}</span>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <b>{{ __('frontend.end_date') }}</b>
                                    <span>{{ Carbon\Carbon::parse($workshop_project->end_date)->isoFormat('LL') }}</span>
                                </li>
                            </ul>
                            <h5 class="inner-header-title">{{ __('frontend.project_share') }}</h5>
                            <ul class="project-share">
                                <li>
                                    <a href="{{$workshop_project->getShareUrl('whatsapp')}}" class="project-share-link" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                </li>
                                <li>
                                    <a href="{{$workshop_project->getShareUrl('twitter')}}" class="project-share-link" target="_blank"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="{{$workshop_project->getShareUrl('pinterest')}}" class="project-share-link" target="_blank"><i class="fab fa-pinterest"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-7" data-scroll-index="1">
                        <div class="comments-wrap comment-block-mt">
                            @if (count($comments) > 0)
                                <h5 class="inner-header-title">{{ __('frontend.comments') }} <span>({{ count($comments) }})</span></h5>
                            @endif
                            <div class="row">
                                <div class="col-md-12">
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach($comments as $comment)
                                        @if ($i == 0)
                                            <div class="media comments-item mt-0">
                                                <img class="img-fluid round-item mr-4" src="{{ asset('fibonacci/adminpanel/assets/img/dummy/profile.png') }}" alt="client-img">
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
                                                <img class="img-fluid round-item mr-4" src="{{ asset('fibonacci/adminpanel/assets/img/dummy/profile.png') }}" alt="client-img">
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

                            </div>
                            <!-- .row -->
                        </div>
                        <div class="leave-comment-wrapper @if (count($comments) > 0) comment-block-mt @endif">
                            <h5 class="inner-header-title">{{ __('frontend.leave_a_comment') }}</h5>
                            <form  action="{{ route('comment.store') }}" method="POST">
                                @csrf
                                <input name="workshop_project_id" type="hidden" value="{{ Crypt::encrypt($workshop_project->id) }}">
                                <input name="page" type="hidden" value="{{ Crypt::encrypt(112) }}">
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
        <!-- .container -->
    </section>
    <!-- Portfolio Single Section End -->

@endsection

@extends('layouts.admin-panel.master')

@section('title', 'Homepage Versions')

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.homepage_versions') }}</h4>
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
                        <a href="#">{{ __('text.settings') }}</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{ __('text.homepage_versions') }}</a>
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
                        @if ($message = Session::get('warning'))
                            <div id="alert_message" class="alert alert-warning custom-alert alert-dismissible fade show" role="alert">
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
                            <h4 class="card-title">{{ __('text.homepage_versions') }}</h4>
                        </div>
                        <div class="card-body">
                            @if(isset($homepage_version))
                                <form action="{{ route('homepage-version.update', $homepage_version->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                            @if (count($static_view) < 1)
                                           <a href="{{ url('admin-panel/static-view') }}">
                                               <label class="imagecheck margin-bottom-16 home-version">
                                                   <figure class="imagecheck-figure home-version">
                                                       <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/version/demo-1.png')}}" class="imagecheck-image" alt="version image">
                                                   </figure>
                                                   <p class="text-center @if ($panel_mode->mode == 1 ) page-title @endif">{{ __('text.static_view') }} <sub>({{ __('text.not_yet_created') }})</sub></p>
                                               </label>
                                           </a>
                                                @else
                                                <label class="imagecheck margin-bottom-16 home-version">
                                                    <input name="choose_version" value="1" type="radio" class="imagecheck-input" {{ ($homepage_version->choose_version == 1)? "checked" : "" }} >
                                                    <figure class="imagecheck-figure">
                                                        <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/version/demo-1.png')}}" class="imagecheck-image" alt="version image">
                                                    </figure>
                                                    <p class="text-center @if ($panel_mode->mode == 1 ) page-title @endif">{{ __('text.static_view') }}</p>
                                                </label>
                                            @endif
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                            @if (count($sliders) < 1)
                                               <a href="{{ url('admin-panel/slider-view') }}">
                                                   <label class="imagecheck margin-bottom-16 home-version">
                                                       <figure class="imagecheck-figure">
                                                           <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/version/demo-2.png') }}" class="imagecheck-image" alt="version image">
                                                       </figure>
                                                       <p class="text-center @if ($panel_mode->mode == 1 ) page-title @endif">{{ __('text.slider_view') }} <sub>({{ __('text.not_yet_created') }})</sub></p>
                                                   </label>
                                               </a>
                                                @else
                                                <label class="imagecheck margin-bottom-16 home-version">
                                                    <input name="choose_version" value="2" type="radio" class="imagecheck-input" {{ ($homepage_version->choose_version == 2)? "checked" : "" }}>
                                                    <figure class="imagecheck-figure">
                                                        <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/version/demo-2.png') }}" class="imagecheck-image" alt="version image">
                                                    </figure>
                                                    <p class="text-center @if ($panel_mode->mode == 1 ) page-title @endif">{{ __('text.slider_view') }}</p>
                                                </label>
                                                @endif
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                            @if (count($video) < 1)
                                               <a href="{{ url('admin-panel/video-view') }}">
                                                   <label class="imagecheck margin-bottom-16 home-version">
                                                       <figure class="imagecheck-figure">
                                                           <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/version/demo-3.png') }}" class="imagecheck-image" alt="version image">
                                                       </figure>
                                                       <p class="text-center @if ($panel_mode->mode == 1 ) page-title @endif">{{ __('text.video_view') }} @if(count($video) < 1) <sub>({{ __('text.not_yet_created') }})</sub> @endif</p>
                                                   </label>
                                               </a>
                                                @else
                                                <label class="imagecheck margin-bottom-16 home-version">
                                                    <input name="choose_version" value="3"  type="radio" class="imagecheck-input" {{ ($homepage_version->choose_version == 3)? "checked" : "" }}>
                                                    <figure class="imagecheck-figure">
                                                        <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/version/demo-3.png') }}" class="imagecheck-image" alt="version image">
                                                    </figure>
                                                    <p class="text-center @if ($panel_mode->mode == 1 ) page-title @endif">{{ __('text.video_view') }}</p>
                                                </label>
                                                @endif
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                            @if (count($static_view) < 1)
                                                <a  href="{{ url('admin-panel/static-view') }}">
                                                    <label class="imagecheck margin-bottom-16 home-version">
                                                        <figure class="imagecheck-figure home-version">
                                                            <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/version/demo-4.png')}}" class="imagecheck-image" alt="version image">
                                                        </figure>
                                                        <p class="text-center @if ($panel_mode->mode == 1 ) page-title @endif">{{ __('text.particles_effect_view') }} <sub>({{ __('text.not_yet_created') }})</sub></p>
                                                    </label>
                                                </a>
                                            @else
                                                <label class="imagecheck margin-bottom-16 home-version">
                                                    <input name="choose_version" value="4" type="radio" class="imagecheck-input" {{ ($homepage_version->choose_version == 4)? "checked" : "" }} >
                                                    <figure class="imagecheck-figure">
                                                        <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/version/demo-4.png')}}" class="imagecheck-image" alt="version image">
                                                    </figure>
                                                    <p class="text-center @if ($panel_mode->mode == 1 ) page-title @endif">{{ __('text.particles_effect_view') }}</p>
                                                </label>
                                            @endif
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                            @if (count($static_view) < 1)
                                                <a  href="{{ url('admin-panel/static-view') }}">
                                                    <label class="imagecheck margin-bottom-16 home-version">
                                                        <figure class="imagecheck-figure home-version">
                                                            <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/version/demo-5.png')}}" class="imagecheck-image" alt="version image">
                                                        </figure>
                                                        <p class="text-center @if ($panel_mode->mode == 1 ) page-title @endif">{{ __('text.ripples_effect_view') }} <sub>({{ __('text.not_yet_created') }})</sub></p>
                                                    </label>
                                                </a>
                                            @else
                                                <label class="imagecheck margin-bottom-16 home-version">
                                                    <input name="choose_version" value="5" type="radio" class="imagecheck-input" {{ ($homepage_version->choose_version == 5)? "checked" : "" }} >
                                                    <figure class="imagecheck-figure">
                                                        <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/version/demo-5.png')}}" class="imagecheck-image" alt="version image">
                                                    </figure>
                                                    <p class="text-center @if ($panel_mode->mode == 1 ) page-title @endif">{{ __('text.ripples_effect_view') }}</p>
                                                </label>
                                            @endif
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                            @if (count($static_view) < 1)
                                                <a  href="{{ url('admin-panel/static-view') }}">
                                                    <label class="imagecheck margin-bottom-16 home-version">
                                                        <figure class="imagecheck-figure home-version">
                                                            <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/version/demo-6.png')}}" class="imagecheck-image" alt="version image">
                                                        </figure>
                                                        <p class="text-center @if ($panel_mode->mode == 1 ) page-title @endif">{{ __('text.glitch_view') }} <sub>({{ __('text.not_yet_created') }})</sub></p>
                                                    </label>
                                                </a>
                                            @else
                                                <label class="imagecheck margin-bottom-16 home-version">
                                                    <input name="choose_version" value="6" type="radio" class="imagecheck-input" {{ ($homepage_version->choose_version == 6)? "checked" : "" }} >
                                                    <figure class="imagecheck-figure">
                                                        <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/version/demo-6.png')}}" class="imagecheck-image" alt="version image">
                                                    </figure>
                                                    <p class="text-center @if ($panel_mode->mode == 1 ) page-title @endif">{{ __('text.glitch_view') }}</p>
                                                </label>
                                            @endif
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                            <label class="imagecheck margin-bottom-16 home-version">
                                                <input name="choose_version" value="7" type="radio" class="imagecheck-input" {{ ($homepage_version->choose_version == 7)? "checked" : "" }} >
                                                <figure class="imagecheck-figure">
                                                    <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/version/demo-6.png')}}" class="imagecheck-image" alt="version image">
                                                </figure>
                                                <p class="text-center @if ($panel_mode->mode == 1 ) page-title @endif">{{ __('text.blog_view') }}</p>
                                            </label>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success">
                                                <i class="spinner fa fa-spinner fa-spin"></i> {{ __('text.choose_version') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <form action="{{ route('homepage-version.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                            @if (count($static_view) < 1)
                                                <a  href="{{ url('admin-panel/static-view') }}">
                                                    <label class="imagecheck margin-bottom-16 home-version">
                                                        <figure class="imagecheck-figure">
                                                            <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/version/demo-1.png') }}" class="imagecheck-image" alt="version image">
                                                        </figure>
                                                        <p class="text-center @if ($panel_mode->mode == 1 ) page-title @endif">{{ __('text.static_view') }} <sub>({{ __('text.not_yet_created') }})</sub></p>
                                                    </label>
                                                </a> @else
                                                <label class="imagecheck margin-bottom-16 home-version">
                                                    <input name="choose_version" value="1" type="radio" class="imagecheck-input">
                                                    <figure class="imagecheck-figure">
                                                        <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/version/demo-1.png') }}" class="imagecheck-image" alt="version image">
                                                    </figure>
                                                    <p class="text-center @if ($panel_mode->mode == 1 ) page-title @endif">{{ __('text.static_view') }}</p>
                                                </label>
                                                @endif
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                            @if (count($sliders) < 1)
                                                <a  href="{{ url('admin-panel/slider-view') }}">
                                                    <label class="imagecheck margin-bottom-16 home-version">
                                                        <figure class="imagecheck-figure">
                                                            <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/version/demo-2.png') }}" class="imagecheck-image" alt="version image">
                                                        </figure>
                                                        <p class="text-center @if ($panel_mode->mode == 1 ) page-title @endif">{{ __('text.slider_view') }} <sub>({{ __('text.not_yet_created') }})</sub></p>
                                                    </label>
                                                </a>
                                            @else
                                                <label class="imagecheck margin-bottom-16 home-version">
                                                    <input name="choose_version" value="2" type="radio" class="imagecheck-input">
                                                    <figure class="imagecheck-figure">
                                                        <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/version/demo-2.png')}}" class="imagecheck-image" alt="version image">
                                                    </figure>
                                                    <p class="text-center @if ($panel_mode->mode == 1 ) page-title @endif">{{ __('text.slider_view') }}</p>
                                                </label>
                                            @endif
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                            @if (count($video) < 1)
                                                <a  href="{{ url('admin-panel/video-view') }}">
                                                    <label class="imagecheck margin-bottom-16 home-version">
                                                        <figure class="imagecheck-figure">
                                                            <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/version/demo-3.png')}}" class="imagecheck-image" alt="version image">
                                                        </figure>
                                                        <p class="text-center @if ($panel_mode->mode == 1 ) page-title @endif">{{ __('text.video_view') }} <sub>({{ __('text.not_yet_created') }})</sub></p>
                                                    </label>
                                                </a>
                                                @else
                                                <label class="imagecheck margin-bottom-16 home-version">
                                                    <input name="choose_version" value="3"  type="radio" class="imagecheck-input">
                                                    <figure class="imagecheck-figure">
                                                        <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/version/demo-3.png')}}" class="imagecheck-image" alt="version image">
                                                    </figure>
                                                    <p class="text-center @if ($panel_mode->mode == 1 ) page-title @endif">{{ __('text.video_view') }}</p>
                                                </label>
                                            @endif
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                            @if (count($static_view) < 1)
                                                <a  href="{{ url('admin-panel/static-view') }}">
                                                    <label class="imagecheck margin-bottom-16 home-version">
                                                        <figure class="imagecheck-figure">
                                                            <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/version/demo-4.png') }}" class="imagecheck-image" alt="version image">
                                                        </figure>
                                                        <p class="text-center @if ($panel_mode->mode == 1 ) page-title @endif">{{ __('text.particles_effect_view') }} <sub>({{ __('text.not_yet_created') }})</sub></p>
                                                    </label>
                                                </a>
                                            @else
                                                <label class="imagecheck margin-bottom-16 home-version">
                                                    <input name="choose_version" value="4" type="radio" class="imagecheck-input">
                                                    <figure class="imagecheck-figure">
                                                        <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/version/demo-4.png')}}" class="imagecheck-image" alt="version image">
                                                    </figure>
                                                    <p class="text-center @if ($panel_mode->mode == 1 ) page-title @endif">{{ __('text.particles_effect_view') }}</p>
                                                </label>
                                            @endif
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                            @if (count($static_view) < 1)
                                                <a  href="{{ url('admin-panel/static-view') }}">
                                                    <label class="imagecheck margin-bottom-16 home-version">
                                                        <figure class="imagecheck-figure">
                                                            <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/version/demo-5.png') }}" class="imagecheck-image" alt="version image">
                                                        </figure>
                                                        <p class="text-center @if ($panel_mode->mode == 1 ) page-title @endif">{{ __('text.ripples_effect_view') }} <sub>({{ __('text.not_yet_created') }})</sub></p>
                                                    </label>
                                                </a>
                                            @else
                                                <label class="imagecheck margin-bottom-16 home-version">
                                                    <input name="choose_version" value="5" type="radio" class="imagecheck-input">
                                                    <figure class="imagecheck-figure">
                                                        <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/version/demo-5.png')}}" class="imagecheck-image" alt="version image">
                                                    </figure>
                                                    <p class="text-center @if ($panel_mode->mode == 1 ) page-title @endif">{{ __('text.ripples_effect_view') }}</p>
                                                </label>
                                            @endif
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                            @if (count($static_view) < 1)
                                                <a  href="{{ url('admin-panel/static-view') }}">
                                                    <label class="imagecheck margin-bottom-16 home-version">
                                                        <figure class="imagecheck-figure">
                                                            <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/version/demo-1.png') }}" class="imagecheck-image" alt="version image">
                                                        </figure>
                                                        <p class="text-center @if ($panel_mode->mode == 1 ) page-title @endif">{{ __('text.glitch_view') }} <sub>({{ __('text.not_yet_created') }})</sub></p>
                                                    </label>
                                                </a>
                                            @else
                                                <label class="imagecheck margin-bottom-16 home-version">
                                                    <input name="choose_version" value="6" type="radio" class="imagecheck-input">
                                                    <figure class="imagecheck-figure">
                                                        <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/version/demo-5.png') }}" class="imagecheck-image" alt="version image">
                                                    </figure>
                                                    <p class="text-center @if ($panel_mode->mode == 1 ) page-title @endif">{{ __('text.glitch_view') }}</p>
                                                </label>
                                            @endif
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                                <label class="imagecheck margin-bottom-16 home-version">
                                                    <input name="choose_version" value="7" type="radio" class="imagecheck-input">
                                                    <figure class="imagecheck-figure">
                                                        <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/version/demo-5.png') }}" class="imagecheck-image" alt="version image">
                                                    </figure>
                                                    <p class="text-center @if ($panel_mode->mode == 1 ) page-title @endif">{{ __('text.blog_view') }}</p>
                                                </label>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success">
                                                <i class="spinner fa fa-spinner fa-spin"></i> {{ __('text.choose_version') }}
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

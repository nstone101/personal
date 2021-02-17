@extends('layouts.admin-panel.master')

@section('title', 'Edit Social Media')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.edit_social_media') }}</h4>
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
                        <a href="#">{{ __('text.edit_social_media') }}</a>
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
                            <h4 class="card-title">{{ __('text.edit_social_media') }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('social-media.update', $social->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="social_media">{{ __('text.icon') }} <span class="text-red">*</span></label>
                                        <select class="form-control" name="social_media" id="social_media" required>
                                            <option></option>
                                            <option value="fab fa-facebook-f" {{ $social->social_media === "fab fa-facebook-f" ? 'selected' : '' }}>Facebook</option>
                                            <option value="fab fa-twitter" {{ $social->social_media === "fab fa-twitter" ? 'selected' : '' }}>Twitter</option>
                                            <option value="fab fa-google-plus-g" {{ $social->social_media === "fab fa-google-plus-g" ? 'selected' : '' }}>Google Plus</option>
                                            <option value="fab fa-youtube" {{ $social->social_media === "fab fa-youtube" ? 'selected' : '' }}>Youtube</option>
                                            <option value="fab fa-instagram" {{ $social->social_media === "fab fa-instagram" ? 'selected' : '' }}>Instagram</option>
                                            <option value="fab fa-vk" {{ $social->social_media === "fab fa-vk" ? 'selected' : '' }}>VK</option>
                                            <option value="fab fa-weibo" {{ $social->social_media === "fab fa-weibo" ? 'selected' : '' }}>Weibo</option>
                                            <option value="fab fa-weixin" {{ $social->social_media === "fab fa-weixin" ? 'selected' : '' }}>WeChat</option>
                                            <option value="fab fa-meetup" {{ $social->social_media === "fab fa-meetup" ? 'selected' : '' }}>Meetup</option>
                                            <option value="fab fa-wikipedia-w" {{ $social->social_media === "fab fa-wikipedia-w" ? 'selected' : '' }}>Wikipedia</option>
                                            <option value="fab fa-quora" {{ $social->social_media === "fab fa-quora" ? 'selected' : '' }}>Quora</option>
                                            <option value="fab fa-pinterest" {{ $social->social_media === "fab fa-pinterest" ? 'selected' : '' }}>Pinterest</option>
                                            <option value="fab fa-dribbble" {{ $social->social_media === "fab fa-dribbble" ? 'selected' : '' }}>Dribbble</option>
                                            <option value="fab fa-linkedin-in" {{ $social->social_media === "fab fa-linkedin-in" ? 'selected' : '' }}>Linkedin</option>
                                            <option value="fab fa-behance-square" {{ $social->social_media === "fab fa-behance-square" ? 'selected' : '' }}>Behance</option>
                                            <option value="fab fa-wordpress" {{ $social->social_media === "fab fa-wordpress" ? 'selected' : '' }}>WordPress</option>
                                            <option value="fab fa-blogger-b" {{ $social->social_media === "fab fa-blogger-b" ? 'selected' : '' }}>Blogger</option>
                                            <option value="fab fa-whatsapp" {{ $social->social_media === "fab fa-whatsapp" ? 'selected' : '' }}>Whatsapp</option>
                                            <option value="fab fa-telegram" {{ $social->social_media === "fab fa-telegram" ? 'selected' : '' }}>Telegram</option>
                                            <option value="fab fa-skype" {{ $social->social_media === "fab fa-skype" ? 'selected' : '' }}>Skype</option>
                                            <option value="fab fa-amazon" {{ $social->social_media === "fab fa-amazon" ? 'selected' : '' }}>Amazon</option>
                                            <option value="fab fa-stack-overflow" {{ $social->social_media === "fab fa-stack-overflow" ? 'selected' : '' }}>Stack Overflow</option>
                                            <option value="fab fa-stack-exchange" {{ $social->social_media === "fab fa-stack-exchange" ? 'selected' : '' }}>Stack Exchange</option>
                                            <option value="fab fa-github" {{ $social->social_media === "fab fa-github" ? 'selected' : '' }}>Github</option>
                                            <option value="fab fa-android" {{ $social->social_media === "fab fa-android" ? 'selected' : '' }}>Android</option>
                                            <option value="fab fa-vimeo-v" {{ $social->social_media === "fab fa-vimeo-v" ? 'selected' : '' }}>Vimeo</option>
                                            <option value="fab fa-tumblr" {{ $social->social_media === "fab fa-tumblr" ? 'selected' : '' }}>Tumblr</option>
                                            <option value="fab fa-vine" {{ $social->social_media === "fab fa-vine" ? 'selected' : '' }}>Vine</option>
                                            <option value="fab fa-twitch" {{ $social->social_media === "fab fa-twitch" ? 'selected' : '' }}>Twitch</option>
                                            <option value="fab fa-flickr" {{ $social->social_media === "fab fa-flickr" ? 'selected' : '' }}>Flickr</option>
                                            <option value="fab fa-yahoo" {{ $social->social_media === "fab fa-yahoo" ? 'selected' : '' }}>Yahoo</option>
                                            <option value="fab fa-reddit" {{ $social->social_media === "fab fa-reddit" ? 'selected' : '' }}>Reddit</option>
                                            <option value="fas fa-rss" {{ $social->social_media === "fas fa-rs" ? 'selected' : '' }}>Rss</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="link">{{ __('text.link') }}</label>
                                        <input id="link" type="text" name="link" value="{{ $social->link }}" class="form-control" placeholder="{{ __('text.link_here') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="status">{{ __('text.status') }}</label>
                                        <select class="form-control" name="status" id="status">
                                            <option></option>
                                            <option value="1" {{ $social->status === 1 ? 'selected' : '' }}>{{ __('text.enable') }}</option>
                                            <option value="0" {{ $social->status === 0 ? 'selected' : '' }}>{{ __('text.disable') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success">
                                        <i class="spinner fa fa-spinner fa-spin"></i> {{__('text.update')}}
                                    </button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
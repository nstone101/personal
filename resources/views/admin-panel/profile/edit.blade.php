@extends('layouts.admin-panel.master')

@section('title','My Profile')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.my_profile') }}</h4>
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
                        <a href="#">{{ __('text.my_profile') }}</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-12">
                    @if($message = Session::get('success'))
                        <div id="alert_message" class="alert alert-success custom-alert alert-dismissible fade show" role="alert">
                            <span>{{ $message }}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div id="alert_message" class="alert alert-danger custom-alert alert-dismissible fade show" role="alert">
                            <strong>{{ __('Whoops!') }}</strong> {{ __('There were some problems with your input.') }}<br><br>
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
                            <h4 class="card-title">{{ __('text.edit_profile') }}</h4>
                        </div>
                        <div class="card-body">
                            <form  action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group p-0 margin-bottom-20 mt-0">
                                            <label for="name">{{ __('text.name') }} <span class="text-red">*</span></label>
                                            <input id="name" name="name" type="text" class="form-control" placeholder="{{ __('text.name_here') }}" value="{{ $user->name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group p-0 margin-bottom-20 mt-0">
                                            <label for="job">{{ __('text.job') }}</label>
                                            <input id="job" name="job" type="text" class="form-control" value="{{ $user->job }}"  placeholder="{{ __('text.job_here') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group p-0 margin-bottom-20 mt-0">
                                            <label for="email">{{ __('text.email') }} <span class="text-red">*</span></label>
                                            <input id="email" name="email" type="email" class="form-control"  placeholder="{{ __('text.email_here') }}" value="{{ $user->email }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group p-0 margin-bottom-20 mt-0">
                                            <label for="image">{{ __('text.image') }} (size 128x128)(.png, .jpg, .jpeg)</label>
                                            <input id="image" name="profile_image" type="file" class="form-control-file">
                                            @if (!empty($user->profile_image))
                                                <img src="{{ asset('fibonacci/adminpanel/assets/img/profile/'.$user->profile_image) }}" class="img-fluid image-size rounded-circle margin-top-20" alt="profile image">
                                            @else
                                                <img src="{{ asset('fibonacci/adminpanel/assets/img/dummy/128x128.png') }}" class="img-fluid image-size rounded-circle margin-top-20" alt="profile image">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success">
                                            <i class="spinner fa fa-spinner fa-spin"></i> {{ __('text.update') }}
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

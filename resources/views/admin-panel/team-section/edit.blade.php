@extends('layouts.admin-panel.master')

@section('title', 'Edit Team')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.edit_team') }}</h4>
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
                        <a href="#">{{ __('text.edit_team') }}</a>
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
                            <h4 class="card-title">{{ __('text.edit_team') }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('team-section.update', $team->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="name">{{ __('text.name') }} <span class="text-red">*</span></label>
                                        <input id="name" type="text" name="name" class="form-control"  value="{{ $team->name }}" placeholder="{{ __('text.name_here') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="job">{{ __('text.job') }} <span class="text-red">*</span></label>
                                        <input id="job" type="text" name="job" class="form-control"  value="{{ $team->job }}" placeholder="{{ __('text.job_here') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="face">{{ __('Facebook') }}</label>
                                        <input id="face" type="text" name="facebook" class="form-control"  value="{{ $team->facebook }}" placeholder="Facebook Here...">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="twitter">{{ __('Twitter') }}</label>
                                        <input id="twitter" type="text" name="twitter" class="form-control"  value="{{ $team->twitter }}" placeholder="Twitter Here...">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="instagram">{{ __('Instagram') }}</label>
                                        <input id="instagram" type="text" name="instagram" class="form-control"  value="{{ $team->instagram }}" placeholder="Instagram Here...">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="team">{{ __('text.image') }} ({{ __('text.size') }} 600x600)(.png, .jpg, .jpeg)</label>
                                        <input id="team" type="file" name="team_image" class="form-control-file">
                                        <img src="{{ asset('fibonacci/adminpanel/assets/img/team/'.$team->team_image) }}"  class="image-size margin-top-20" alt="feedback image">
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

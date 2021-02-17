@extends('layouts.admin-panel.master')

@section('title', 'Breadcrumbs')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.breadcrumb') }}</h4>
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
                        <a href="#">{{ __('text.breadcrumb') }}</a>
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
                            <h4 class="card-title">{{ __('text.breadcrumb') }}</h4>
                        </div>
                        <div class="card-body">
                            @if (isset($breadcrumbs))
                                <form action="{{ route('breadcrumbs.update', $breadcrumbs->id) }}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group margin-bottom-20 p-0">
                                        <label for="breadcrumb">{{ __('text.image') }} ({{ __('text.size') }} 1920x750)(.png, .jpg, .jpeg) <span class="text-red">*</span></label>
                                        <input id="breadcrumb" type="file" name="breadcrumb_image" class="form-control-file">
                                    </div>
                                    <div class="card custom-card margin-top-20">
                                        <div class="card-header custom-header bg-light-grey">
                                            <h6>{{ __('text.current_breadcrumb') }} </h6>
                                        </div>
                                        <div class="card-body">
                                            <img src="{{ asset('fibonacci/adminpanel/assets/img/breadcrumb/'.$breadcrumbs->breadcrumb_image) }}"  class="img-thumbnail mx-auto d-block w-50" alt="breadcrumb image">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group margin-bottom-20 p-0">
                                        <i><span class="text-red">{{ __('text.used_in_section') }}</span></i>
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
                                <form action="{{ route('breadcrumbs.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group margin-bottom-20 p-0">
                                            <label for="breadcrumb">{{ __('text.image') }} ({{ __('text.size') }} 1920x750)(.png, .jpg, .jpeg) <span class="text-red">*</span></label>
                                            <input id="breadcrumb" type="file" name="breadcrumb_image" class="form-control-file" required>
                                        </div>
                                        <div class="card custom-card margin-top-20">
                                            <div class="card-header custom-header bg-light-grey">
                                                <h6>{{ __('text.current_breadcrumb') }} </h6>
                                            </div>
                                            <div class="card-body">
                                                <span>{{ __('text.not_yet_created') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group margin-bottom-20 p-0">
                                            <i><span class="text-red">{{ __('text.used_in_section') }}</span></i>
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

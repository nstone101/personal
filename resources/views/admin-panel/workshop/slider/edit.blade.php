@extends('layouts.admin-panel.master')

@section('title', 'Edit Slider')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.edit_slider')  }}</h4>
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
                        <a href="#">{{ __('text.workshop')  }}</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{ __('text.edit_slider')  }}</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-12">
                    @if ($message = Session::get('success'))
                        <div id="alert_image" class="alert alert-success custom-alert alert-dismissible fade show" role="alert">
                            <span>{{ $message }}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div id="alert_image" class="alert alert-danger custom-alert alert-dismissible fade show" role="alert">
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
                            <h4 class="card-title">{{ __('text.edit_slider') }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('workshop-slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group p-0 margin-bottom-20 mt-0">
                                            <label for="workshop_preview_id">{{ __('text.project_name') }} <span class="text-red">*</span></label>
                                            <select  class="form-control" name="workshop_preview_id" id="workshop_preview_id" required>
                                                <option></option>
                                                @foreach ($projects as $project)
                                                    <option value="{{$project->id}}" {{ $project->id === $slider->workshop_preview_id ? 'selected' : '' }}>{{$project->project_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="form-group p-0 margin-bottom-20 mt-0">
                                            <label for="image">{{ __('text.image') }} ({{ __('text.size') }} 1200x800)(.png, .jpg, .jpeg)</label>
                                            <input id="image" type="file" name="slider_image" class="form-control-file">
                                            <img src="{{ asset('fibonacci/adminpanel/assets/img/portfolio/slider/'.$slider->slider_image) }}"  class="image-size margin-top-20" alt="slider image">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group p-0 margin-bottom-20 mt-0">
                                            <label for="order">{{ __('text.order') }}</label>
                                            <input id="order" type="number" name="order" class="form-control"  value="{{ $slider->order }}" placeholder="{{ __('text.order_here') }}">
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

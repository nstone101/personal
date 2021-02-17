@extends('layouts.admin-panel.master')

@section('title', 'Edit Resume Box')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.edit_resume') }}</h4>
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
                        <a href="#">{{ __('text.edit_resume') }}</a>
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
                            <h4 class="card-title">{{ __('text.edit_resume_box') }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('resume-section.update', $resume_box->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="icon">{{ __('text.icon') }} <span class="text-red">*</span></label>
                                        <input id="icon" type="text" name="icon" class="form-control" value="{{ $resume_box->icon }}"  placeholder="fas fa-user" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="title">{{ __('text.title') }} <span class="text-red">*</span></label>
                                        <input id="title" type="text" name="title" class="form-control" value="{{ $resume_box->title }}"  placeholder="{{ __('text.title_here') }}" required>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group p-0 margin-bottom-16 mt-0">
                                        <label for="desc">{{ __('text.description') }} <span class="text-red">*</span></label>
                                        <textarea id="desc" name="description" class="form-control" rows="5" placeholder="{{ __('text.description_here') }}" required>{{ $resume_box->description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="start">{{ __('text.start_year') }}</label>
                                        <input id="start" type="number" class="form-control" name="start_year" value="{{ $resume_box->start_year }}" placeholder="{{ __('text.start_year_here') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="end">{{ __('text.end_year') }}</label>
                                        <input id="end" type="number" class="form-control" name="end_year" value="{{ $resume_box->end_year }}" placeholder="{{ __('text.end_year_here') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="order">{{ __('text.order') }}</label>
                                        <input id="order" type="number" name="order" class="form-control" value="{{ $resume_box->order }}"  placeholder="{{ __('text.order_here') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <i><span class="text-red">{{ __('text.example_icon_usage') }}</span> fas fa-user</i><br>
                                        <i><span class="text-red">{{ __('text.free_use') }}</span><a href="https://fontawesome.com/" target="_blank"> {{ __('Font Awesome') }}</a></i>
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

@extends('layouts.admin-panel.master')

@section('title', 'Fixed Content')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.fixed_content') }}</h4>
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
                        <a href="#">{{ __('text.hero_settings') }}</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{ __('text.fixed_content') }}</a>
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
                        <div  id="alert_message" class="alert alert-danger custom-alert alert-dismissible fade show" role="alert">
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
                            <h4 class="card-title">{{ __('text.fixed_content') }}</h4>
                        </div>
                        <div class="card-body">
                            @if (isset($fixed_content))
                                <form action="{{ route('fixed-content.update', $fixed_content->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="coloredTitle">{{ __('text.colored_title') }} <span class="text-red">*</span></label>
                                                <input id="coloredTitle" type="text" name="colored_title" class="form-control" value="{{ $fixed_content->colored_title }}" placeholder="{{ __('text.colored_title_here') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="title_1">{{ __('text.animated_title') }} 1 <span class="text-red">*</span></label>
                                                <input id="title_1" type="text" name="animated_title_1" class="form-control" value="{{ $fixed_content->animated_title_1 }}" placeholder="{{ __('text.animated_title_1_here') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="title_2">{{ __('text.animated_title') }} 2 <span class="text-red">*</span></label>
                                                <input id="title_2" type="text" name="animated_title_2" class="form-control" value="{{$fixed_content->animated_title_2}}" placeholder="{{ __('text.animated_title_2_here') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="text">{{ __('text.text') }} <span class="text-red">*</span></label>
                                                <textarea id="text" name="description" class="form-control" rows="5" placeholder="{{ __('text.text_here') }}" required>{{ $fixed_content->description }}</textarea>
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
                                <form action="{{ route('fixed-content.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="coloredTitle">{{ __('text.colored_title') }} <span class="text-red">*</span></label>
                                                <input id="coloredTitle" type="text" name="colored_title" class="form-control"  placeholder="{{ __('text.colored_title_here') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="title_1">{{ __('text.animated_title') }} 1 <span class="text-red">*</span></label>
                                                <input id="title_1" type="text" name="animated_title_1" class="form-control"  placeholder="{{ __('text.animated_title_1_here') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="title_2">{{ __('text.animated_title') }} 2 <span class="text-red">*</span></label>
                                                <input id="title_2" type="text" name="animated_title_2" class="form-control"  placeholder="{{ __('text.animated_title_2_here') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="text">{{ __('text.text') }} <span class="text-red">*</span></label>
                                                <textarea id="text" name="description" class="form-control" rows="5" placeholder="{{ __('text.text_here') }}" required></textarea>
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

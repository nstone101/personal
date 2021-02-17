@extends('layouts.admin-panel.master')

@section('title', 'Edit Project')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.edit_project') }}</h4>
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
                        <a href="#">{{ __('text.workshop') }}</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{ __('text.edit_project') }}</a>
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
                            <h4 class="card-title">{{ __('text.edit_project') }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('workshop-project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group p-0 margin-bottom-20 mt-0">
                                            <label for="projectName">{{ __('text.project_name') }} <span class="text-red">*</span></label>
                                            <input id="projectName" name="project_name" class="form-control" value="{{ $project->project_name }}" placeholder="{{ __('text.project_name_here') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group p-0 margin-bottom-20 mt-0">
                                            <label for="category">{{ __('text.categories') }} <span class="text-red">*</span></label>
                                            <select  class="form-control" name="workshop_category_id" id="category" required>
                                                <option></option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $category->id === $project->workshop_category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="form-group p-0 margin-bottom-20 mt-0">
                                            <label for="editor">{{ __('text.description') }} <span class="text-red">*</span></label>
                                            <textarea id="editor" name="description" placeholder="{{ __('text.description_here') }}">@php echo html_entity_decode($project->description); @endphp</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group p-0 margin-bottom-20 mt-0">
                                            <label for="author">{{ __('text.author') }}</label>
                                            <input id="author" name="author" class="form-control" value="{{ $project->author }}" placeholder="{{ __('text.author_name_here') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group p-0 margin-bottom-20 mt-0">
                                            <label for="clientName">{{ __('text.client_name') }}</label>
                                            <input id="clientName" name="client" class="form-control" value="{{ $project->client }}" placeholder="{{ __('text.client_name_here') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group p-0 margin-bottom-20 mt-0">
                                            <label for="value">{{ __('text.value') }}</label>
                                            <input id="value" name="value" class="form-control" value="{{ $project->value }}" placeholder="{{ __('text.value_here') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div id="datepairExample" class="form-group p-0 margin-bottom-20 mt-0">
                                            <label for="startDate">{{ __('text.start_date') }}</label>
                                            <input id="startDate" name="start_date" type="text" value="{{$project->start_date }}" class="form-control date start" placeholder="{{ __('text.enter_start_date') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div id="datepairExample" class="form-group p-0 margin-bottom-20 mt-0">
                                            <label for="endDate">{{ __('text.end_date') }}</label>
                                            <input id="endDate" name="end_date" type="text" value="{{ $project->end_date }}" class="form-control date start" placeholder="{{ __('text.enter_end_date') }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="form-group p-0 margin-bottom-20 mt-0">
                                            <label for="previewImage">{{ __('text.image') }} ({{ __('text.size') }} 1200x1200)(.png, .jpg, .jpeg) <span class="text-red">*</span></label>
                                            <input id="previewImage" type="file" name="preview_image" class="form-control-file">
                                            <img class="image-size margin-top-20  img-fluid" src="{{ asset('fibonacci/adminpanel/assets/img/portfolio/thumbnail2/'.$project->preview_image) }}" alt="portfolio image">
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
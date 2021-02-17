@extends('layouts.admin-panel.master')

@section('title', 'Edit Blog')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.edit_blog') }}</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{ __('text.blog_page') }}</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{ __('text.edit_blog') }}</a>
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
                            <h4 class="card-title">{{ __('text.edit_blog') }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="title">{{ __('text.title') }} <span class="text-red">*</span></label>
                                        <input id="title" type="text" name="title" value="{{ $blog->title }}" class="form-control" placeholder="{{ __('text.title_here') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="editor">{{ __('text.short_description') }} <span class="text-red">*</span></label>
                                        <textarea name="short_description" class="form-control" placeholder="{{ __('text.short_description_here') }}" rows="3" required>{{ $blog->short_description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="editor">{{ __('text.content') }} <span class="text-red">*</span></label>
                                        <textarea id="editor" name="description" class="form-control" placeholder="{{ __('text.description_here') }}" rows="5">@php echo html_entity_decode($blog->description); @endphp</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="category">{{ __('text.categories') }}</label>
                                        <select class="form-control" name="category_id" id="category">
                                            <option></option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id}}" {{ $category->id === $blog->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group p-0">
                                        <label for="blogImage">{{ __('text.image') }} ({{ __('text.size') }} 1200x800)(.png, .jpg, .jpeg) <span class="text-red">*</span></label>
                                        <input id="blogImage" type="file" name="blog_image" class="form-control-file">
                                    </div>
                                    <div class="card margin-top-20">
                                        <div class="card-header custom-header bg-light-grey">
                                            <h6>{{ __('text.current_preview') }}</h6>
                                        </div>
                                        <div class="card-body">
                                            @if ($blog->blog_image == '')
                                                <i class="far fa-image custom-font-size image-margin img-fluid d-block text-center"></i>
                                            @else
                                                <img src="{{ asset('fibonacci/adminpanel/assets/img/blog/thumbnail1/'.$blog->blog_image) }}" class="img-fluid w-25 mx-auto d-block" alt="blog image">
                                            @endif
                                        </div>
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

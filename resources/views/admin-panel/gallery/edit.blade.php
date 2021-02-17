@extends('layouts.admin-panel.master')

@section('title', 'Edit Gallery')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.edit_gallery') }}</h4>
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
                        <a href="#">{{ __('text.gallery_page') }}</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{ __('text.edit_gallery') }}</a>
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
                            <h4 class="card-title">{{ __('text.edit_gallery') }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="displayName">{{ __('text.display_name') }}</label>
                                        <input id="displayName" type="text" name="display_name" value="{{ $gallery->display_name }}" class="form-control" placeholder="{{ __('text.display_name_here') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="category">{{ __('text.categories') }} <span class="text-red">*</span></label>
                                        <select class="form-control" name="gallery_category_id" id="category">
                                            <option></option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id}}" {{ $category->id === $gallery->gallery_category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="note">{{ __('text.note') }}</label>
                                        <input id="note" type="text" name="note" value="{{ $gallery->note }}" class="form-control" placeholder="{{ __('text.note_here') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="externalUrl">{{ __('text.external_url') }}</label>
                                        <input id="externalUrl" type="text" name="external_url" value="{{ $gallery->external_url }}" class="form-control" placeholder="{{ __('text.external_url_here') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="order">{{ __('text.order') }}</label>
                                        <input id="order" type="number" name="order" value="{{ $gallery->order }}" class="form-control" placeholder="{{ __('text.order_here') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="status">{{ __('text.status') }}</label>
                                        <select class="form-control" name="status" id="status">
                                            <option></option>
                                            <option value="1" {{ $gallery->status === 1 ? 'selected' : '' }}>{{ __('text.active') }}</option>
                                            <option value="0" {{ $gallery->status === 0 ? 'selected' : '' }}>{{ __('text.inactive') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group p-0">
                                        <label for="galleryImage">{{ __('text.image') }} ({{ __('text.size') }} 600x600)(.png, .jpg, .jpeg)</label>
                                        <input id="galleryImage" type="file" name="gallery_image" class="form-control-file">
                                    </div>
                                    <div class="card margin-top-20">
                                        <div class="card-header custom-header bg-light-grey">
                                            <h6>{{ __('text.current_image') }}</h6>
                                        </div>
                                        <div class="card-body">
                                            @if ($gallery->gallery_image == '')
                                                <i class="far fa-image custom-font-size image-margin img-fluid d-block text-center"></i>
                                            @else
                                                <img src="{{ asset('fibonacci/adminpanel/assets/img/gallery/'.$gallery->gallery_image) }}" class="img-fluid w-25 mx-auto d-block" alt="gallery image">
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

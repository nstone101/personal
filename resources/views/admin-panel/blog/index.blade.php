@extends('layouts.admin-panel.master')

@section('title', 'Blogs')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.blogs') }}</h4>
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
                        <a href="#">{{ __('text.blog_pages') }}</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{ __('text.blogs') }}</a>
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
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">{{ __('text.blogs') }}</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    {{ __('text.add_blog') }}
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->
                            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h5 class="modal-title">
														<span class="fw-mediumbold">{{ __('text.new') }}</span>
                                                <span class="fw-light">{{ __('text.blog') }}</span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                        <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="blogImage">{{ __('text.image') }} ({{ __('text.size') }} 1200x800)(.png, .jpg, .jpeg)</label>
                                                            <input id="blogImage" type="file" name="blog_image" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="category">{{ __('text.categories') }} <span class="text-red">*</span></label>
                                                            <select  class="form-control" name="category_id" id="category" required>
                                                                <option></option>
                                                                @foreach($categories as $category)
                                                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 ">
                                                        <div class="form-group form-group-default">
                                                            <label for="title">{{ __('text.title') }} <span class="text-red">*</span></label>
                                                            <input id="title" type="text" name="title" class="form-control" placeholder="{{ __('text.name_here') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 ">
                                                        <div class="form-group form-group-default">
                                                            <label for="content">{{ __('text.short_description') }} <span class="text-red">*</span></label>
                                                            <textarea class="form-control" name="short_description" placeholder="{{ __('text.short_description_here') }}" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 ">
                                                        <div class="form-group @if ($panel_mode->mode != 1 ) form-group-default @endif">
                                                            <label style="@if ($panel_mode->mode == 1 ) color: #444 !important; @endif" for="content">{{ __('text.content') }} <span class="text-red">*</span></label>
                                                            <textarea id="editor" class="form-control" style="color: red!important;" name="description" placeholder="{{ __('text.content_here') }}" ></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer no-bd">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="spinner fa fa-spinner fa-spin"></i> {{ __('text.add') }}
                                            </button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('text.close') }}</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                @if(count($blogs) > 0)
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>{{ __('text.image') }}</th>
                                        <th>{{ __('text.title') }}</th>
                                        <th>{{ __('text.category') }}</th>
                                        <th>{{ __('text.post_date') }}</th>
                                        <th>{{ __('text.view') }}</th>
                                        <th>{{ __('text.feature') }}</th>
                                        <th style="width: 10%">{{ __('text.action') }}</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>{{ __('text.image') }}</th>
                                        <th>{{ __('text.title') }}</th>
                                        <th>{{ __('text.category') }}</th>
                                        <th>{{ __('text.post_date') }}</th>
                                        <th>{{ __('text.view') }}</th>
                                        <th>{{ __('text.feature') }}</th>
                                        <th>{{ __('text.action') }}</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach ($blogs as $blog)
                                        <tr>
                                            <th>{{ $i++ }}</th>
                                            <td>
                                                @if ($blog->blog_image == '')
                                                    <i class="far fa-image custom-font-size image-margin img-fluid"></i>
                                                    @else
                                                    <img class="image-size image-margin img-fluid" src="{{ asset('fibonacci/adminpanel/assets/img/blog/thumbnail1/'.$blog->blog_image) }}" alt="blog image">
                                                @endif
                                            </td>
                                            <td><a href="{{ url('blog/'.$blog->slug) }}">{{ $blog->title }}</a></td>
                                            <td><span class="badge badge-pill badge-dark">@if (isset($blog->category->category_name)) {{ $blog->category->category_name }} @else {{ $blog->category_name }} @endif</span></td>
                                            <td>{{ Carbon\Carbon::parse($blog->created_at)->format('d.m.Y') }}</td>
                                            <td>{{ $blog->view }}</td>
                                            <td>
                                                <form action="{{ route('blog.update_feature', $blog->id) }}" method="POST">
                                                    @method('PATCH')
                                                    @csrf
                                                    @if ($blog->featured == 1)
                                                        <button type="submit" class="btn btn-danger">
                                                            {{ __('text.undo') }}
                                                        </button>
                                                    @else
                                                        <button type="submit" class="btn btn-success">
                                                            {{ __('text.featured') }}
                                                        </button>
                                                    @endif
                                                </form>
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('blog.edit',$blog->id) }}" data-toggle="tooltip"  class="btn btn-link btn-primary btn-lg" data-original-title="{{ __('text.edit_blog') }}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form class="d-inline-block" action="{{ route('blog.destroy', $blog->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                       <span data-toggle="modal" data-target="#deleteModel{{ $blog->id }}">
                                                            <button type="button" data-toggle="tooltip"  class="btn btn-link btn-danger btn-lg" data-original-title="{{ __('text.remove') }}">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                       </span>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deleteModel{{ $blog->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('text.delete') }}</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('close') }}">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-center">
                                                                        {{ __('text.you_wont_be_able_to_revert_this') }}
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('text.cancel') }}</button>
                                                                        <button type="submit" class="btn btn-success">{{ __('text.yes_delete_it') }}</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @else
                                    {{ __('text.no_records_created_yet') }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

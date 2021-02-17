@extends('layouts.admin-panel.master')

@section('title', 'Categories')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.categories') }}</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ url('admin-panel') }}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{ __('text.galleries') }}</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{ __('text.categories') }}</a>
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
                                <h4 class="card-title">{{ __('text.categories') }}</h4>
                                <div class="ml-auto">
                                    <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#addRowModal">
                                        <i class="fa fa-plus"></i>
                                        {{ __('text.add_category') }}
                                    </button>
                                </div>
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
                                                <span class="fw-light">{{ __('text.category') }}</span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('gallery-category.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                        <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="categoryName">{{ __('text.category_name') }} <span class="text-red">*</span></label>
                                                            <input id="categoryName" type="text" name="category_name" class="form-control" placeholder="{{ __('text.category_name_here') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="order">{{ __('text.order') }}</label>
                                                            <input id="order" type="number" name="order" class="form-control" placeholder="{{ __('text.order_here') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="status">{{ __('text.status') }}</label>
                                                            <select name="status" class="form-control" id="status">
                                                                <option></option>
                                                                <option value="1">{{ __('text.active') }}</option>
                                                                <option value="0">{{ __('text.inactive') }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="categoryImage">{{ __('text.image') }} ({{ __('text.size') }} 600x600)(.png, .jpg, .jpeg)</label>
                                                            <input id="categoryImage" type="file" name="category_image" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer no-bd">
                                            <button type="submit"  class="btn btn-primary">
                                                <i class="spinner fa fa-spinner fa-spin"></i> {{ __('text.add') }}
                                            </button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('text.close') }}</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                @if(count($categories) > 0)
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>{{ __('text.image') }}</th>
                                        <th>{{ __('text.category_name') }}</th>
                                        <th>{{ __('text.order') }}</th>
                                        <th>{{ __('text.status') }}</th>
                                        <th style="width: 10%">{{ __('text.action') }}</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>{{ __('text.image') }}</th>
                                        <th>{{ __('text.category_name') }}</th>
                                        <th>{{ __('text.order') }}</th>
                                        <th>{{ __('text.status') }}</th>
                                        <th>{{ __('text.action') }}</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <th scope="row">{{$i++}}</th>
                                            <td>
                                                @if ($category->category_image == '')
                                                    <img class="image-size image-margin img-fluid" src="{{ asset('fibonacci/adminpanel/assets/img/dummy/category.jpg') }}" alt="category image">
                                                @else
                                                    <img class="image-size image-margin img-fluid" src="{{ asset('fibonacci/adminpanel/assets/img/gallery/category/'.$category->category_image) }}" alt="category image">
                                                @endif
                                            </td>
                                            <td>{{$category->category_name}}</td>
                                            <td>{{$category->order}}</td>
                                            <td>
                                                @if($category->status === 0)
                                                    <span class="badge badge-danger">{{ __('text.disable') }}</span>
                                                @else
                                                    <span class="badge badge-success">{{ __('text.enable') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('gallery-category.edit',$category->id) }}" data-toggle="tooltip"  class="btn btn-link btn-primary btn-lg" data-original-title="{{ __('text.edit_category') }}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form class="d-inline-block" action="{{ route('gallery-category.destroy', $category->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                       <span data-toggle="modal" data-target="#deleteModel{{ $category->id }}">
                                                            <button type="button" data-toggle="tooltip"  class="btn btn-link btn-danger btn-lg" data-original-title="Remove">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                       </span>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deleteModel{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('text.delete') }}</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('text.close') }}">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-center">
                                                                        {{ __('text.you_wont_be_able_to_revert_this') }}!
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('text.cancel') }}</button>
                                                                        <button type="submit" class="btn btn-success">{{ __('text.yes_delete_it') }}!</button>
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

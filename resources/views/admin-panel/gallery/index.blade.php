@extends('layouts.admin-panel.master')

@section('title', 'Galleries')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.galleries') }}</h4>
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
                        <a href="#">{{ __('text.gallery_pages') }}</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{ __('text.galleries') }}</a>
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
                                <h4 class="card-title">{{ __('text.galleries') }}</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    {{ __('text.add_gallery') }}
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
                                                <span class="fw-light">{{ __('text.gallery') }}</span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                        <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="blogImage">{{ __('text.image') }} ({{ __('text.size') }} 600x600)(.png, .jpg, .jpeg)<span class="text-red">(max: 20)</span></label>
                                                            <input id="blogImage" type="file" name="gallery_image[]" class="form-control" multiple>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="category">{{ __('text.categories') }} <span class="text-red">*</span></label>
                                                            <select  class="form-control" name="gallery_category_id" id="category" required>
                                                                <option></option>
                                                                @foreach($categories as $category)
                                                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                                @endforeach
                                                            </select>
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
                                @if(count($galleries) > 0)
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>{{ __('text.image') }}</th>
                                        <th>{{ __('text.display_name') }}</th>
                                        <th>{{ __('text.category') }}</th>
                                        <th>{{ __('text.note') }}</th>
                                        <th>{{ __('text.external_url') }}</th>
                                        <th>{{ __('text.order') }}</th>
                                        <th>{{ __('text.status') }}</th>
                                        <th style="width: 10%">{{ __('text.action') }}</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>{{ __('text.image') }}</th>
                                        <th>{{ __('text.display_name') }}</th>
                                        <th>{{ __('text.category') }}</th>
                                        <th>{{ __('text.note') }}</th>
                                        <th>{{ __('text.external_url') }}</th>
                                        <th>{{ __('text.order') }}</th>
                                        <th>{{ __('text.status') }}</th>
                                        <th>{{ __('text.action') }}</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach ($galleries as $gallery)
                                        <tr>
                                            <th>{{ $i++ }}</th>
                                            <td>
                                                @if ($gallery->gallery_image == '')
                                                    <i class="far fa-image custom-font-size image-margin img-fluid"></i>
                                                    @else
                                                    <img class="image-size image-margin img-fluid" src="{{ asset('fibonacci/adminpanel/assets/img/gallery/'.$gallery->gallery_image) }}" alt="gallery image">
                                                @endif
                                            </td>
                                            <td>{{ $gallery->display_name }}</td>
                                            <td>
                                                <span class="badge badge-pill badge-dark">
                                                    @if (isset($gallery->gallery_category->category_name))
                                                        {{ $gallery->gallery_category->category_name }}
                                                    @else
                                                        {{ $gallery->gallery_category_name }}
                                                    @endif
                                                </span>
                                            </td>
                                            <td>{{ $gallery->note }}</td>
                                            <td>{{ $gallery->external_url }}</td>
                                            <td>{{ $gallery->order }}</td>
                                            <td>
                                                @if($gallery->status === 0)
                                                    <span class="badge badge-danger">{{ __('text.disable') }}</span>
                                                @else
                                                    <span class="badge badge-success">{{ __('text.enable') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('gallery.edit',$gallery->id) }}" data-toggle="tooltip"  class="btn btn-link btn-primary btn-lg" data-original-title="{{ __('text.edit_image') }}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form class="d-inline-block" action="{{ route('gallery.destroy', $gallery->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                       <span data-toggle="modal" data-target="#deleteModel{{ $gallery->id }}">
                                                            <button type="button" data-toggle="tooltip"  class="btn btn-link btn-danger btn-lg" data-original-title="{{ __('text.remove') }}">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                       </span>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deleteModel{{ $gallery->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('text.delete') }}</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('close') }}">
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

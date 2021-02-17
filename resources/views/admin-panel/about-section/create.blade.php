@extends('layouts.admin-panel.master')

@section('title', 'About Section')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('About Me') }}</h4>
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
                        <a href="#">{{ __('About Me') }}</a>
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
                            <h4 class="card-title">{{ __('About Me') }}</h4>
                        </div>
                        <div class="card-body">
                            @if(isset($about_section))
                                <form action="{{ route('about-section.update', $about_section->id) }}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="title">{{ __('Title') }} <span class="text-red">*</span></label>
                                        <input id="title" type="text" name="title" class="form-control" value="{{ $about_section->title }}"  placeholder="{{ __('Title Here...') }}" required>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group p-0 margin-bottom-16 mt-0">
                                        <label for="desc">{{ __('About Me') }} <span class="text-red">*</span></label>
                                        <textarea id="desc"  name="about_me" class="form-control" rows="5" placeholder="{{ __('About Me Here...') }}" required>{{ $about_section->about_me }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group p-0 margin-bottom-20 mt-0">
                                        <label for="videoLink">{{ __('Video Link') }}</label>
                                        <input id="videoLink" type="text" name="video_link" class="form-control" value="{{ $about_section->video_link }}" placeholder="{{ __('Video Link Here...') }}">
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <div class="form-group p-0">
                                        <label for="image">{{ __('Image') }} ({{ __('size') }} 520x520)(.png, .jpg, .jpeg)</label>
                                        <input id="image" type="file" name="about_image" class="form-control-file">
                                    </div>
                                    <div class="card custom-card margin-top-20">
                                        <div class="card-header custom-header bg-light-grey">
                                            <h6>{{ __('Current Image') }}</h6>
                                        </div>
                                        <div class="card-body">
                                            <img src="{{ asset('fibonacci/adminpanel/assets/img/about/'.$about_section->about_image) }}" class="img-fluid mx-auto d-block image-size" alt="about image">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <div class="form-group p-0">
                                        <label for="cv">{{ __('Cv File') }} (.pdf)</label>
                                        <input id="cv" type="file" name="cv_file" class="form-control-file">
                                    </div>
                                    <div class="card custom-card margin-top-20">
                                        <div class="card-header custom-header bg-light-grey">
                                            <h6>{{ __('text.current_file_name') }}</h6>
                                        </div>
                                        <div class="card-body">
                                            <span>{{ $about_section->cv_file }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('text.update') }}
                                    </button>
                                </div>
                            </div>
                                </form>
                                @else
                                <form action="{{ route('about-section.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="title">{{ __('text.title') }} <span class="text-red">*</span></label>
                                                <input id="title" type="text" name="title" class="form-control"  placeholder="{{ __('text.title_here') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="form-group p-0 margin-bottom-16 mt-0">
                                                <label for="about_me">{{ __('text.about_me') }} <span class="text-red">*</span></label>
                                                <textarea id="about_me"  class="form-control" name="about_me" rows="5" placeholder="{{ __('text.about_me_here') }}" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group p-0 margin-bottom-20 mt-0">
                                                <label for="videoLink">{{ __('text.video_link') }}</label>
                                                <input id="videoLink" type="text" name="video_link" class="form-control"  placeholder="{{ __('text.video_link_here') }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-6">
                                            <div class="form-group p-0">
                                                <label for="image">{{ __('text.image') }} ({{ __('text.size') }} 520x520)(.png, .jpg, .jpeg) <span class="text-red">*</span></label>
                                                <input id="image" type="file" name="about_image" class="form-control-file" required>
                                            </div>
                                            <div class="card custom-card margin-top-20">
                                                <div class="card-header custom-header bg-light-grey">
                                                    <h6>{{ __('text.current_image') }}</h6>
                                                </div>
                                                <div class="card-body">
                                                    <span>{{ __('text.not_yet_created') }}.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-6">
                                            <div class="form-group p-0">
                                                <label for="cv">{{ __('text.cv_file') }} (.pdf)</label>
                                                <input id="cv" type="file" name="cv_file" class="form-control-file">
                                            </div>
                                            <div class="card custom-card margin-top-20">
                                                <div class="card-header custom-header bg-light-grey">
                                                    <h6>{{ __('text.current_file_name') }}</h6>
                                                </div>
                                                <div class="card-body">
                                                    <span>{{ __('text.not_yet_created') }}.</span>
                                                </div>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">{{ __('text.information_list') }}</h4>
                                <div class="ml-auto">
                                        <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#addRowModal2">
                                            <i class="fa fa-plus"></i>
                                            {{ __('text.add_info') }}
                                        </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->
                            <div class="modal fade" id="addRowModal2" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold">{{ __('text.new') }}</span>
                                                <span class="fw-light">{{ __('text.info') }}</span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('text.close') }}">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('about-section.store_info') }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="text">{{ __('text.name') }} <span class="text-red">*</span></label>
                                                            <input id="text" type="text" name="name" class="form-control" placeholder="{{ __('text.name_here') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="description">{{ __('text.description') }} <span class="text-red">*</span></label>
                                                            <input id="description" type="text" name="description" class="form-control" placeholder="{{ __('text.description_here') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="order">{{ __('text.order') }}</label>
                                                            <input id="order" type="number" name="order" class="form-control" placeholder="{{ __('text.order_here') }}">
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
                                @if (count($infos) > 0)
                                    <table id="add-row" class="display table table-striped table-hover" >
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th>{{ __('text.name') }}</th>
                                            <th>{{ __('text.description') }}</th>
                                            <th>{{ __('text.order') }}</th>
                                            <th style="width: 10%">{{ __('text.action') }}</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th>{{ __('text.name') }}</th>
                                            <th>{{ __('text.description') }}</th>
                                            <th>{{ __('text.order') }}</th>
                                            <th>{{ __('text.action') }}</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach ($infos as $info)
                                            <tr>
                                                <th scope="row">{{ $i++ }}</th>
                                                <td>{{ $info->name }}</td>
                                                <td>{{ $info->description }}</td>
                                                <td>{{ $info->order }}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href="{{ route('about-section.edit_info', $info->id) }}" data-toggle="tooltip"  class="btn btn-link btn-primary btn-lg" data-original-title="{{__('text.edit_info')}}">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <form class="d-inline-block" action="{{ route('about-section.destroy_info', $info->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <span data-toggle="modal" data-target="#deleteModel{{ $info->id }}">
                                                        <button type="button" data-toggle="tooltip"  class="btn btn-link btn-danger btn-lg" data-original-title="{{ __('text.remove') }}">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        </span>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="deleteModel{{ $info->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('text.delete') }}</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('text.close') }}">
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

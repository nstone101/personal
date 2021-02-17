@extends('layouts.admin-panel.master')

@section('title','Dashboard')

@section('content')
    <div class="content">
        <div class="panel-header @if ($panel_mode->mode != 1 ) bg-primary-gradient @endif">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-sm-center flex-column flex-sm-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">{{ __('text.dashboard') }}</h2>
                        <h5 class="text-white op-7 mb-2">{{ __('text.welcome') }} {{ Auth::user()->name }}</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <form  action="{{ route('panel-mode.update_mode') }}" method="POST">
                            @method('PATCH')
                            @csrf
                            @if ($panel_mode->mode == 1)
                                <button type="submit" class="btn btn-white btn-border btn-round">Light Mode</button>
                            @else
                                <button type="submit" class="btn btn-white btn-border btn-round">Dark Mode</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row mt--2">
                <div class="col-md-12">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-around dashboard-circles pb-4 pt-4">
                                <div class="px-2 pb-2 pb-md-0 text-center col-sm">
                                    <div id="circles-1"></div>
                                    <h6 class="fw-bold mt-3 mb-0">{{ __('text.projects') }}@if ($projects_count == 0)<sub class="sub">({{__('text.not_yet_created')}})</sub>@endif</h6>
                                </div>
                                <div class="px-2 pb-2 pb-md-0 text-center col-sm">
                                    <div id="circles-2"></div>
                                    <h6 class="fw-bold mt-3 mb-0">{{ __('text.blogs') }}@if ($blogs_count == 0)<sub class="sub">({{__('text.not_yet_created')}})</sub>@endif</h6>
                                </div>
                                <div class="px-2 pb-2 pb-md-0 text-center col-sm">
                                    <div id="circles-3"></div>
                                    <h6 class="fw-bold mt-3 mb-0">{{ __('text.services') }}@if ($services_count == 0)<sub class="sub">({{__('text.not_yet_created')}})</sub>@endif</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                <h4 class="card-title">{{ __('text.recent_blogs')  }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if (count($blogs) > 0)
                                    <table id="add-row" class="display table table-striped table-hover" >
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th>{{ __('text.image') }}</th>
                                            <th>{{ __('text.title') }}</th>
                                            <th>{{ __('text.category') }}</th>
                                            <th>{{ __('text.post_date') }}</th>
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
                                                    @endif                                                </td>
                                                <td><a href="{{ url('blog/'.$blog->slug) }}">{{ $blog->title }}</a></td>
                                                <td><span class="badge badge-pill badge-dark">{{ $blog->category->category_name }}</span></td>
                                                <td>{{ Carbon\Carbon::parse($blog->created_at)->format('d.m.Y') }}</td>
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

@section('javascript')
    <script>
        var text_1 = JSON.parse('{{ $projects_count }}');
        var text_2 = JSON.parse('{{ $blogs_count }}');
        var text_3 = JSON.parse('{{ $services_count }}');
    </script>
@endsection
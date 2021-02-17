@extends('layouts.admin-panel.master')

@section('title', 'Pages')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.pages') }}</h4>
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
                        <a href="#">{{ __('text.pages') }}</a>
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
                                <h4 class="card-title">{{ __('text.pages') }}</h4>
                                <a href="{{ url('/admin-panel/any-page/add-any-page') }}" class="btn btn-primary btn-round ml-auto">
                                    <i class="fa fa-plus"></i>
                                    {{ __('text.add_page') }}
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if (count($any_pages) > 0)
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>{{ __('text.page_title') }}</th>
                                        <th>{{ __('text.order') }}</th>
                                        <th>{{ __('text.status') }}</th>
                                        <th style="width: 10%">{{ __('text.action') }}</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>{{ __('text.page_title') }}</th>
                                        <th>{{ __('text.order') }}</th>
                                        <th>{{ __('text.status') }}</th>
                                        <th>{{ __('text.action') }}</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach ($any_pages as $any_page)
                                        <tr>
                                            <th scope="row">{{$i++}}</th>
                                            <td>{{ $any_page->page_title }}</td>
                                            <td>{{ $any_page->order }}</td>
                                            <td>
                                                @if($any_page->status === 0)
                                                    <span class="badge badge-danger">{{ __('text.disable') }}</span>
                                                @else
                                                    <span class="badge badge-success">{{ __('text.enable') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('any-page.edit',$any_page->id) }}" data-toggle="tooltip"  class="btn btn-link btn-primary btn-lg" data-original-title="{{ __('text.edit_page') }}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form class="d-inline-block" action="{{ route('any-page.destroy', $any_page->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <span data-toggle="modal" data-target="#deleteModel{{ $any_page->id }}">
                                                           <button type="button" data-toggle="tooltip"  class="btn btn-link btn-danger btn-lg" data-original-title="{{ __('text.remove') }}">
                                                                     <i class="fa fa-times"></i>
                                                                 </button>
                                                        </span>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deleteModel{{ $any_page->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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

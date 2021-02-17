@extends('layouts.admin-panel.master')

@section('title', 'Counters')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ __('text.counters') }}</h4>
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
                        <a href="#">{{ __('text.counters') }}</a>
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
                                <h4 class="card-title">{{ __('text.counters') }}</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    {{ __('text.add_counter') }}
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
                                                <span class="fw-light">{{ __('text.counter') }}</span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('text.close') }}">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('counter-section.store') }}" method="POST">
                                            @csrf
                                        <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="icon">{{ __('text.icon') }} <span class="text-red">*</span></label>
                                                            <input id="icon" type="text" name="icon" class="form-control" placeholder="fas fa-user" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="order">{{ __('text.timer') }} <span class="text-red">*</span></label>
                                                            <input id="order" type="number" name="timer" class="form-control" placeholder="{{ __('text.timer_here') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="desc">{{ __('text.heading') }} <span class="text-red">*</span></label>
                                                            <input id="desc" name="heading" class="form-control" placeholder="{{ __('text.heading_here') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <i><span class="text-red">{{ __('text.example_icon_usage') }}</span> fas fa-user</i><br>
                                                            <i><span class="text-red">{{ __('text.free_use') }}</span><a href="https://fontawesome.com/" target="_blank"> {{ __('Font Awesome') }}</a></i>
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
                                @if(count($counters) > 0)
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>{{ __('text.icon') }}</th>
                                        <th>{{ __('text.timer') }}</th>
                                        <th>{{ __('text.heading') }}</th>
                                        <th style="width: 10%">{{ __('text.action') }}</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>{{ __('text.icon') }}</th>
                                        <th>{{ __('text.timer') }}</th>
                                        <th>{{ __('text.heading') }}</th>
                                        <th>{{ __('text.action') }}</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach ($counters as $counter)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td><i class="{{ $counter->icon }}"></i></td>
                                            <td>{{ $counter->timer }} </td>
                                            <td>{{ $counter->heading }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('counter-section.edit',$counter->id) }}" data-toggle="tooltip"  class="btn btn-link btn-primary btn-lg" data-original-title="{{ __('text.edit_counter') }}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form class="d-inline-block" action="{{ route('counter-section.destroy', $counter->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <span data-toggle="modal" data-target="#deleteModel{{ $counter->id }}">
                                                        <button type="button" data-toggle="tooltip"  class="btn btn-link btn-danger btn-lg" data-original-title="{{ __('text.remove') }}">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        </span>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deleteModel{{ $counter->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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

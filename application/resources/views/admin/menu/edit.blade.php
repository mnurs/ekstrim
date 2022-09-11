@extends('layouts.main')
@section('title', __('Menu Edit'))
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-6">
                    <div class="page-header-title">
                        <i class="ik ik-edit bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Menu')}}</h5>
                            <span>{{ __('Set Menu Items')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">{{ __('Menu')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Create')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @csrf
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="image-group">
                                <div class="form-group">
                                    <label for="">{{ __('Label')}} <span class="text-danger">*</span> </label> <br>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="label"  class="form-control" placeholder="{{ __('Menu label here') }}" value="{{ $menu->label }}">
                                        <div class="input-group-append">
                                            <select class="form-control cus-w90" name="status">
                                                <option value="1">{{ __('Active') }}</option>
                                                <option value="2">{{ __('Draft') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <span class="text-danger">{{ $errors->first('label') . ' ' . $errors->first('status') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>{{ __('Add Menu Item')}}</h3></div>
                    <div class="card-body">
                        <p>{{ __('Click the add button to add another item')}}</p>
                        <p>
                            @if(Session::has('menu_items_error'))
                                <span class="text-danger">{{ __('Something Wrong ( * fild are required)') }}</span>
                            @endif
                        </p>
                        <form class="repeater" action="{{ route('menu_item.store') }}" method="POST">
                            @csrf
                            <div data-repeater-list="menu_items">
                                @if($menu_items->count() < 1)
                                <div data-repeater-item class="d-flex flex-wrap mb-2">
                                    <div class="row cus-menu-w">
                                        <div class="col-md-3">
                                            <div class="form">
                                                <input type="text" name="item_label" class="form-control" placeholder="{{ __('Label *') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form">
                                                <input type="text" class="form-control" name="url" placeholder="{{ __('URL *') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form">
                                                <input type="text" class="form-control" name="icon" placeholder="{{ __('Icon') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form">
                                                <input type="text" class="form-control" name="css_class" placeholder="{{ __('CSS Class') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <button data-repeater-delete type="button" class="btn btn-danger btn-icon ml-2" ><i class="ik ik-trash-2"></i></button>
                                </div>
                                @else
                                @foreach($menu_items as $menu_item)
                                <div data-repeater-item class="d-flex flex-wrap mb-2">
                                    <div class="row cus-menu-w">
                                        <div class="col-md-3">
                                            <div class="form">
                                                <input type="text" name="item_label" class="form-control" placeholder="{{ __('Label *') }}" value="{{ $menu_item->label }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form">
                                                <input type="text" class="form-control" name="url" placeholder="{{ __('URL *') }}" value="{{ $menu_item->url }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form">
                                                <input type="text" class="form-control" name="icon" placeholder="{{ __('Icon') }}" value="{{ $menu_item->icon }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form">
                                                <input type="text" class="form-control" name="css_class" placeholder="{{ __('CSS Class') }}" value="{{ $menu_item->css_class }}">
                                            </div>
                                        </div>
                                    </div>
                                    <button data-repeater-delete type="button" class="btn btn-danger btn-icon ml-2" ><i class="ik ik-trash-2"></i></button>
                                </div>
                              @endforeach
                            @endif
                            </div>
                            <button data-repeater-create type="button" class="btn btn-success btn-icon ml-2 mb-2"><i class="ik ik-plus"></i></button>
                            <br>
                            <br>
                            <div class="another">
                                <div>
                                    <div class="">
                                        <div class="card-header"><h3>{{ __('Items Save To *') }}</h3></div>
                                        <div class="card-body">
                                            <div class="border-checkbox-section">
                                                <div class="border-checkbox-group border-checkbox-group-success">
                                                    <input {{ $menu_position->position == 1 ? 'checked' :'' }} class="border-checkbox" checked type="radio" value="1" name="position" id="checkbox1">
                                                    <label class="border-checkbox-label" for="checkbox1">{{ __('Header Menu')}}</label>
                                                </div>
                                            </div>
                                            <div class="border-checkbox-section">
                                                <div class="border-checkbox-group border-checkbox-group-success">
                                                    <input {{ $menu_position->position == 2 ? 'checked' :'' }} class="border-checkbox" type="radio" value="2" name="position" id="checkbox2">
                                                    <label class="border-checkbox-label" for="checkbox2">{{ __('Quick Links')}}</label>
                                                </div>
                                            </div>
                                            <div class="border-checkbox-section">
                                                <div class="border-checkbox-group border-checkbox-group-success">
                                                    <input {{ $menu_position->position == 3 ? 'checked' :'' }} class="border-checkbox" type="radio" name="position" value="3" id="checkbox3">
                                                    <label class="border-checkbox-label" for="checkbox3">{{ __('Support & Help')}}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                            <input type="hidden" name="status" value="{{ $menu->status }}">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
    <script src="{{ asset('plugins/jquery.repeater/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('js/repeater-active.js') }}"></script>
    @endpush
@endsection

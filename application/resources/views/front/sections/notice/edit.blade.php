@extends('layouts.main')
@section('title', __('Notice Edit'))
@section('content')
    <!-- push external head elements to head -->
    @push('head')
    <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/mohithg-switchery/dist/switchery.min.css') }}">
    @endpush
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-6">
                    <div class="page-header-title">
                        <i class="ik ik-edit bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Notice')}}</h5>
                            <span>{{ __('Edit notice')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('notice.index') }}">{{ __('Notice')}}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <form action="{{ route('notice.update', $notice->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="icon">{{ __('Icon Class') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="icon" name="icon" placeholder="{{ __('Icon Class here') }}" value="{{ $notice->icon }}">
                                <span class="text-danger">{{ __($errors->first('icon')) }}</span>
                            </div>
                            <div class="form-group">
                                <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                <textarea id="title" name="title" class="form-control ">{{ $notice->title }}</textarea>
                                <span class="text-danger">{{ __($errors->first('title')) }}</span>
                            </div>
                            <div class="form-group">
                                <label for="description">{{ __('Description') }} <span class="text-danger">*</span></label>
                                <textarea id="description" name="description" class="form-control ">{{ $notice->description }}</textarea>
                                <span class="text-danger">{{ __($errors->first('description')) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="button_text">{{ __('Button Text') }} <span class="text-danger">*</span></label>
                                <input id="button_text" type="text" class="form-control" name="button_text" placeholder="{{ __('Button Text') }}" value="{{ $notice->button_text }}">
                                <span class="text-danger">{{ __($errors->first('button_text')) }}</span>
                            </div>
                            <div class="form-group">
                                <label for="button_url">{{ __('Button URL')}} <span class="text-danger">*</span></label> <br>
                                <input type="text" id="button_url" name="button_url" class="form-control" placeholder="{{ __('Button URL') }}" value="{{ $notice->button_url }}">
                                <span class="text-danger">{{ __($errors->first('button_url')) }}</span>
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('Status')}} <span class="text-danger">*</span> </label>
                                <select class="form-control select2" name="status">
                                    <option value="1" {{ $notice->status == 1 ? 'selected' : '' }}>{{ __('Publish') }}</option>
                                    <option value="2" {{ $notice->status == 2 ? 'selected' : '' }}>{{ __('Draft') }}</option>
                                </select>
                                <span class="text-danger">{{ __($errors->first('status')) }}</span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- push external js -->
    @push('script')
        <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
        <script src="{{ asset('plugins/jquery.repeater/jquery.repeater.min.js') }}"></script>
        <script src="{{ asset('plugins/mohithg-switchery/dist/switchery.min.js') }}"></script>
        <script src="{{ asset('js/select2-active-new.js') }}"></script>
    @endpush
@endsection

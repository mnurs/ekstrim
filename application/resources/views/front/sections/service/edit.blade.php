@extends('layouts.main')
@section('title', __('Service Edit'))
@section('content')
    <!-- push external head elements to head -->
    @push('head')
    <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/mohithg-switchery/dist/switchery.min.css') }}">
    @endpush
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-6">
                    <div class="page-header-title">
                        <i class="ik ik-edit bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Service')}}</h5>
                            <span>{{ __('Edit service item')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('service.index') }}">{{ __('News')}}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <form action="{{ route('service.update', $service->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="{{ __('Title here') }}" value="{{ $service->title }}">
                                <span class="text-danger">{{ __($errors->first('title')) }}</span>
                            </div>
                            <div class="form-group">
                                <label for="description">{{ __('Description') }} <span class="text-danger">*</span></label>
                                <textarea id="description" name="description" class="form-control" rows="5">{{ $service->description }}</textarea>
                                <span class="text-danger">{{ __($errors->first('description')) }}</span>
                            </div>
                            <div class="form-group">
                                <label for="details">{{ __('Details') }} <span class="text-danger">*</span></label>
                                <textarea id="details" name="details" class="form-control html-editor">{{ $service->details }}</textarea>
                                <span class="text-danger">{{ __($errors->first('details')) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="image-group">
                                <div class="form-group">
                                    <label for="">{{ __('Image')}} <span class="text-danger">*</span> </label> <br>
                                    <img id="target" class="cus-mw-200" src="{{ asset(path_service_image() . $service->image) }}" alt="{{ __('test') }}">
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="image" type="file" class="custom-file-input" id="putImage">
                                            <label data-id="showname" class="custom-file-label" for="validatedInputGroupCustomFile">{{ __('Choose file...') }}</label>
                                        </div>
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="image-group">
                                <div class="form-group">
                                    <label for="">{{ __('Icon')}} <span class="text-danger">*</span> </label> <br>
                                    <img id="target2" class="cus-mw-200" src="{{ asset(path_service_image() . $service->icon) }}" alt="{{ __('test') }}">
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input name="icon" type="file" class="custom-file-input" id="putImage2">
                                        <label data-id="showname" class="custom-file-label" for="validatedInputGroupCustomFile">{{ __('Choose file...') }}</label>
                                    </div>
                                    <span class="text-danger">{{ $errors->first('icon') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input">{{ __('Tags')}} <span class="text-danger">*</span></label> <br>
                                <input type="text" id="tags" name="tags" class="form-control" value="{{ $service->tags }}">
                                <br>
                                <span class="text-danger">{{ $errors->first('tags') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('Status')}} <span class="text-danger">*</span> </label>
                                <select class="form-control select2" name="status">
                                    <option value="1" {{ $service->status == 1 ? 'selected' : '' }}>{{ __('Publish') }}</option>
                                    <option value="2" {{ $service->status == 2 ? 'selected' : '' }}>{{ __('Draft') }}</option>
                                </select>
                                <span class="text-danger">{{ $errors->first('status') }}</span>
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
        <script src="{{ asset('plugins/summernote/summernote.min.js') }}"></script>
        <script src="{{asset('js/summernote.js')}}"></script>
        <script src="{{ asset('plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
        <script src="{{ asset('plugins/jquery.repeater/jquery.repeater.min.js') }}"></script>
        <script src="{{ asset('plugins/mohithg-switchery/dist/switchery.min.js') }}"></script>
        <script src="{{ asset('js/select2-active.js') }}"></script>
    @endpush
@endsection

@extends('layouts.main')
@section('title', __('Gallery Section'))
@section('content')
@push('head')
<link rel="stylesheet" href="{{ asset('plugins/mohithg-switchery/dist/switchery.min.css') }}">
@endpush
<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-6">
                <div class="page-header-title">
                    <i class="ik ik-edit bg-blue"></i>
                    <div class="d-inline">
                        <h5>{{ __('Gallery')}}</h5>
                        <span>{{ __('List of gallery')}}</span>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('gallery.index') }}">{{ __('Gallery')}}</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <form action="{{ route(!empty($gallery) ? 'gallery_section.update' : 'gallery_section.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="image-group">
                            <div class="form-group">
                                <label for="">{{ __('Image')}} <span class="text-danger">*</span> </label> <br>
                                <img id="target" class="cus-mw-200" src="{{ !empty($gallery) ? asset(path_gallery_image() . $gallery->image) : asset(path_noimage_image().'no-image-200.jpg') }}" alt="{{ __('test') }}">
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input value="{{ isset($gallery) ? asset(path_gallery_image().$gallery->image) : ''}}" name="image" type="file" class="custom-file-input" id="putImage">
                                        <label data-id="showname" class="custom-file-label" for="validatedInputGroupCustomFile">{{ __('Choose file...') }}</label>
                                    </div>
                                </div>
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mr-2">{{ __('Save') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-6">
            <!-- Section -->
            <form action="{{ route('section.title.store', 'gallery-section') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h3>{{ __('Gallery Section') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="{{ __('Title here') }}" value="{{ section_title('gallery-section') ? section_title('gallery-section')->title : '' }}">
                            <span class="text-danger">{{ __($errors->first('title')) }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ __('Description') }} <span class="text-danger">*</span></label>
                            <textarea id="description" name="description" class="form-control" rows="5">{{ section_title('gallery-section') ? section_title('gallery-section')->description : '' }}</textarea>
                            <span class="text-danger">{{ __($errors->first('description')) }}</span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mr-2">{{ __('Save') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- push external js -->
@push('script')
<script src="{{ asset('plugins/jquery.repeater/jquery.repeater.min.js') }}"></script>
@endpush
@endsection

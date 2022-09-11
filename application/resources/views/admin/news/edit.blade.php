@extends('layouts.main')
@section('title', __('News Edit'))
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
                            <h5>{{ __('Edit News')}}</h5>
                            <span>{{ __('Edit news')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('news.index') }}">{{ __('News')}}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="{{ __('Title here') }}" value="{{ $news->title }}">
                                <span class="text-danger">{{ __($errors->first('title')) }}</span>
                            </div>
                            <div class="form-group">
                                <label for="description">{{ __('Description') }} <span class="text-danger">*</span></label>
                                <textarea id="description" name="description" class="form-control" rows="4">{{ $news->description }}</textarea>
                                <span class="text-danger">{{ __($errors->first('description')) }}</span>
                            </div>
                            <div class="form-group">
                                <label for="details">{{ __('Details') }} <span class="text-danger">*</span></label>
                                <textarea id="details" name="details" class="form-control html-editor">{{ $news->details }}</textarea>
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
                                    <img id="target" class="target cus-mw-200" src="{{ asset(path_news_image() . $news->image) }}" alt="{{ __('test') }}">
                                </div>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input  name="image" type="file" class="custom-file-input" id="putImage">
                                                <label data-id="showname" class="custom-file-label" for="validatedInputGroupCustomFile">{{ __('Choose file...') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-danger">{{ __($errors->first('image')) }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image_alt">{{ __('Image Alt') }} <span class="text-danger">*</span></label>
                                <input id="image_alt" type="text" class="form-control" name="image_alt" placeholder="{{ __('Image Alt') }}" value="{{ $news->image_alt }}">
                                <span class="text-danger">{{ __($errors->first('image_alt')) }}</span>
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('Category')}} <span class="text-danger">*</span> </label>
                                <select class="form-control select2" name="category_id">
                                    @foreach ($categories as $category)
                                    <option {{ $news->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ __($errors->first('category_id')) }}</span>
                            </div>
                            <div class="form-group">
                                <label for="input">{{ __('Tags')}} <span class="text-danger">*</span></label> <br>
                                <input type="text" id="tags" name="tags" class="form-control" value="{{ $news->tags }}">
                                <br>
                                <span class="text-danger">{{ __($errors->first('tags')) }}</span>
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('Status')}} <span class="text-danger">*</span> </label>
                                <select class="form-control select2" name="status">
                                    <option value="1" {{ $news->status == 1 ? 'selected' : '' }}>{{ __('Publish') }}</option>
                                    <option value="2" {{ $news->status == 2 ? 'selected' : '' }}>{{ __('Draft') }}</option>
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
    <script src="{{ asset('plugins/summernote/summernote.min.js') }}"></script>
    <script src="{{asset('js/summernote.js')}}"></script>
    <script src="{{ asset('plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery.repeater/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('plugins/mohithg-switchery/dist/switchery.min.js') }}"></script>
    <script src="{{ asset('js/select2-active.js') }}"></script>
    @endpush
@endsection

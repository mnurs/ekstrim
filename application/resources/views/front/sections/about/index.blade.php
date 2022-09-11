@extends('layouts.main')
@section('title', __('About Section'))
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
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
                            <h5>{{ __('About')}}</h5>
                            <span>{{ __('About section edit')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('about.index') }}">{{ __('Tentang Kami')}}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <form action="{{ !empty($about) ? route('about.update', $about->id) : route('about.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="{{ __('Title here') }}" value="{{ !empty($about) ? $about->title : '' }}">
                                <span class="text-danger">{{ __($errors->first('title')) }}</span>
                            </div>
                            <div class="form-group">
                                <label for="description">{{ __('Description') }} <span class="text-danger">*</span></label>
                                <textarea id="description" name="description" class="form-control" rows="4">{{ !empty($about) ? $about->description : '' }}</textarea>
                                <span class="text-danger">{{ __($errors->first('description')) }}</span>
                            </div>

                            <h5 class="border-bottom pb-1 mb-2">{{ __('Icon One') }}</h5>
                            <div class="form-group">
                                <label for="icon_one">{{ __('Icon') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="icon_one" name="icon_one" placeholder="{{ __('Icon here') }}" value="{{ !empty($about) ? $about->icon_one : '' }}">
                                <span class="text-danger">{{ __($errors->first('icon_one')) }}</span>
                            </div>
                            <div class="form-group">
                                <label for="icon_one_title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="icon_one_title" name="icon_one_title" placeholder="{{ __('Title here') }}" value="{{ !empty($about) ? $about->icon_one_title : '' }}">
                                <span class="text-danger">{{ __($errors->first('icon_one_title')) }}</span>
                            </div>
                            <div class="form-group">
                                <label for="icon_one_description">{{ __('Description') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="icon_one_description" name="icon_one_description" placeholder="{{ __('Description here') }}" value="{{ !empty($about) ? $about->icon_one_description : '' }}">
                                <span class="text-danger">{{ __($errors->first('icon_one_description')) }}</span>
                            </div>
                            <h5 class="border-bottom pb-1 mb-2">{{ __('Icon Two') }}</h5>
                            <div class="form-group">
                                <label for="icon_two">{{ __('Icon') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="icon_two" name="icon_two" placeholder="{{ __('Icon here') }}" value="{{ !empty($about) ? $about->icon_two : '' }}">
                                <span class="text-danger">{{ __($errors->first('icon_two')) }}</span>
                            </div>
                            <div class="form-group">
                                <label for="icon_two_title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="icon_two_title" name="icon_two_title" placeholder="{{ __('Title here') }}" value="{{ !empty($about) ? $about->icon_two_title : '' }}">
                                <span class="text-danger">{{ __($errors->first('icon_two_title')) }}</span>
                            </div>
                            <div class="form-group">
                                <label for="icon_two_description">{{ __('Description') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="icon_two_description" name="icon_two_description" placeholder="{{ __('Description here') }}" value="{{ !empty($about) ? $about->icon_two_description : '' }}">
                                <span class="text-danger">{{ __($errors->first('icon_two_description')) }}</span>
                            </div>
                            <h5 class="border-bottom pb-1 mb-2">{{ __('Icon Three') }}</h5>
                            <div class="form-group">
                                <label for="icon_three">{{ __('Icon') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="icon_three" name="icon_three" placeholder="{{ __('Icon here') }}" value="{{ !empty($about) ? $about->icon_three : '' }}">
                                <span class="text-danger">{{ __($errors->first('icon_three')) }}</span>
                            </div>
                            <div class="form-group">
                                <label for="icon_three_title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="icon_three_title" name="icon_three_title" placeholder="{{ __('Title here') }}" value="{{ !empty($about) ? $about->icon_three_title : '' }}">
                                <span class="text-danger">{{ __($errors->first('icon_three_title')) }}</span>
                            </div>
                            <div class="form-group">
                                <label for="icon_three_description">{{ __('Description') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="icon_three_description" name="icon_three_description" placeholder="{{ __('Description here') }}" value="{{ !empty($about) ? $about->icon_three_description : '' }}">
                                <span class="text-danger">{{ __($errors->first('icon_three_description')) }}</span>
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
                                    <img id="target" class="cus-mw-200" src="{{ !empty($about) ? asset(path_about_image() . $about->image) : asset(path_noimage_image().'no-image-200.jpg') }}" alt="{{ __('test') }}">
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="image" type="file" class="custom-file-input" id="putImage">
                                            <label data-id="showname" class="custom-file-label" for="validatedInputGroupCustomFile">{{ __('Choose file...') }}</label>
                                        </div>
                                    </div>
                                    <span class="text-danger">{{ __($errors->first('image')) }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('Save') }}</button>
                                <a href="#" class="btn btn-light">{{ __('Cancel') }}</a>
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
    @endpush
@endsection

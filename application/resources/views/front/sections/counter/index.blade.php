@extends('layouts.main')
@section('title', __('Counters'))
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
                            <h5>{{ __('Counter')}}</h5>
                            <span>{{ __('Edit counter section')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('counter.index') }}">{{ __('Counter')}}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <form action="{{ !empty($counter) ? route('counter.update', $counter->id) : route('counter.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="border-bottom pb-1 mb-2">{{ __('Counter One') }}</h5>
                            <div class="form-group">
                                <label for="counter_one_icon">{{ __('Icon') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="counter_one_icon" name="counter_one_icon" placeholder="{{ __('Counter here') }}" value="{{ !empty($counter) ? $counter->counter_one_icon : '' }}">
                                <span class="text-danger">{{ __($errors->first('counter_one_icon')) }}</span>
                            </div>
                            <div class="form-group">
                                <label for="counter_one_count">{{ __('Count') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="counter_one_count" name="counter_one_count" placeholder="{{ __('Description here') }}" value="{{ !empty($counter) ? $counter->counter_one_count : '' }}">
                                <span class="text-danger">{{ __($errors->first('counter_one_count')) }}</span>
                            </div>
                            <div class="form-group">
                                <label for="counter_one_title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="counter_one_title" name="counter_one_title" placeholder="{{ __('Title here') }}" value="{{ !empty($counter) ? $counter->counter_one_title : '' }}">
                                <span class="text-danger">{{ __($errors->first('counter_one_title')) }}</span>
                            </div>
                            <h5 class="border-bottom pb-1 mb-2">{{ __('Counter Two') }}</h5>
                            <div class="form-group">
                                <label for="counter_two_icon">{{ __('Icon') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="counter_two_icon" name="counter_two_icon" placeholder="{{ __('Counter here') }}" value="{{ !empty($counter) ? $counter->counter_two_icon : '' }}">
                                <span class="text-danger">{{ __($errors->first('counter_two_icon')) }}</span>
                            </div>
                            <div class="form-group">
                                <label for="counter_two_count">{{ __('Count') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="counter_two_count" name="counter_two_count" placeholder="{{ __('Description here') }}" value="{{ !empty($counter) ? $counter->counter_two_count : '' }}">
                                <span class="text-danger">{{ __($errors->first('counter_two_count')) }}</span>
                            </div>
                            <div class="form-group">
                                <label for="counter_two_title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="counter_two_title" name="counter_two_title" placeholder="{{ __('Title here') }}" value="{{ !empty($counter) ? $counter->counter_two_title : '' }}">
                                <span class="text-danger">{{ __($errors->first('counter_two_title')) }}</span>
                            </div>
                            <h5 class="border-bottom pb-1 mb-2">{{ __('Counter Three') }}</h5>
                            <div class="form-group">
                                <label for="counter_three_icon">{{ __('Icon') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="counter_three_icon" name="counter_three_icon" placeholder="{{ __('Counter here') }}" value="{{ !empty($counter) ? $counter->counter_three_icon : '' }}">
                                <span class="text-danger">{{ __($errors->first('counter_three_icon')) }}</span>
                            </div>
                            <div class="form-group">
                                <label for="counter_three_count">{{ __('Count') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="counter_three_count" name="counter_three_count" placeholder="{{ __('Description here') }}" value="{{ !empty($counter) ? $counter->counter_three_count : '' }}">
                                <span class="text-danger">{{ __($errors->first('counter_three_count')) }}</span>
                            </div>
                            <div class="form-group">
                                <label for="counter_three_title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="counter_three_title" name="counter_three_title" placeholder="{{ __('Title here') }}" value="{{ !empty($counter) ? $counter->counter_three_title : '' }}">
                                <span class="text-danger">{{ __($errors->first('counter_three_title')) }}</span>
                            </div>
                            <h5 class="border-bottom pb-1 mb-2">{{ __('Counter Four') }}</h5>
                            <div class="form-group">
                                <label for="counter_four_icon">{{ __('Icon') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="counter_four_icon" name="counter_four_icon" placeholder="{{ __('Counter here') }}" value="{{ !empty($counter) ? $counter->counter_four_icon : '' }}">
                                <span class="text-danger">{{ __($errors->first('counter_four_icon')) }}</span>
                            </div>
                            <div class="form-group">
                                <label for="counter_four_count">{{ __('Count') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="counter_four_count" name="counter_four_count" placeholder="{{ __('Description here') }}" value="{{ !empty($counter) ? $counter->counter_four_count : '' }}">
                                <span class="text-danger">{{ __($errors->first('counter_four_count')) }}</span>
                            </div>
                            <div class="form-group">
                                <label for="counter_four_title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="counter_four_title" name="counter_four_title" placeholder="{{ __('Title here') }}" value="{{ !empty($counter) ? $counter->counter_four_title : '' }}">
                                <span class="text-danger">{{ __($errors->first('counter_four_title')) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="image-item">
                                <div class="form-group">
                                    <label for="">{{ __('Background Image')}} <span class="text-danger">*</span> </label> <br>
                                    <img id="target" class="cus-mw-200" src="{{ !empty($counter) ? asset(path_counter_image() . $counter->background_image) : asset(path_noimage_image().'no-image-200.jpg') }}" alt="{{ __('image') }}">
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="background_image" type="file" class="custom-file-input" id="validatedInputGroupCustomFile1">
                                            <label data-id="showname" class="custom-file-label" for="validatedInputGroupCustomFile">{{ __('Choose file...') }}</label>
                                        </div>
                                    </div>
                                    <span class="text-danger">{{ __($errors->first('image')) }}</span>
                                </div>
                            </div>
                            <div class="image-item">
                                <div class="form-group">
                                    <label for="">{{ __('Image')}} <span class="text-danger">*</span> </label> <br>
                                    <img class="target2 cus-mw-200" src="{{ !empty($counter) ? asset(path_counter_image() . $counter->image) : asset(path_noimage_image().'no-image-200.jpg') }}" alt="{{ __('image') }}">
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="image" type="file" class="custom-file-input" id="validatedInputGroupCustomFile1">
                                            <label data-id="showname" class="custom-file-label" for="validatedInputGroupCustomFile">{{ __('Choose file...') }}</label>
                                        </div>
                                    </div>
                                    <span class="text-danger">{{ __($errors->first('image')) }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="video">{{ __('Video Link') }}</label>
                                <input type="text" class="form-control" name="video" id="video" aria-describedby="emailHelp" placeholder="{{ __('Video link here') }}" value="{{ !empty($counter) ? $counter->video : '' }}">
                                <span class="text-danger">{{ __($errors->first('video')) }}</span>
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
        <script src="{{ asset('plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
        <script src="{{ asset('plugins/jquery.repeater/jquery.repeater.min.js') }}"></script>
        <script src="{{ asset('plugins/mohithg-switchery/dist/switchery.min.js') }}"></script>
    @endpush
@endsection

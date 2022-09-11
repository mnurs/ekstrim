@extends('layouts.main')
@section('title', __('Pengaturan Situs'))
@push('head')
<!-- include summernote css/js -->
<link href="{{ asset('plugins/summernote/summernote.min.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-6">
                <div class="page-header-title">
                    <i class="ik ik-sites bg-blue"></i>
                    <div class="d-inline">
                        <h5>{{ __('Site')}}</h5>
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
                            <a href="#">{{ __('Site')}}</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- start message area-->
        @include('include.message')
        <!-- end message area-->
        <div class="col-md-12">
            <div class="card p-3">
                <div class="card-header">
                    <h3>{{ __('sites')}}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header">
                                    <h3>{{ __('Site elements')}}</h3>
                                </div>
                                <div class="card-body">
                                    <form class="forms-sample" action="{{isset($site) ? route('sites.update', $site->id): route('sites.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputName1">{{ __('Title') }}</label>
                                            <input name="title" type="text" value="{{isset($site->title) ? $site->title : ''}}" class="form-control" id="exampleInputName1" placeholder="{{ __('Title') }}">
                                            <span class="text-danger">{{ __($errors->first('title')) }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">{{ __('Site Address') }}</label>
                                            <input name="address" type="text" value="{{isset($site->address) ?$site->address: ''}}" class="form-control" id="exampleInputName1" placeholder="{{ __('Address') }}">
                                            <span class="text-danger">{{ __($errors->first('address')) }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">{{ __('Site Helpline 1') }}</label>
                                            <input name="helpline1" type="text" value="{{isset($site->helpline1) ?$site->helpline1 : ''}}" class="form-control" id="exampleInputName1" placeholder="{{ __('Site Helpline 1') }}">
                                            <span class="text-danger">{{ __($errors->first('helpline1')) }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">{{ __('Site Helpline 2') }}</label>
                                            <input name="helpline2" type="text" value="{{isset($site->helpline2) ? $site->helpline2 : ''}}" class="form-control" id="exampleInputName1" placeholder="{{ __('Site Helpline 2') }}">
                                            <span class="text-danger">{{ __($errors->first('helpline2')) }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">{{ __('Helpline Email 1') }}</label>
                                            <input name="helpline_email1" type="text" value="{{isset($site->helpline_email1) ?$site->helpline_email1 : ''}}" class="form-control" id="exampleInputName1" placeholder="{{ __('Helpline Email 1') }}">
                                            <span class="text-danger">{{ __($errors->first('helpline_email1')) }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">{{ __('Helpline Email 2') }}</label>
                                            <input name="helpline_email2" type="text" value="{{isset($site->helpline_email2) ? $site->helpline_email2 : ''}}" class="form-control" id="exampleInputName1" placeholder="{{ __('Helpline Email 2') }}">
                                            <span class="text-danger">{{ __($errors->first('helpline_email2')) }}</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail3">{{ __('Footer Copyright') }}</label>
                                                    <input name="footer_copyright" type="text" value="{{isset($site->footer_copyright) ? $site->footer_copyright : ''}}" class="form-control" id="exampleInputEmail3" placeholder="{{ __('Footer Copyright') }}">
                                                    <span class="text-danger">{{ __($errors->first('footer_copyright')) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label>{{ __('Site Logo') }}</label>
                                                    <!-- file manager -->
                                                    <div class="image-group">
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input name="image1" type="file" class="custom-file-input" id="putImage">
                                                                <label data-id="showname" class="custom-file-label" for="validatedInputGroupCustomFile">{{ __('Choose file...') }}</label>
                                                            </div>
                                                        </div>
                                                        <!-- file manager -->
                                                        <span class="text-danger">{{ __($errors->first('image1')) }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>{{ __('Site Favicon') }}</label>
                                                    <!-- file manager -->
                                                    <div class="image-group">
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input name="image2" type="file" class="custom-file-input" id="putImage2">
                                                                <label data-id="showname" class="custom-file-label" for="validatedInputGroupCustomFile">{{ __('Choose file...') }}</label>
                                                            </div>
                                                        </div>
                                                        <!-- file manager -->
                                                        <span class="text-danger">{{ __($errors->first('image2')) }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 pt-2">
                                                    <label>{{ __('White Logo') }}</label>
                                                    <!-- file manager -->
                                                    <div class="image-group">
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input name="image3" type="file" class="custom-file-input" id="putImage3">
                                                                <label data-id="showname" class="custom-file-label" for="validatedInputGroupCustomFile">{{ __('Choose file...') }}</label>
                                                            </div>
                                                        </div>
                                                        <!-- file manager -->
                                                        <span class="text-danger">{{ __($errors->first('image3')) }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <button type="submit" class="btn btn-primary mr-2">{{ __('Submit')}}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div>
                                <h5>{{ __('Site Info') }}</h5>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="fname">{{ __('Title') }}</label>
                                    <input name="fname" type="text" class="form-control" value="{{isset($site->title) ?$site->title: ''}}" disabled>
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="fname">{{ __('Footer Copyright') }}</label>
                                    <input name="fcopy" type="text" class="form-control" value="{{isset($site->footer_copyright) ?$site->footer_copyright: ''}}" disabled>
                                </div>
                            </div>
                            <div class="form-group-wrap">
                                <div class=" form-group">
                                    <div class="">{{ __('Site Logo') }}</div>
                                    <br>
                                    <img class="cus-site-create-logo" src="{{ isset($site->image1) ? asset(path_site_logo_image().$site->image1) : asset(path_noimage_image().'no-image-200.jpg') }}" alt="{{ __('image') }}" id="target">
                                </div>
                                <div class="form-group">
                                    <div class=" form-group">
                                        <div>{{ __('Site Favicon') }}</div>
                                        <br>
                                        <img class="cus-site-create-logo" src="{{ isset($site->image2) ? asset(path_site_favicon_image().$site->image2) : asset(path_noimage_image().'no-image-200.jpg') }}" alt="{{ __('image') }}" id="target2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class=" form-group">
                                        <div>{{ __('White Logo') }}</div>
                                        <br>
                                        <img class="cus-site-create-logo" src="{{ isset($site->image3) ? asset(path_site_while_logo_image().$site->image3) : asset(path_noimage_image().'no-image-200.jpg') }}" alt="{{ __('image') }}" id="target3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- push external js -->
@push('script')
<script src="{{ asset('plugins/summernote/summernote.min.js') }}"></script>
<script src="{{asset('js/summernote.js')}}"></script>
@endpush

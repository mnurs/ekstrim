@extends('layouts.main')
@section('title', __('Edit Konselor'))
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
                    <i class="ik ik-users bg-blue"></i>
                    <div class="d-inline">
                        <h5>{{ __('Konselor')}}</h5>
                        <span>{{ __('Daftar Konselor')}}</span>
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
                            <a href="#">{{ __('Konselor')}}</a>
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
                    <h3>{{ __('Konselor')}}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header">
                                    <h3>{{ __('Konselor')}}</h3>
                                </div>
                                <div class="card-body">
                                    <form class="forms-sample" action="{{isset($user) ? route('doctor.update', $user->id): ''}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="custome-form">
                                            <div class="row">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">{{ __('Off Day') }}</label>
                                                    <small class="form-text text-muted">{{ __('Check off day') }}</small>
                                                </div>
                                                <div class="col-12 col-md-9">

                                                    <div class="checkbox-list">
                                                        <div class="signle-input">
                                                            <input name="off_day[]" value="sat" type="checkbox" {{$user->doctor->checkOffDay('sat') ? 'checked' : ''}}> {{ __('Saturday') }}
                                                        </div>
                                                        <div class="signle-input">
                                                            <input name="off_day[]" value="sun" type="checkbox" {{$user->doctor->checkOffDay('sun') ? 'checked' : ''}}> {{ __('Sunday') }}
                                                        </div>
                                                        <div class="signle-input">
                                                            <input name="off_day[]" value="mon" type="checkbox" {{$user->doctor->checkOffDay('mon') ? 'checked' : ''}}> {{ __('Monday') }}
                                                        </div>
                                                        <div class="signle-input">
                                                            <input name="off_day[]" value="tue" type="checkbox" {{$user->doctor->checkOffDay('tue') ? 'checked' : ''}}> {{ __('Tuesday') }}
                                                        </div>
                                                        <div class="signle-input">
                                                            <input name="off_day[]" value="wed" type="checkbox" {{$user->doctor->checkOffDay('wed') ? 'checked' : ''}}> {{ __('Wednesday') }}
                                                        </div>
                                                        <div class="signle-input">
                                                            <input name="off_day[]" value="thu" type="checkbox" {{$user->doctor->checkOffDay('thu') ? 'checked' : ''}}> {{ __('Thursday') }}
                                                        </div>
                                                        <div class="signle-input">
                                                            <input name="off_day[]" value="fri" type="checkbox" {{$user->doctor->checkOffDay('fri') ? 'checked' : ''}}> {{ __('Friday') }}
                                                        </div>
                                                    </div>
                                                    @error('hospital_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ __($message )}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div id="schedule">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <p>{{ __('Schedule') }}</p>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group ">
                                                                    <label for="starttime">{{ __('Start Time') }}</label>
                                                                    <input type="time" value="{{isset($user->doctor->starttime) ? $user->doctor->starttime : ''}}" name="starttime">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="endtime">{{ __('End Time') }}</label>
                                                                    <input type="time" name="endtime" value="{{isset($user->doctor->endtime) ? $user->doctor->endtime : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group ">
                                                                    <label for="starttime2">{{ __('Start Time') }}</label>
                                                                    <input type="time" name="starttime2" value="{{isset($user->doctor->starttime2) ? $user->doctor->starttime2 : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="endtime2">{{ __('End Time') }}</label>
                                                                    <input type="time" name="endtime2" value="{{isset($user->doctor->endtime2) ? $user->doctor->endtime2 : ''}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <p>{{ __('Kategori') }}</p>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="form-group">
                                                        <select name="category" id="">
                                                            @foreach ($category as $category)
                                                            <option value="{{$category->id}}" {{$user->doctor->category_id == $category->id ? 'selected':''}}>{{$category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <p>{{ __('Keterangan (ketik 0)') }}</p>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="form-group">
                                                        <input type="number" name="fees" placeholder="{{ __('Add fee') }}" value="{{$user->doctor->fees}}">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary mr-2">{{ __('Submit')}}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- markup -->
                        <div class="col-md-3 hide-mobile">
                            <div>
                                <h5>{{ __('Info Pengguna') }}</h5>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="fname">{{ __('Nama') }}</label>
                                    <input name="fname" type="text" class="form-control" value="{{($user->name) ?? ''}}" disabled>
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="fname">{{ __('Email') }}</label>
                                    <input name="fname" type="text" class="form-control" value="{{($user->email) ?? ''}}" disabled>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-4">
                                <img class="doc-img-cls" src="{{ isset($user->image) ? asset(path_user_image().$user->image) : asset(path_noimage_image().'no-image-200.jpg') }}" alt="{{ __('image') }}">
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

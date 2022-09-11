@extends('layouts.main')
@section('title', __('Tambah Konselor'))
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
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action="{{route('doctor.store')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ __($message) }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Alamat E-Mail') }}</label>
                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ __($message) }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ __($message) }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="docat" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>
                                            <div class="col-md-6">
                                                <select class="form-select form-control" name="gender">
                                                        <option value="male">{{ __('Male') }}</option>
                                                        <option value="female">{{ __('Female') }}</option>
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="docat" class="col-md-4 col-form-label text-md-right">{{ __('Kategori Keahlian') }}</label>
                                            <div class="col-md-6">
                                                <select class="form-select form-control" name="docat">
                                                    @foreach ($category as $cat)
                                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-md-4 col-form-label text-md-right"><label for="text-input" class=" form-control-label">{{ __('Off Day') }}</label></div>
                                            <div class="col-md-6">
                                                <input name="off_day[]" value="sat" type="checkbox" > {{ __('Saturday') }}
                                                <input name="off_day[]" value="sun" type="checkbox" > {{ __('Sunday') }}
                                                <input name="off_day[]" value="mon" type="checkbox" > {{ __('Monday') }}
                                                <input name="off_day[]" value="tue" type="checkbox" > {{ __('Tuesday') }}
                                                <input name="off_day[]" value="wed" type="checkbox" > {{ __('Wednesday') }}
                                                <input name="off_day[]" value="thu" type="checkbox" > {{ __('Thursday') }}
                                                <input name="off_day[]" value="fri" type="checkbox" > {{ __('Friday') }}
                                                <small class="form-text text-muted">{{ __('Check off day') }}</small>
                                                @error('hospital_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ __($message )}}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row row">
                                            <div class="col-md-4 col-form-label text-md-right">
                                                <p>{{ __('Keterangan (ketik 0)') }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mr-4">
                                                    <input type="number" class="form-control" name="fees" value="10" placeholder="{{ __('Add fee') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Gambar Profil') }}</label>
                                            <div class="col-md-7">
                                                <div class="row">
                                                    <div class="col-lg-9">
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input value="{{ isset($user) ? asset(path_user_image().$user->image) : ''}}" name="profile_image" type="file" class="custom-file-input" id="putImage">
                                                                <label data-id="showname" class="custom-file-label" for="validatedInputGroupCustomFile">{{ __('Pilih file...') }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        @if (isset($user))
                                                        <img id="target" class="cus-mh50-mw-50" src="{{
                                                            isset($user->image) ? asset(path_user_image().$user->image) : Avatar::create($user->name)->toBase64()
                                                        }}">
                                                        @else
                                                        <img src="{{ asset(path_noimage_image().'no-image-50.jpg') }}" id="target" class="cus-mh50-mw-50"  alt="{{ __('image') }}">
                                                    @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Gambar Profil (Ukuran Besar)') }}</label>
                                            <div class="col-md-7">
                                                <div class="row">
                                                    <div class="col-lg-9">
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input value="{{ isset($user) ? asset(path_user_image().$user->image) : ''}}" name="thumb_image" type="file" class="custom-file-input" id="putImage1">
                                                                <label data-id="showname" class="custom-file-label" for="validatedInputGroupCustomFile">{{ __('Pilih file...') }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        @if (isset($user))
                                                        <img id="target1" class="cus-mh50-mw-50" src="{{
                                                            isset($user->image) ? asset(path_user_image().$user->image) : Avatar::create($user->name)->toBase64()
                                                        }}">
                                                        @else
                                                        <img src="{{ asset(path_noimage_image().'no-image-50.jpg') }}" id="target1" class="cus-mh50-mw-50"  alt="{{ __('image') }}">
                                                    @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Daftar') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- markup -->
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

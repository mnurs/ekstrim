@extends('layouts.main')
@section('title', __('Slot Konselor'))
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
                    <h3>{{ __('Tambah Slot Konselor')}}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action="{{route('slot.create')}}">
                                        @csrf
                                        <div class="custome-form">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('slot') }}</label>
                                                        <select name="slot_id" id="">
                                                            @foreach ($docslots as $docslot)
                                                            <option value="{{$docslot->id}}">{{$docslot->start_time}}-{{$docslot->end_time}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('slot') }}</label>
                                                        <select name="doctor_id" id="">
                                                            @foreach ($doctors as $doctor)
                                                            <option value="{{$doctor->id}}">{{$doctor->id}}-{{$doctor->user->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Add doctor with slot') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body p-0 table-border-style">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{ __('Nama Konselor')}}</th>
                                                    <th>{{ __('Slot')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($doctors as $doctor)
                                                <tr>
                                                    <th scope="row">{{$doctor->id}}</th>
                                                    <td>{{$doctor->user->name}}</td>
                                                    <td>
                                                        @foreach ($doctor->slot as $slot)
                                                        {{$slot->start_time}}- {{$slot->end_time}} <br>
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
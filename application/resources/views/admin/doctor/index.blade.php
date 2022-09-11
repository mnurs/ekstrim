@extends('layouts.main')
@section('title', __('Konselor'))
@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-6">
                <div class="page-header-title">
                    <i class="ik ik-users bg-blue"></i>
                    <div class="d-inline">
                        <h5>{{ __('Konselor')}}</h5>
                        <span>{{ __('Daftar Nama Konselor')}}</span>
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
                    <a class="btn btn-primary ml-auto" href="{{ route('doctor.create') }}">{{ __('Tambah Konselor') }}</a>
                </div>
                <div class="card-body">
                    {{$dataTable->table()}}
                </div>
            </div>
        </div>
    </div>
</div>
@foreach($user as $user)
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <img class="card-img-top cus-card-img" src="{{isset($user->image) ? asset(path_user_image() . $user->image): Avatar::create($user->name)->toBase64() }}" />
                    <div class="card-body">
                        <h5 class="card-title">{{ __('Detail Pengguna') }}</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ __('Nama:') }} {{$user->name}}</li>
                        <li class="list-group-item">{{ __('Email:') }} {{$user->email}}</li>
                        <li class="list-group-item">{{ __('Created at:') }} {{$user->created_at->diffForHumans()}}</li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
@push('script')
{{$dataTable->scripts()}}
@endpush
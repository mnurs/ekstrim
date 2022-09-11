@extends('layouts.main')
@section('title', __('Category'))
@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-6">
                <div class="page-header-title">
                    <i class="ik ik-categorys bg-blue"></i>
                    <div class="d-inline">
                        <h5>{{ __('Categories')}}</h5>
                        <span>{{ __('List of Categories')}}</span>
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
                            <a href="#">{{ __('Categories')}}</a>
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
                    <h3>{{ __('categorys')}}</h3>
                    <a class="btn btn-primary ml-auto" href="{{route('doctor.category.create')}}">{{ __('Add Category') }}</a>
                </div>
                <div class="card-body">
                    {{$dataTable->table()}}
                </div>
            </div>
        </div>
    </div>
</div>
@foreach($category as $category)
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Doctor Category') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('Category Detail') }}</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ __('Name:') }} {{ $category->name }}</li>
                        <li class="list-group-item">{{ __('Created at:') }} {{$category->created_at->diffForHumans()}}</li>
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
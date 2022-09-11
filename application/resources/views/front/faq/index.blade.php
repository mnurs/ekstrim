@extends('layouts.main')
@section('title', __('FAQ'))
@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-edit bg-blue"></i>
                    <div class="d-inline">
                        <h5>{{ __('FAQ')}}</h5>
                        <span>{{ __('List of faqs')}}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">{{ __('Category')}}</a>
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
                    <h3>{{ __('Users')}}</h3>
                    <a class="btn btn-primary ml-auto" href="{{ route('faq.create') }}">{{ __('Add FAQ') }}</a>
                </div>
                <div class="card-body">
                    {{$dataTable->table()}}
                </div>
            </div>
        </div>
    </div>
    <!-- Section -->
    <form action="{{ route('section.title.store', 'faq-section') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>{{ __('FAQ Section') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="{{ __('Title here') }}" value="{{ section_title('faq-section') ? section_title('faq-section')->title : '' }}">
                            <span class="text-danger">{{ __($errors->first('title')) }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ __('Description') }} <span class="text-danger">*</span></label>
                            <textarea id="description" name="description" class="form-control" rows="5">{{ section_title('faq-section') ? section_title('faq-section')->description : '' }}</textarea>
                            <span class="text-danger">{{ __($errors->first('description')) }}</span>
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
@endsection
@push('script')
{{$dataTable->scripts()}}
@endpush
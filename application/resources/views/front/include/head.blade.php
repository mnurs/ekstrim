<!-- ********************** Front Side Assets ************************ -->
@if(Route::is('front.*',))
<!-- Place favicon.ico in the root directory -->
<link rel="icon" href="{{ isset($site->image2) ? asset(path_site_favicon_image().$site->image2) :  asset(path_noimage_image().'no-image-200.jpg') }}" />
<link rel="stylesheet" href="{{ asset('front/user/css/flaticon.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- css file  -->
<link rel="stylesheet" href="{{ asset('front/user/css/plugins.css') }}">
<link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('front/user/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('front/user/css/responsive.css') }}">
<link rel="stylesheet" href="{{ asset('front/user/css/custom.css') }}">
<script src="{{ asset('front/js/modernizr-3.11.2.min.js') }}"></script>
@else
<!-- ********************** Dashboard Assets ************************ -->
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Place favicon.ico in the root directory -->
<link rel="icon" href="{{ isset($site->image2) ? asset(path_site_favicon_image().$site->image2) : asset(path_noimage_image().'no-image-200.jpg') }}" />
<link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('front/user/css/flaticon.css') }}">
<!-- css file  -->
<link rel="stylesheet" href="{{asset('front/assets/css/plugins.css')}}">
<link rel="stylesheet" href="{{asset('front/assets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('front/assets/css/responsive.css')}}">
<script src="{{asset('front/js/modernizr-3.11.2.min.js')}}"></script>
@endif
<link rel="stylesheet" href="{{ asset('front/assets/css/toaster.min.css') }}">
<link rel="stylesheet" href="{{ asset('front/css/custom.css') }}">

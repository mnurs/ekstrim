<!-- ********************** Front Side Script ************************ -->
@if(Route::is('front.*'))
<script src="{{ asset('front/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front/user/js/plugins.js') }}"></script>
<script src="{{ asset('front/user/js/main.js') }}"></script>
@yield('custom_js')
@else
<!-- ********************** Dashboard Script ************************ -->
<script src="{{asset('front/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front/assets/js/plugins.js')}}"></script>
<script src="{{asset('front/assets/js/main.js')}}"></script>
<script src="{{asset('front/assets/js/toaster.min.js')}}"></script>
@if(Session::has('success'))
{{ view_html(Toastr::message()) }}
@endif
@endif

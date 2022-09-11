<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('front.include.seo')
    @include('front.include.head')
</head>
<body>
    <div id="app" class="wrapper">
        <!-- initiate header-->
        @include('front.include.header')
        <div class="page-wrap">
            <div class="main-content">
                <!-- yeild contents here -->
                @yield('breadcrumb')
                @yield('content')
                @include('front.include.brand')
            </div>
            <!-- initiate footer section-->
            @include('front.include.footer')
        </div>
    </div>
    <!-- initiate scripts-->
    @include('front.include.script')
    @stack('script')
    @yield('scripts')
</body>
</html>

@section('breadcrumb')
<!-- breadcrumb area start here   -->
<section class="breadcrumb-area cus-bg-user-img">
    <div class="container">
         <!-- <h2 class="page-title">{{ str_replace('-', ' ', request()->segment(1)) }}</h2> -->
        <ul class="breadcrumb-page">
            <li><a href="{{ url('/') }}">{{ __('Beranda') }}</a></li>
            <!-- <li>{{ str_replace('-', ' ', request()->segment(1)) }}</li> -->
        </ul>
    </div>
</section>
<!-- breadcrumb area end here   -->
@endsection

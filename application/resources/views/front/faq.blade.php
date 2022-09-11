@extends('front.layouts.main')
@section('page_title', __('FAQ'))
@include('front.include.breadcrumb')
@section('content')
<!-- faq area start here  -->
<section class="faq-area section">
  <div class="container">
      <div class="section-title text-center">
          <div class="row">
              <div class="col-lg-6 offset-lg-3">
                <h2 class="title">{{ section_title('faq-section')->title }} </h2>
                <p class="subtitle">{{ section_title('faq-section')->description }}</p>
            </div>
          </div>
      </div>
      <div class="primary-tabs">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tabone-tab" data-toggle="tab" href="#tabone" role="tab" aria-controls="tabone" aria-selected="true">{{ __('Basic Questions') }}</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="tabtwo-tab" data-toggle="tab" href="#tabtwo" role="tab" aria-controls="tabtwo" aria-selected="false">{{ __('Medical Questions') }}</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="tabthree-tab" data-toggle="tab" href="#tabthree" role="tab" aria-controls="tabthree" aria-selected="false">{{ __('Pricing Plan') }}</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="tabfour-tab" data-toggle="tab" href="#tabfour" role="tab" aria-controls="tabfour" aria-selected="false">{{ __('Other Questions') }}</a>
              </li>
          </ul>
          <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="tabone" role="tabpanel" aria-labelledby="tabone-tab">
                  <h2 class="section-inner-title">{{ __('Questions Answer') }}</h2>
                  <div class="accordion" id="accordionExample1">
                    @foreach (App\Models\Admin\Faq::where('type', 1)->get() as $basic_faq)
                    <div class="card">
                      <div class="card-header" id="heading{{ $basic_faq->id }}">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $basic_faq->id }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="collapse{{ $basic_faq->id }}">
                            {{ $basic_faq->question }}
                          </button>
                        </h2>
                      </div>
                      <div id="collapse{{ $basic_faq->id }}" class="collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="heading{{ $basic_faq->id }}" data-parent="#accordionExample1">
                        <div class="card-body">
                          <p>{{ $basic_faq->answer }}</p>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
              </div>
              <div class="tab-pane fade" id="tabtwo" role="tabpanel" aria-labelledby="tabtwo-tab">
                  <h2 class="section-inner-title">{{ __('Questions Answer') }}</h2>
                  <div class="accordion" id="accordionExample2">
                    @foreach (App\Models\Admin\Faq::where('type', 2)->get() as $basic_faq)
                    <div class="card">
                      <div class="card-header" id="heading{{ $basic_faq->id }}">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $basic_faq->id }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="collapse{{ $basic_faq->id }}">
                            {{ $basic_faq->question }}
                          </button>
                        </h2>
                      </div>
                      <div id="collapse{{ $basic_faq->id }}" class="collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="heading{{ $basic_faq->id }}" data-parent="#accordionExample1">
                        <div class="card-body">
                          <p>{{ $basic_faq->answer }}</p>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
              </div>
              <div class="tab-pane fade" id="tabthree" role="tabpanel" aria-labelledby="tabthree-tab">
                  <h2 class="section-inner-title">{{ __('Questions Answer') }}</h2>
                  <div class="accordion" id="accordionExample3">
                    @foreach (App\Models\Admin\Faq::where('type', 3)->get() as $basic_faq)
                    <div class="card">
                      <div class="card-header" id="heading{{ $basic_faq->id }}">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $basic_faq->id }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="collapse{{ $basic_faq->id }}">
                            {{ $basic_faq->question }}
                          </button>
                        </h2>
                      </div>
                      <div id="collapse{{ $basic_faq->id }}" class="collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="heading{{ $basic_faq->id }}" data-parent="#accordionExample1">
                        <div class="card-body">
                          <p>{{ $basic_faq->answer }}</p>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
              </div>
              <div class="tab-pane fade" id="tabfour" role="tabpanel" aria-labelledby="tabfour-tab">
                  <h2 class="section-inner-title">{{ __('Questions Answer') }}</h2>
                  <div class="accordion" id="accordionExample4">
                    @foreach (App\Models\Admin\Faq::where('type', 4)->get() as $basic_faq)
                    <div class="card">
                      <div class="card-header" id="heading{{ $basic_faq->id }}">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $basic_faq->id }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="collapse{{ $basic_faq->id }}">
                            {{ $basic_faq->question }}
                          </button>
                        </h2>
                      </div>
                      <div id="collapse{{ $basic_faq->id }}" class="collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="heading{{ $basic_faq->id }}" data-parent="#accordionExample1">
                        <div class="card-body">
                          <p>{{ $basic_faq->answer }}</p>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- faq area end here  -->
@endsection
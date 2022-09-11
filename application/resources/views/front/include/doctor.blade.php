<!-- team area start here  -->
<section class="team-area section-top pb-90">
    <div class="container">
        <div class="section-title text-center">
            <div class="row">
                @if (section_title('doctor-section') != null)
                <div class="col-lg-6 offset-lg-3">
                    <h2 class="title">{{ section_title('doctor-section')->title }} </h2>
                    <p class="subtitle">{{ section_title('doctor-section')->description }}</p>
                </div>
                @endif
            </div>
        </div>
        <div class="team-list">
            <div class="row">
                @foreach ($doctors as $doctor)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-team">
                        <div class="team-thumbnail">
                            <img src="{{ isset($doctor->user->image) ? asset(path_user_image().$doctor->user->image) : asset(path_noimage_image().'no-image-50.png')}}" alt="{{ __('taml image') }}" />
                            <div class="team-overlay">
                                <div class="overlay-wrap text-center">
                                    <a href="{{ route('front.doctorprofile', $doctor->id) }}" class="secondary-btn btn mb-3">{{ __('Lihat Profil') }}</a>
                                    <a href="{{route('patient.dashboard.redirect', $doctor->id)}}" class="primary-btn btn">{{ __('Buat Janji') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="team-info">
                            <h4 class="team-name">{{$doctor->user->name}}</h4>
                            <ul>
                                <li class="catagory">{{isset($doctor->category->name) ? $doctor->category->name : ''}}</li>
                                <!-- <li class="price">{{ __('Fee: $') }}{{$doctor->fees}}</li> -->
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- team area end here  -->

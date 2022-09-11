<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="{{route('dashboard')}}">
            <div class="logo-img">
                <img height="30" src="{{ isset($site->image3) ? asset(path_site_while_logo_image().$site->image3) : asset(path_noimage_image().'no-image-200.jpg') }}" class="header-brand-img">
            </div>
        </a>
        <div class="sidebar-action"><i class="ik ik-arrow-left-circle"></i></div>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>
    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item {{ Route::is('dashboard') ? 'active' : '' }}">
                    <a href="{{route('dashboard')}}"><i class="ik ik-bar-chart-2"></i><span>{{ __('Dashboard')}}</span></a>
                </div>
                <div class="nav-item {{ Route::is('users.index') || Route::is('admin.user.create') || Route::is('user.show') ? 'active' : '' }}">
                    <a href="{{route('users.index')}}"><i class="fa fa-user"></i><span>{{ __('Pengguna')}}</span></a>
                </div>
                <div class="nav-item {{ Route::is('doctor.index') || Route::is('doctor.create') || Route::is('doctor.show') ? 'active' : '' }}">
                    <a href="{{route('doctor.index')}}"><i class="fa fa-user-md"></i><span>{{ __('Konselor')}}</span></a>
                </div>
                <div class="nav-item {{ Route::is('doctor.category.index') || Route::is('doctor.category.*') ? 'active' : '' }}">
                    <a href="{{route('doctor.category.index')}}"><i class="fa fa-bug"></i><span>{{ __('Kategori Konselor')}}</span></a>
                </div>
                <div class="nav-item {{ Route::is('slot.index') ? 'active' : '' }}">
                    <a href="{{route('slot.index')}}"><i class="far fa-calendar"></i><span>{{ __('Konselor Slot')}}</span></a>
                </div>
                <div class="nav-item {{ Route::is('slot.add') ? 'active' : '' }}">
                    <a href="{{route('slot.add')}}"><i class="far fa-calendar-times"></i><span>{{ __('Tambah Slot Konselor')}}</span></a>
                </div>
                <div class="nav-item {{ Route::is('patient.index') || Route::is('patient.create') || Route::is('patient.show') ? 'active' : '' }}">
                    <a href="{{route('patient.index')}}"><i class="fa fa-bug"></i><span>{{ __('Pendaftar')}}</span></a>
                </div>
                <div class="nav-item {{ Route::is('appointment.index') ? 'active' : '' }}">
                    <a href="{{route('appointment.index')}}"><i class="fa fa-calendar-check"></i><span>{{ __('Appointment')}}</span></a>
                </div>
                <!-- News -->
                <div class="nav-item has-sub {{ Route::is('news.*', 'category.*') ? 'active open' : '' }}">
                    <a href="#"><i class="ik ik-file-text"></i><span>{{ __('Berita')}}</span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        <a href="{{route('news.index')}}" class="menu-item {{ Route::is('news.index') ? 'active' : '' }}">{{ __('Berita')}}</a>
                        <a href="{{route('news.create')}}" class="menu-item {{ Route::is('news.create') ? 'active' : '' }}">{{ __('Tambah Berita')}}</a>
                        <a href="{{route('category.index')}}" class="menu-item {{ Route::is('category.index') ? 'active' : '' }}">{{ __('Kategori')}}</a>
                        <a href="{{route('category.create')}}" class="menu-item {{ Route::is('category.create') ? 'active' : '' }}">{{ __('Tambah Kategori')}}</a>
                    </div>
                </div>
                <!-- Appearance -->
                <div class="nav-item has-sub {{ Route::is('menu.*') ? 'active open' : '' }}">
                    <a href="#"><i class="ik ik-edit"></i><span>{{ __('Tampilan')}}</span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        <a href="{{route('menu.index')}}" class="menu-item {{ Route::is('menu.*') ? 'active' : '' }}">{{ __('Menu')}}</a>
                    </div>
                </div>
                <!-- Comment -->
                <div class="nav-item {{ Route::is('comment.*') ? 'active' : '' }}">
                    <a href="{{route('comment.index')}}"><i class="ik ik-edit-1"></i><span>{{ __('Komentar')}}</span></a>
                </div>
                <!-- Comment -->
                <div class="nav-item {{ Route::is('site.social.*') ? 'active' : '' }}">
                    <a href="{{route('site.social.index')}}"><i class="fab fa-facebook-square"></i><span>{{ __('Social Media')}}</span></a>
                </div>
                <!-- Service -->
                <div class="nav-item {{ Route::is('service.*') ? 'active' : '' }}">
                    <a href="{{route('service.index')}}"><i class="ik ik-sliders"></i><span>{{ __('Layanan')}}</span></a>
                </div>
                <!-- Service -->
                <div class="nav-item {{ Route::is('gallery.*') ? 'active' : '' }}">
                    <a href="{{route('gallery.index')}}"><i class="ik ik-image"></i><span>{{ __('Gallery')}}</span></a>
                </div>
                <!-- Pages -->
                <div class="nav-item {{ Route::is('page.*') ? 'active' : '' }}">
                    <a href="{{route('page.index')}}"><i class="ik ik-file-text"></i><span>{{ __('Halaman')}}</span></a>
                </div>
                <!-- Contact -->
                <div class="nav-item {{ Route::is('contact.*') ? 'active' : '' }}">
                    <a href="{{route('contact.index')}}"><i class="ik ik-mail"></i><span>{{ __('Kontak')}}</span></a>
                </div>
                <!-- Site -->
                <div class="nav-item {{ Route::is('sites.*') ? 'active' : '' }}">
                    <a href="{{route('sites.create')}}"><i class="fas fa-cogs"></i><span>{{ __('Pengaturan Situs')}}</span></a>
                </div>
                <!-- Smtp settings -->
                <div class="nav-item {{ Route::is('smtp.*') ? 'active' : '' }}">
                    <a href="{{route('smtp.index')}}"><i class="fas fa-cogs"></i><span>{{ __('SMTP Settings')}}</span></a>
                </div>
                <!-- Smtp settings -->
                <div class="nav-item {{ Route::is('paymentmethod.*') ? 'active' : '' }}">
                    <a href="{{route('paymentmethod.index')}}"><i class="fas fa-credit-card"></i><span>{{ __('Method Settings')}}</span></a>
                </div>
                <!-- Subscribers -->
                <div class="nav-item {{ Route::is('subscribers.*') ? 'active' : '' }}">
                    <a href="{{route('subscribers.index')}}"><i class="fas fa-users-cog"></i><span>{{ __('Subscribers')}}</span></a>
                </div>
                <!-- Sections -->
                <div class="nav-item has-sub {{ Route::is('slider.*', 'faq.*', 'notice.*', 'about.*', 'counter.*', 'gallery_section.*', 'doctor.section', 'testimonial.*', 'brand.*') ? 'active open' : '' }}">
                    <a href="#"><i class="ik ik-layers"></i><span>{{ __('Sections')}}</span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->

                        <a href="{{route('slider.index')}}" class="menu-item {{ Route::is('slider.*') ? 'active' : '' }}">{{ __('Slider')}}</a>
                        <a href="{{route('notice.index')}}" class="menu-item {{ Route::is('notice.*') ? 'active' : '' }}">{{ __('Notice')}}</a>
                        <a href="{{route('about.index')}}" class="menu-item {{ Route::is('about.*') ? 'active' : '' }}">{{ __('About')}}</a>
                        <a href="{{route('counter.index')}}" class="menu-item {{ Route::is('counter.*') ? 'active' : '' }}">{{ __('Counter')}}</a>
                        <a href="{{route('gallery_section.index')}}" class="menu-item {{ Route::is('gallery_section.*') ? 'active' : '' }}">{{ __('Gallery')}}</a>
                        <a href="{{route('doctor.section')}}" class="menu-item {{ Route::is('doctor.section') ? 'active' : '' }}">{{ __('Konselor')}}</a>
                        <a href="{{route('testimonial.index')}}" class="menu-item {{ Route::is('testimonial.*') ? 'active' : '' }}">{{ __('Testimonial')}}</a>
                        <a href="{{route('brand.index')}}" class="menu-item {{ Route::is('brand.*') ? 'active' : '' }}">{{ __('Brand')}}</a>
                        <a href="{{route('faq.index')}}" class="menu-item {{ Route::is('faq.*') ? 'active' : '' }}">{{ __('Faq')}}</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

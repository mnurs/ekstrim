<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\Doctor;
use App\Models\Models\Admin\Site;
use App\Models\Models\Appointment;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();


        if(file_exists(storage_path('installed'))) {
            $site  = Site::first();
            view()->share(['site' => $site]);
        }

    }
}

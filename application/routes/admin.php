<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;


    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('register', [RegisterController::class, 'register']);

    Route::get('password/forget', function () {
        return view('pages.forgot-password');
    })->name('password.forget');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

    Route::get('/logout', [LoginController::class, 'logout']);
    Route::get('/clear-cache', [HomeController::class, 'clearCache']);

    Route::middleware(['admin'])->group(function () {
        Route::get('/addslot', 'Doctor\DoctorSlotController@index')->name('slot.index');
        Route::post('/addslot/store', 'Doctor\DoctorSlotController@store')->name('slot.store');
        Route::get('/addslot/doctor/slot', 'Doctor\DoctorSlotController@adddoctortoslot')->name('slot.add');
        Route::get('/addslot/doctor/slot/{id}/edit', 'Doctor\DoctorSlotController@editslot')->name('slot.edit');
        Route::post('/addslot/doctor/slot/{id}/edit', 'Doctor\DoctorSlotController@updateslot')->name('slot.update');
        Route::post('/addslot/doctor/slot/create', 'Doctor\DoctorSlotController@createdoctortoslot')->name('slot.create');

        Route::get('/user', 'UsersController@index')->name('users.index');
        Route::get('/user/create', 'UsersController@create')->name('admin.user.create');
        Route::post('/user/store', 'UsersController@store')->name('admin.user.store');
        Route::get('/user/{user}/show', 'UsersController@show')->name('user.show');
        Route::get('/user/{user}/delete', 'UsersController@delete')->name('user.delete');
        Route::post('/user/{user}/update', 'UsersController@update')->name('user.update');

        Route::get('admin/{user}/profile', 'Admin\AdminProfileController@index')->name('admin.profile');
        Route::post('admin/{user}/profile/update', 'Admin\AdminProfileController@update')->name('admin.update');

        Route::get('/doctor', 'Doctor\DoctorsController@index')->name('doctor.index');
        Route::get('/doctor/create', 'Doctor\DoctorsController@create')->name('doctor.create');
        Route::post('/doctor/store', 'Doctor\DoctorsController@store')->name('doctor.store');
        Route::get('/doctor/{user}/show', 'Doctor\DoctorsController@show')->name('doctor.show');
        Route::post('/doctor/{user}/update', 'Doctor\DoctorsController@update')->name('doctor.update');

        Route::get('/appointment', 'Appointment\AppointmentController@index')->name('appointment.index');
        Route::get('/appointment/{appointment}/delete', 'Appointment\AppointmentController@delete')->name('appointment.delete');

        Route::get('/patient', 'Patient\PatientController@index')->name('patient.index');
        Route::get('/patient/create', 'Patient\PatientController@create')->name('patient.create');
        Route::post('/patient/store', 'Patient\PatientController@store')->name('patient.store');
        Route::get('/patient/{user}/show', 'Patient\PatientController@show')->name('patient.show');
        Route::post('/patient/{user}/update', 'Patient\PatientController@update')->name('patient.update');

        Route::get('/category', 'Doctor\CategoryController@index')->name('doctor.category.index');
        Route::get('/category/create', 'Doctor\CategoryController@create')->name('doctor.category.create');
        Route::get('/category/{category}/show', 'Doctor\CategoryController@show')->name('doctor.category.show');
        Route::post('/category/create', 'Doctor\CategoryController@store')->name('doctor.category.store');
        Route::post('/category/{category}/update', 'Doctor\CategoryController@update')->name('doctor.category.update');
        Route::get('/category/{category}/delete', 'Doctor\CategoryController@delete')->name('doctor.category.delete');

        Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');

        Route::get('/site/create', 'Admin\SiteIdentityController@create')->name('sites.create');
        Route::post('/site/store', 'Admin\SiteIdentityController@store')->name('sites.store');
        Route::post('/site/{id}/update', 'Admin\SiteIdentityController@update')->name('sites.update');

        Route::get('/subscriber', 'SubscriberController@index')->name('subscribers.index');
        Route::get('/subscriber/sendmail', 'SubscriberController@sendMail')->name('subscribers.mail');
        Route::post('/subscriber/sendmail', 'SubscriberController@sendMailToAll')->name('subscribers.mailsent');

        Route::get('/smtp', 'Admin\SmtpController@index')->name('smtp.index');
        Route::post('/smtpupdate', 'Admin\SmtpController@update')->name('smtp.update');

        Route::get('/paymentmethod', 'Admin\PaymentMethodSettingController@index')->name('paymentmethod.index');
        Route::post('/paymentmethodupdate', 'Admin\PaymentMethodSettingController@update')->name('paymentmethod.update');

});

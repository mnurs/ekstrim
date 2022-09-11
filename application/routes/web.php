<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/filterdoctor/{category}/{slot}', 'Doctor\FilterDoctorController@filterdoctor');
Route::get('/filterdoctor/doctor/{docid}/{slot}', 'Doctor\FilterDoctorController@filterdoctorById');
Route::post('/checkappointment', 'Doctor\FilterDoctorController@checkappointment');

Route::post('/subscriber', 'SubscriberController@store')->name('subscriber.store');
Route::group(['middleware' => 'auth'], function () {


	Route::get('/approve/{appointment}/appointment', 'Doctor\AppointmentController@approve')->name('approve');
	Route::get('/complete/{appointment}/appointment', 'Doctor\AppointmentController@complete')->name('complete');
	Route::get('/remove/{appointment}/appointment', 'Doctor\AppointmentController@delete')->name('removeapp');


	Route::get('/payment', 'Front\PaymentController@index')->name('paypalhome');
	Route::post('/payment/pay', 'Front\PaymentController@pay')->name('pay');
	Route::get('/payment/approval', 'Front\PaymentController@approval')->name('approval');
	Route::get('/payment/cancelled', 'Front\PaymentController@cancelled')->name('cancelled');


	Route::post('searchappointment', 'Front\SearchAppointmentController@search');
	Route::post('patientappointment', 'Front\SearchAppointmentController@patientsearch');
	Route::post('searchappointmentdate', 'Front\SearchAppointmentController@searchdate');
	Route::post('doctorsearchappointmentdate', 'Front\SearchAppointmentController@doctorsearchdate');

	Route::get('pagination/fetch_data', 'Front\HomeController@fetch_data');
	Route::get('pagination/todays_fetch_data', 'Front\HomeController@todays_fetch_data');
	Route::get('pagination/dashboard_fetch_data', 'Front\HomeController@dashboard_fetch_data');

	Route::get('pagination/doctor_fetch_data', 'Front\HomeController@doctor_fetch_data');
	Route::get('pagination/doctor_todays_fetch_data', 'Front\HomeController@doctor_todays_fetch_data');
	Route::get('pagination/doctor_dashboard_fetch_data', 'Front\HomeController@doctor_dashboard_fetch_data');

	Route::post('/appointment', 'Front\AppointmentController@appointment')->name('appointment');
	Route::get('/appointment-delete/{appointment}', 'Front\AppointmentController@deleteappointment')->name('delete.appointment');
	Route::get('/appointment-cancel/{appointment}', 'Front\AppointmentController@cancelAppointment')->name('cancel.appointment');

	ROute::post('/userprofile/{user}', 'Front\UserProfileController@update')->name('user.profile');

	Route::get('/patient-dashboard', 'Front\HomeController@index')->name('patient.dashboard');
	Route::get('/patient-dashboard-redirect/{doctorselected}', 'Front\HomeController@redirect')->name('patient.dashboard.redirect')->middleware('doctorpermission');
	Route::get('/doctor-dashboard', 'Front\HomeController@doctorindex')->name('doctor.dashboard');

	Route::post('/doctor/{appointment}/prescription', 'Front\PrescriptionController@prescription')->name('prescription');
	Route::post('/prescription/{appointment}', 'Front\PrescriptionController@update')->name('prescription.update');
	Route::get('/pdfdownoad/{app}', 'Front\PrescriptionController@pdf')->name('pdfdownload');
});


Route::get('/signup', 'Front\SigninSignupController@signup')->name('patient.signup');
Route::get('/doctor-signup', 'Front\SigninSignupController@doctorsignup')->name('doctor.signup');
Route::get('/forgetpassword', 'Front\SigninSignupController@forgetpassword')->name('forgetpassword');
Route::post('/forgetpasswordpost', 'Front\SigninSignupController@forgetpasswordpost')->name('forget-pass');
Route::get('/resetpassword/{token}', 'Front\SigninSignupController@resetpassword')->name('resetpassword');
Route::post('/resetpassword/{token}', 'Front\SigninSignupController@resetpasswordpost')->name('resetpasswordpost');


Route::post('/signup', [RegisterController::class, 'register'])->name('user.create');
Route::get('/signin', 'Front\SigninSignupController@signin')->name('signin');


Route::post('/stripe', 'Front\StripeController@index');

Route::get('logout', function () {
	Auth::logout();
	return redirect()->route('front.index');
});




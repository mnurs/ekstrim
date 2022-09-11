<?php

namespace App\Http\Controllers\Front;

use App\User;
use Carbon\Carbon;
use App\Models\Doctor;
use App\Models\DoctorSlot;
use App\Traits\JsVariables;
use Illuminate\Http\Request;
use App\Models\DoctorCategory;
use App\Models\PaymentPlatform;
use App\Models\Models\Appointment;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    use JsVariables;
    public function index()
    {
        $doctor  = Doctor::all();
        $appointment = Appointment::all();
        $todaysapp = Appointment::where('user_id', auth()->user()->id)->where('appdate', Carbon::now()->format('Y-m-d'))->orderBy('id', 'DESC')->simplePaginate(5);
        $pastapp = Appointment::where('user_id', auth()->user()->id)->where('appdate', '<', Carbon::now()->format('Y-m-d'))->orderBy('id', 'DESC')->simplePaginate(5);
        $pastappall = Appointment::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->simplePaginate(5);
        $pastappmodal = Appointment::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->with('prescription')->get();
        $paymentPlatforms = PaymentPlatform::all();
        $doctorCategory = DoctorCategory::all();
        $docslots = DoctorSlot::all();
        $patientVariables = $this->patientVariables();
        return view('front.pages.patientdashboard', compact('docslots', 'doctorCategory', 'pastappmodal', 'pastapp', 'pastappall', 'todaysapp', 'doctor', 'appointment', 'paymentPlatforms', 'patientVariables'));
    }


    public function redirect(Doctor $doctorselected)
    {
        $doctor  = Doctor::all();
        $appointment = Appointment::all();
        $todaysapp = Appointment::where('user_id', auth()->user()->id)->where('appdate', Carbon::now()->format('Y-m-d'))->simplePaginate(5);
        $pastapp = Appointment::where('user_id', auth()->user()->id)->where('appdate', '<', Carbon::now()->format('Y-m-d'))->simplePaginate(5);
        $pastappall = Appointment::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->simplePaginate(5);
        $pastappmodal = Appointment::where('user_id', auth()->user()->id)->where('appdate', '<', Carbon::now()->format('Y-m-d'))->get();
        $paymentPlatforms = PaymentPlatform::all();
        $doctorCategory = DoctorCategory::all();
        $docslots = DoctorSlot::all();
        $service = $doctorselected->category->name;
        $fees = $doctorselected->fees;
        $name = $doctorselected->user->name;
        $dcrid = $doctorselected->id;
        $redirectPatientVariables = $this->redirectPatientVariables($service, $fees, $name, $dcrid);

        return view('front.pages.redirectpatientdashboard', compact('pastappall','doctorselected', 'docslots', 'doctorCategory', 'pastappmodal', 'pastapp', 'todaysapp', 'doctor', 'appointment', 'paymentPlatforms', 'redirectPatientVariables'));
    }

    function fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $pastapp = Appointment::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->simplePaginate(5);
            $pastappall = Appointment::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->simplePaginate(5);

            return view('front.pages.past_pagination', compact('pastapp', 'pastappall'))->render();
        }
    }


    public function doctor_fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $pastapp = Appointment::where('doctor_id', auth()->user()->doctor->id)->orderBy('id', 'DESC')->simplePaginate(5);

            return view('front.pages.doctor_past_pagination', compact('pastapp'))->render();
        }
    }


    public function todays_fetch_data(Request $request)
    {
        $todaysapp = Appointment::where('user_id', auth()->user()->id)->where('appdate', Carbon::now()->format('Y-m-d'))->orderBy('id','DESC')->simplePaginate(5);
        return view('front.pages.today_pagination', compact('todaysapp'))->render();
    }

    public function doctor_todays_fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $todaysapp = Appointment::where('doctor_id', auth()->user()->doctor->id)->where('appdate', Carbon::now()->format('Y-m-d'))->orderBy('id', 'DESC')->simplePaginate(5);
            return view('front.pages.doctor_today_pagination', compact('todaysapp'))->render();
        }
    }


    public function dashboard_fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $pastapp = Appointment::where('user_id', auth()->user()->id)->where('appdate', '<', Carbon::now()->format('Y-m-d'))->orderBy('id', 'DESC')->simplePaginate(5);

            return view('front.pages.dashboardpagi', compact('pastapp'))->render();
        }
    }

    public function doctor_dashboard_fetch_data(Request $request)
    {
        if ($request->ajax()) {
           $todaysapp = Appointment::where('doctor_id', auth()->user()->doctor->id)->where('appdate', Carbon::now()->format('Y-m-d'))->orderBy('id', 'DESC')->simplePaginate(5);

            return view('front.pages.doctordashboardpagi', compact('todaysapp'))->render();
        }
    }

    public function doctorindex()
    {
        $newAppointment = Appointment::where('doctor_id', auth()->user()->doctor->id)->whereDate('created_at', '>=', Carbon::today()->subDays(7))->orderBy('id', 'desc')->count();

        $pendingAppointment = Appointment::where('doctor_id', auth()->user()->doctor->id)->whereDate('created_at', '<', Carbon::today())->orderBy('id', 'desc')->count();

        $todayrequest = Appointment::where('doctor_id', auth()->user()->doctor->id)->where('status', 0)->with('patient')->orderBy('id', 'desc')->get();

        $totalpatient = $collection = Appointment::where('doctor_id', auth()->user()->doctor->id)->select('user_id')->distinct()->get()->count();

        $patient  = User::where('role', 'patient')->orderBy('id', 'desc')->get();

        $appointment = Appointment::all();

        $todaysapp = Appointment::where('doctor_id', auth()->user()->doctor->id)->where('appdate', Carbon::now()->format('Y-m-d'))->where('status', '!=', 0)->orderBy('id', 'desc')->simplePaginate(5);

        $pastapp = Appointment::where('doctor_id', auth()->user()->doctor->id)->orderBy('id', 'desc')->simplePaginate(5);

        $pastappModal = Appointment::where('doctor_id', auth()->user()->doctor->id)->where('status', 2)->orWhere('appdate', '<', Carbon::now()->format('Y-m-d'))->with('prescription')->get();

        $doctorVariables = $this->doctorVariables();

        return view('front.pages.doctordashboard', compact('pastappModal', 'pendingAppointment', 'newAppointment', 'todayrequest', 'patient', 'appointment', 'todaysapp', 'pastapp', 'totalpatient', 'doctorVariables'));
    }

}

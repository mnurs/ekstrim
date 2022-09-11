<?php

namespace App\Http\Controllers\Front;


use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Models\Appointment;
use App\Http\Controllers\Controller;
use App\Models\Earning;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Mews\Purifier\Facades\Purifier;

class AppointmentController extends Controller
{

    public function appointment(Request $request)
    {
        $gd = Carbon::parse($request->appdate);
        $today = Carbon::now();

        if ($gd->gt($today) || $gd->isSameDay($today)) {

            Appointment::create([
                'appdate' => Purifier::clean($request->appdate),
                'apptime' => Purifier::clean($request->apptime),
                'doctorsService' => Purifier::clean($request->DoctorsService),
                'doctor_id' => $request->selectdoctory, //doctor id
                'user_id' => Auth::user()->id,
                'paymentmethod' => Purifier::clean($request->paymentmethod),
                'comment' => Purifier::clean($request->comment),
                'slot_id' => $request->slot_id,
            ]);

            Earning::create([
                'doctor_id' => $request->selectdoctory, //doctor id
                'user_id' => Auth::user()->id,
                'earning' => $request->appinput
            ]);

            Session::flash('success', __('Appointment created successfully, please wait for Doctor approval'));

            return redirect()->route('patient.dashboard');
        } else {
            Session::flash('success', __('Please select today or future availabe date of that doctor'));
            Toastr::success(__('Please select today or future availabe date of that doctor'));

            return redirect()->route('patient.dashboard');
        }
    }

    public function deleteappointment(Appointment $appointment)
    {
        $appointment->delete();

        session()->flash('success', __('Successfully Deleted'));

        Toastr::success('', __('Successfully deleted'), ["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }

    public function cancelAppointment(Appointment $appointment)
    {
        $succdata = Appointment::whereId($appointment->id)->update([
            'status' => 3,
        ]);

        if($succdata) {
            session()->flash('success', __('Successfully Deleted'));

            Toastr::success('', __('Successfully deleted'), ["positionClass" => "toast-top-right"]);

            return redirect()->back();
        }
    }
}

<?php

namespace App\Http\Controllers\Doctor;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Models\Appointment;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class AppointmentController extends Controller
{
    public function approve(Appointment $appointment)
    {
        $haveAppointToday = Appointment::where('doctor_id', $appointment->doctor_id)->where('appdate', Carbon::now()->format('Y-m-d'))->where('status', 1)->count();
        
        if($haveAppointToday == 0) {
            $appointment->update([
                'status' => 1
            ]);

            session()->flash('success', __('Successfully approved'));

            Toastr::success('success', __('Successfully approved'), ["positionClass" => "toast-top-right"]);

            return redirect()->back();
        }
        session()->flash('success', __('You have already patient in queue. Please take care of him/her.'));

        Toastr::success('success', __('You have already patient in queue. Please take care of him/her.'), ["positionClass" => "toast-top-right"]);

        return redirect()->back();


    }

    public function complete(Appointment $appointment)
    {
        $appointment->update([
            'status' => 2
        ]);

        session()->flash('success', __('Successfully completed'));

        Toastr::success('success', __('Successfully completed'), ["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }

    public function delete(Appointment $appointment)
    {
        $appointment->delete();

        session()->flash('success', __('Successfully deleted'));

        Toastr::success('success', __('Successfully deleted'), ["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }
}

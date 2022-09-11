<?php

namespace App\Http\Controllers\Front;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Models\Appointment;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SearchAppointmentController extends Controller
{
    public function search(Request $request)
    {
        return $users = DB::table('appointments')
            ->join('doctors', 'appointments.doctor_id', '=', 'doctors.id')
            ->join('users', 'users.id', '=', 'doctors.user_id')
            ->join('doctor_slots', 'doctor_slots.id', '=', 'appointments.slot_id')
            ->select('appointments.id as id','users.name', 'users.image', 'appointments.appdate', 'doctor_slots.start_time', 'doctor_slots.end_time')
            ->where('appointments.user_id', '=', auth()->user()->id)
            ->where('users.name', 'LIKE', '%' . $request->msg . '%')
            ->get();
    }

    public function patientsearch(Request $request)
    {
        return $users = DB::table('appointments')
            ->join('users', 'users.id', '=', 'appointments.user_id')
            ->join('doctors', 'appointments.doctor_id', '=', 'doctors.id')
            ->join('doctor_slots', 'doctor_slots.id', '=', 'appointments.slot_id')
            ->select('appointments.id as id','users.name', 'users.image', 'appointments.*', 'doctor_slots.start_time', 'doctor_slots.end_time')
            ->where('appointments.doctor_id', '=', auth()->user()->doctor->id)
            ->where('name', 'LIKE', '%' . $request->msg . '%')
            ->get();
    }

    public function searchdate(Request $request)
    {

        return $users = DB::table('appointments')
            ->join('doctors', 'appointments.doctor_id', '=', 'doctors.id')
            ->join('users', 'users.id', '=', 'doctors.user_id')
            ->join('doctor_slots', 'doctor_slots.id', '=', 'appointments.slot_id')
            ->select('appointments.id as id','users.name', 'users.image', 'appointments.*', 'doctor_slots.start_time', 'doctor_slots.end_time')
            ->where('appointments.user_id', '=', auth()->user()->id)
            ->where(function ($query) use ($request) {
                $query->whereday('appointments.appdate', $request->date)->orWhereMonth('appointments.appdate', $request->date)
                    ->orwhereYear('appointments.appdate', $request->date);
            })->get();
    }

    public function doctorsearchdate(Request $request)
    {

        return $users = DB::table('appointments')
            ->join('doctors', 'appointments.doctor_id', '=', 'doctors.id')
            ->join('users', 'users.id', '=', 'appointments.user_id')
            ->join('doctor_slots', 'doctor_slots.id', '=', 'appointments.slot_id')
            ->select('appointments.id as id','users.name', 'users.image', 'appointments.*', 'doctor_slots.start_time', 'doctor_slots.end_time')
            ->where('appointments.doctor_id', '=', auth()->user()->doctor->id)
            ->whereDay('appdate', $request->date)
            ->orWhereMonth('appdate', $request->date)
            ->orwhereYear('appdate', $request->date)
            ->get();
    }
}

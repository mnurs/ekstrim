<?php

namespace App\Http\Controllers\Appointment;

use Illuminate\Http\Request;
use App\Models\Models\Appointment;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\DataTables\AppointmentDatatable;

class AppointmentController extends Controller
{
    public function index(AppointmentDatatable $dataTable)
    {
        return $dataTable->render('admin.appointment.index');
    }

    public function delete(Appointment $appointment)
    {
        $appointment->delete();

        session()->flash('success', __('Successfully Deleted'));

        Toastr::success('success', __('Successfully Deleted'), ["positionClass" => "toast-top-right"]);

        return back();
    }
}

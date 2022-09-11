<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddSlotRequest;
use App\Models\Doctor;
use App\Models\DoctorSlot;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;

class DoctorSlotController extends Controller
{
    public function index()
    {
        $docslots = DoctorSlot::all();
        return view('admin.slot.index', compact('docslots'));
    }

    public function store(AddSlotRequest $request)
    {
        DoctorSlot::create(Purifier::clean($request->all()));

        return redirect()->back();
    }

    public function editslot($id)
    {
        $docslot = DoctorSlot::findOrFail($id);
        return view('admin.slot.edit', compact('docslot'));
    }


    public function updateslot(Request $request, $id)
    {
        $docslot = DoctorSlot::findOrFail($id);

        $docslot->update(Purifier::clean($request->all()));

        return redirect()->back();
    }

    public function adddoctortoslot()
    {
        $docslots = DoctorSlot::all();
        $doctors = Doctor::all();
        return view('admin.slot.add', compact('docslots', 'doctors'));
    }

    public function createdoctortoslot(Request $request)
    {
        $doctor = Doctor::findOrFail($request->doctor_id);
        $slot = DoctorSlot::findOrFail($request->slot_id);

        $doctor->slot()->syncWithoutDetaching($request->slot_id);

        return back();
    }
}

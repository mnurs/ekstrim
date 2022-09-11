<?php

namespace App\Http\Controllers\Front;

use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Prescription;
use Illuminate\Http\Request;
use App\Models\TestPrescription;
use App\Models\Models\Appointment;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Mews\Purifier\Facades\Purifier;

class PrescriptionController extends Controller
{
    public function prescription(Request $request, Appointment $appointment)
    {

        foreach ($request->MedicineName as $i => $medicine) {
            $prescription = Prescription::create([
                'appointment_id' => $appointment->id,
                'patient_id' => $appointment->patient->id,
                'medicine_name' => Purifier::clean($medicine),
                'patient_weight' => Purifier::clean($request->patient_weight),
                'patient_bp' => Purifier::clean($request->PatientBP),
                'patient_temperature' => Purifier::clean($request->PatientTemperature),
                'advice' => Purifier::clean($request->advice),

            ]);

            $prescription->update([
                'medicine_type' => Purifier::clean($request->type[$i])
            ]);

            $prescription->update([
                'medicine_quantity' => Purifier::clean($request->mg[$i])
            ]);

            $prescription->update([
                'medicine_dose' => Purifier::clean($request->Dose[$i])
            ]);

            $prescription->update([
                'medicine_day' => Purifier::clean($request->Day[$i])
            ]);

            $prescription->update([
                'medicine_comment' => Purifier::clean($request->Comment[$i])
            ]);
        }

        if ($request->has('testname')) {
            foreach ($request->testname as $i => $testname) {
                $testprescription = TestPrescription::create([
                    'appointment_id' => $appointment->id,
                    'patient_id' => $appointment->patient->id,
                    'test_name' => Purifier::clean($testname)
                ]);

                $testprescription->update([
                    'test_comment' => Purifier::clean($request->testcomment[$i])
                ]);
            }
        }

        $user = User::where('id', $prescription->patient_id)->first();

        Appointment::whereId($appointment->id)->update([
            'status' => 2,
        ]);
        Toastr::success('message', __('Prescription Successfully Created'));

        return redirect()->back();
    }

    public function update(Request $request, Appointment $appointment)
    {

        $appointment->prescription()->delete();

        foreach ($request->MedicineName as $i => $medicine) {
            $prescription = Prescription::create([
                'appointment_id' => $appointment->id,
                'patient_id' => $appointment->patient->id,
                'medicine_name' => Purifier::clean($medicine),
                'patient_weight' => Purifier::clean($request->weight),
                'patient_bp' => Purifier::clean($request->PatientBP),
                'patient_temperature' => Purifier::clean($request->PatientTemperature),
                'patient_weight' => Purifier::clean($request->patient_weight),
                'patient_bp' => Purifier::clean($request->PatientBP),
                'advice' => Purifier::clean($request->advice),

            ]);

            $prescription->update([
                'medicine_type' => Purifier::clean($request->type[$i])
            ]);

            $prescription->update([
                'medicine_quantity' => Purifier::clean($request->mg[$i])
            ]);

            $prescription->update([
                'medicine_dose' => Purifier::clean($request->Dose[$i])
            ]);

            $prescription->update([
                'medicine_day' => Purifier::clean($request->Day[$i])
            ]);

            $prescription->update([
                'medicine_comment' => Purifier::clean($request->Comment[$i])
            ]);
        }

        $appointment->testprescription()->delete();

        if (!empty($request->testname)) {
            foreach ($request->testname as $i => $testname) {
                $testprescription = TestPrescription::create([
                    'appointment_id' => $appointment->id,
                    'patient_id' => $appointment->patient->id,
                    'test_name' => Purifier::clean($testname)
                ]);

                $testprescription->update([
                    'test_comment' => Purifier::clean($request->testcomment[$i])
                ]);
            }
        }

        Toastr::success('message', __('Prescription Updated'));

        return redirect()->back();
    }


    public function delete(Prescription $prescription)
    {
        $prescription->delete();

        Toastr::success('message', __('Successfully Deleted'));
        return redirect()->back();
    }

    public function pdf(Appointment $app)
    {

        $pdf = PDF::loadView('front.pages.pdf', compact('app'));

        return $pdf->download('prescription.pdf');
    }
}

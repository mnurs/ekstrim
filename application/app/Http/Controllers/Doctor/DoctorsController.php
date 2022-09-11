<?php

namespace App\Http\Controllers\Doctor;

use App\User;
use App\Models\Doctor;
use App\Models\DoctorSlot;
use Illuminate\Http\Request;
use ParagonIE\Sodium\Compat;
use App\Models\DoctorCategory;
use Mews\Purifier\Facades\Purifier;
use App\DataTables\DoctorsDatatable;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateDoctorRequest;
use App\Http\Requests\DoctorScheduleRequest;

class DoctorsController extends Controller
{
    public function index(DoctorsDatatable $dataTable)
    {
        $user = User::where('role', 'doctor')->get();
        return $dataTable->render('admin.doctor.index', compact('user'));
    }

    public function show(User $user)
    {
        $category = DoctorCategory::all();
        return view('admin.doctor.edit', compact('user', 'category'));
    }

    public function create()
    {
        $category = DoctorCategory::all();
        return view('admin.doctor.create', compact('category'));
    }

    public function store(CreateDoctorRequest $request)
    {
        if ($request->off_day != null) {
            $offday = implode(',', Purifier::clean($request->off_day));
        }

        if (!empty($request->profile_image)) {
            $profile_image = fileUpload($request['profile_image'], path_user_image()); // upload file
        }
        else {
            $profile_image = null;
        }
        if (!empty($request->thumb_image)) {
            $thumb_image = fileUpload($request['thumb_image'], path_user_image()); // upload file
        }
        else {
            $thumb_image = null;
        }

        $user = User::create([
            'name' => Purifier::clean($request->name),
            'email' => Purifier::clean($request->email),
            'gender'=>Purifier::clean($request->gender),
            'image' => $thumb_image,
            'password' => Hash::make($request->password),
            'role' => 'doctor',
        ]);

        $doctor = Doctor::create([
            'user_id' => $user->id,
            'gender'=>Purifier::clean($request->gender),
            'category_id'=>$request->docat,
            'fees' => $request->fees,
            'profile_image' => $profile_image,
            'thumb_image' => $thumb_image,
            'offday' => isset($offday) ? $offday : '',
        ]);

        $slots = DoctorSlot::get();

        foreach($slots as $slot) {
            $doctor->slot()->syncWithoutDetaching($slot->id);
        }

        session()->flash('success', __('Successfully Created'));

        Toastr::success('success', __('Successfully Created'), ["positionClass" => "toast-top-right"]);

        return back();
    }

    public function update(Request $request, User $user)
    {
        if ($request->off_day != null) {
            $offday = implode(',', Purifier::clean($request->off_day));
        }

        $input = [
            'chamber' => isset($request->chamber) ? Purifier::clean($request->chamber) : '',
            'degree' => isset($request->degree) ? Purifier::clean($request->degree) : '',
            'offday' => isset($offday) ? $offday : '',
            'starttime' => isset($request->starttime) ? Purifier::clean($request->starttime) : '',
            'endtime' => isset($request->endtime) ? Purifier::clean($request->endtime) : '',
            'starttime2' => isset($request->starttime2) ? Purifier::clean($request->starttime2) : '',
            'endtime2' => isset($request->endtime2) ? Purifier::clean($request->endtime2) : '',
            'category_id' => Purifier::clean($request->category),
            'fees' => Purifier::clean($request->fees)
        ];

        $doctor = Doctor::where('user_id', $user->id)->exists();

        if ($doctor) {
            $user->doctor()->update($input);
        } else {
            $user->doctor()->create($input);
        }

        session()->flash('success', __('Successfully Updated'));

        Toastr::success('success', __('Successfully Updated'), ["positionClass" => "toast-top-right"]);

        return back();
    }
}

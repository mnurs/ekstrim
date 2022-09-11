<?php

namespace App\Models\Models;

use App\Models\Doctor;
use App\Models\DoctorSlot;
use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }

    public function patient()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function prescription()
    {
        return $this->hasMany('App\Models\Prescription');
    }

    public function testprescription()
    {
        return $this->hasMany('App\Models\TestPrescription');
    }

    public function slot()
    {
        return $this->hasOne(DoctorSlot::class, 'id', 'slot_id');
    }
}

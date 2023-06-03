<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TherapyAppointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id', 'patient_id','patient_type','status'
    ];

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }



    public function therapyAppointmentDateAndTimes()
    {
        return $this->hasMany('App\Models\TherapyAppointmentDateAndTime');
    }

    public function therapyAppointmentDetails()
    {
        return $this->hasMany('App\Models\TherapyAppointmentDetail');
    }

    public function patientMainTherapies()
    {
        return $this->hasMany('App\Models\PatientMainTherapy');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientTherapy extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount','doctor_id','doctor_appointment_id','patient_id','patient_history_id','name',
        'therapy_type','package_name','status'
    ];



    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor');
    }

    public function doctor_appointment()
    {
        return $this->belongsTo('App\Models\DoctorAppointment');
    }

    public function patient_history()
    {
        return $this->belongsTo('App\Models\PatientHistory');
    }
}

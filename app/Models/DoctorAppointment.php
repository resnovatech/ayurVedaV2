<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorAppointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id','appointment_time', 'patient_id', 'doctor_id','appointment_date','patient_type','serial_number','status'
    ];

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }



    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor');
    }


    public function patientHistories()
    {
        return $this->hasMany('App\Models\PatientHistory');
    }


    public function patientHerbs()
    {
        return $this->hasMany('App\Models\PatientHerb');
    }


    public function patientPackage()
    {
        return $this->hasMany('App\Models\PatientPackage');
    }

    public function patientTherapies()
    {
        return $this->hasMany('App\Models\PatientTherapy');
    }


    public function patientMedicalSupplements()
    {
        return $this->hasMany('App\Models\PatientMedicalSupplement');
    }
}

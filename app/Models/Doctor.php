<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id', 'name', 'address','gender','email_address','phone_or_mobile_number','nid_number','nationality','years_of_experience','doctor_certificate',
    ];

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }

    public function patientAdmits()
    {
        return $this->hasMany('App\Models\PatientAdmit');
    }

    public function doctorAppointments()
    {
        return $this->hasMany('App\Models\DoctorAppointment');
    }

    public function doctorConsultDates()
    {
        return $this->hasMany('App\Models\DoctorConsultDate');
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


    public function bills()
    {
        return $this->hasMany('App\Models\Bill');
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

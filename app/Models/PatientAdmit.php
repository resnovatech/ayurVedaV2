<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientAdmit extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id', 'patient_type', 'patient_id','doctor_id','name','age','gender','address','email_address','phone_or_mobile_number','nid_number','nationality','type_of_accommodation','recommended_doctor_name','start_date','end_date','treatment_package_name','routine'
    ];

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor');
    }
}

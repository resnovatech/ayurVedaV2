<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalkByPatient extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin_id', 'image', 'patient_reg_id','name','refer_from','age','gender','address','email_address','phone_or_mobile_number','nid_number','nationality','how_did_you_come_to_know_about_this_center','do_you_have_earlier_experience_of_ayurveda_please_give_details','do_you_have_symptoms_in_past_one_weak','covid_test_result'
    ];

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }

    public function walkByPatientServices()
    {
        return $this->hasMany('App\Models\WalkByPatientService');
    }

}

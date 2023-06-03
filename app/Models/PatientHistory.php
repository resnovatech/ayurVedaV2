<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id','doctor_id','doctor_appointment_id','patient_id','pradhan_vedana','vedana_vrutanta',
        'chikitsa_vrutanta','stri_evam_prasooti_vrutant','poorva_vedana_vrutant','anuvanshika_vritanta','pratyaksh_pramanam',
        'roga_preeksha_srotas_pareeksha','rasavaha_srotas','raktavaha_srotas','mamsavaha_srotas','medovaha_srotas','asthivaha_srotas','majjavaha_srotas','shukravaha_srotas',
        'rogi_pareeksha','nadi','dosha','dushya','shwas','tap_temp','kala','bhara_wt','agni','raktchap_bp','prakruti','mala','vaya','mootra','satmya','kshudha',
        'satva','nidra','ahara','vyasan','roga_mrag','rago_sthana','sadhyasadhyata','pathya','yoga_chikitsa','paramarsh','history_file','status','bill_status'
    ];

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor');
    }

    public function doctor_appointment()
    {
        return $this->belongsTo('App\Models\DoctorAppointment');
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

    public function patientMainTherapies()
    {
        return $this->hasMany('App\Models\PatientMainTherapy');
    }

    public function patientMedicalSupplements()
    {
        return $this->hasMany('App\Models\PatientMedicalSupplement');
    }
}

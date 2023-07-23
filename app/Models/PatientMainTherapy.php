<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientMainTherapy extends Model
{
    use HasFactory;

    protected $fillable = [
        'therapist_id','therapy_package_id','therapy_appointment_id','patient_id','patient_history_id','name',
        'amount'
    ];

    public function therapist()
    {
        return $this->belongsTo('App\Models\Therapist');
    }

    public function therapyAppointment()
    {
        return $this->belongsTo('App\Models\TherapyAppointment');
    }

    public function patient_history()
    {
        return $this->belongsTo('App\Models\PatientHistory');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TherapyAppointmentDateAndTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'therapy_appointment_id', 'therapist','therapy','date','start_time','end_time','serial','status','patient_id','admin_id'
    ];

    public function therapyAppointment()
    {
        return $this->belongsTo('App\Models\TherapyAppointment');
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }
}

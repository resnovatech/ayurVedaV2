<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorConsultDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id', 'day', 'start_time','end_time'
    ];

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor');
    }
}

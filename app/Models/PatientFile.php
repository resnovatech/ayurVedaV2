<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id', 'name', 'file'
    ];

    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }
}

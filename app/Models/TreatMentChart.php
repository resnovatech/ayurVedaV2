<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreatMentChart extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id','therapy_id','day','time_of_the_day','patient_type'
    ];
}

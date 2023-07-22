<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineEquipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','quantity','unit'
    ];



}

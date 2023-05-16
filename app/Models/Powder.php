<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Powder extends Model
{
    use HasFactory;

    protected $fillable = [
        'medicine_equipment_id','name','amount',
    ];

    public function medicine_equipments()
    {
        return $this->hasMany('App\Models\MedicineEquipment');
    }

    public function pakage()
    {
        return $this->belongsTo('App\Models\Package');
    }
}

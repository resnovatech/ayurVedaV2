<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherEquipmentDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'other_equipment_id','name','quantity','unit'
    ];

    public function otherEquipment()
    {
        return $this->belongsTo('App\Models\OtherEquipment');
    }
}

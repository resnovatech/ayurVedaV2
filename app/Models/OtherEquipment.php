<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherEquipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'category','name'
    ];


    public function otherEquipmentDetails()
    {
        return $this->hasMany('App\Models\OtherEquipmentDetail');
    }
}

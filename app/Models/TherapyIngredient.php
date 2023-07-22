<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TherapyIngredient extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','quantity','unit'
    ];

    public function therapyDetails()
    {
        return $this->belongsToMany('App\Models\TherapyDetail')->withTimestamps();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TherapyDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'therapy_list_id','therapy_ingredient_id','quantity','unit'
    ];


    public function therapyList()
    {
        return $this->belongsTo('App\Models\TherapyList');
    }

    public function therapyIngredients()
    {
        return $this->belongsTo('App\Models\TherapyIngredient')->withTimestamps();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VamanYogaList extends Model
{
    use HasFactory;

    protected $fillable = [
        'agrement_form_one_id',
        'yoga_name',
        'time',
        'quantity',
    ];

    public function agrement_form_ones()
    {
        return $this->belongsTo('App\Models\AgrementFormOne');
    }
}

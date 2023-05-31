<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgrementFormThreeSnehaList extends Model
{
    use HasFactory;

    protected $fillable = [
        'agrement_form_three_id',
        'sneha_name',
        'day_one',
        'day_two',
        'day_three',
        'day_four',
        'day_five',
        'day_six',
        'day_seven',
        'remark',
    ];

    public function agrement_form_threes()
    {
        return $this->belongsTo('App\Models\AgrementFormThree');
    }
}

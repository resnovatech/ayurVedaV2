<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgrementFormThree extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'opd_no',
        'name',
        'age',
        'gender',
        'diagnosis',
        'physician',
        'dos',
        'doc',
        'poorv_karma',
        'snehpanam',
        'pradhan_karma',
        'blood_pressure',
        'virechan_yog',
        'nadi',
        'samyak_lakshana_vegaki',
        'samyak_lakshana_manaki',
        'samyak_lakshana_laingaki',
        'laingaki',
        'type_of_shodhanam',
        'samsarjana_krama',
        'diet_on_day_before',
    ];

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }

    public function agrement_form_three_sneha_lists()
    {
        return $this->hasMany('App\Models\AgrementFormThreeSnehaList');
    }
}

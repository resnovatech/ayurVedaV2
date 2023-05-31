<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgrementFormTwo extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'opd_no',
        'name',
    ];

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }
}

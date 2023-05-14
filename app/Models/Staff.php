<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id', 'name', 'email','phone_or_mobile_number','address','nid_number','nationality','dob','years_of_experience'
    ];

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }
}

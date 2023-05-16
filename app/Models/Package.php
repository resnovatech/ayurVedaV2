<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','powder_id', 'amount',
    ];

    public function powders()
    {
        return $this->hasMany('App\Models\Powder');
    }
}

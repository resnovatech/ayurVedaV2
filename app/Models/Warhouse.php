<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warhouse extends Model
{
    use HasFactory;


    protected $fillable = [
        'name','quantity','unit','price','vendor','expired_date'
    ];

   

}

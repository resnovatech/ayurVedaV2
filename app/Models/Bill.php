<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id','doctor_id','patient_id','invoice_id','payment_status','total_amount'
       ];

       public function admin()
       {
           return $this->belongsTo('App\Models\Admin');
       }

       public function doctor()
       {
           return $this->belongsTo('App\Models\Doctor');
       }
}

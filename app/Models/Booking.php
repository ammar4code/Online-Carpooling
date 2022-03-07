<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;


    protected $fillable = [
        'title', 'from','to','date','time','place','price','driver_name','psn_name','driver_id','psn_id','status'
    ];

}

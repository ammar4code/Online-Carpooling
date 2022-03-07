<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class psnreport extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','date','time','place','price','vehicle_type','DriverId','DriverId','status'
    ]; 
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SmartMeter extends Model
{
    protected $fillable = [
        'socket_id',
        'name',
        'status',
        'current_power',
        'total_energy'
    ];
} 
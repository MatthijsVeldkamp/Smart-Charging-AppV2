<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChargeSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'socket_id',
        'time_begin', 
        'time_end',
        'user_id',
        'total_energy_on_start',
        'total_energy_on_end',
        'used_energy_total',
        'created_at',
        'updated_at'
    ];
}

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
        'power_consumption',
        'created_at',
        'updated_at'
    ];
}
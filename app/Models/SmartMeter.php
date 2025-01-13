<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmartMeter extends Model
{
    use HasFactory;

    protected $fillable = [
        'socket_id',
        'name',
        'status'
    ];
} 
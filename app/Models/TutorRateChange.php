<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorRateChange extends Model
{
    use HasFactory;

    protected $fillable = [
        'old_hourly_rate',
        'new_hourly_rate',
    ];
}

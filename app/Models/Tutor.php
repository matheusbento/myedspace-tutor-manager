<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tutor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'avatar',
        'name',
        'email',
        'hourly_rate',
        'bio',
        'subjects',
    ];

    protected $casts = [
        'subjects' => 'array',
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_tutors');
    }

    public function rateChanges()
    {
        return $this->hasMany(TutorRateChange::class);
    }
}

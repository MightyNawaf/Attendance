<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    public $table = 'attendance';
    protected $fillable = [
        'student_name',
        'student_id',
        'course_id',
        'student_phone',
        'hasAttended',
        'day'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_name',
        'student_id',
        'course_id',
        'student_phone',
        'hasAttended'
    ];
    public function students(){
        return $this->hasMany(Student::Class);
    }
}

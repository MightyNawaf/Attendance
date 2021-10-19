<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_name',
        'user_id',
        'isActive',
        'start_date',
        'end_date'
    ];
    public function students(){
        return $this->hasMany(Student::Class);
    }
}

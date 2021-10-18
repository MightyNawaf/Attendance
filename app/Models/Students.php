<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_name',
        'user_id',
        'hasAttended'
    ];
    public function students(){
        return $this->hasMany(Student::Class);
    }
}

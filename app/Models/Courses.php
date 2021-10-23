<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    
    use HasFactory;
    public $primaryKey = 'competence_profile_id';
    protected $fillable = [
        'course_name',
        'user_id',
        'isActive',
        'days',
    ];
    public function students(){
        return $this->hasMany(Student::Class);
    }
}

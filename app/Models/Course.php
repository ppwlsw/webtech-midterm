<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    protected $fillable = [
        'course_code',
        'course_name',
        'course_curriculum',
        'course_category',
        'prerequisite_course',
        'credit'
    ];




    public function students(): belongsToMany {
        return $this->belongsToMany(Student::class,'course_result');
    }
}

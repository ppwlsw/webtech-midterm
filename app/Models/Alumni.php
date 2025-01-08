<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Alumni extends Model
{
    function student(): hasOne
    {
        return $this->hasOne(Student::class, 'student_id', 'student_id');
    }
}

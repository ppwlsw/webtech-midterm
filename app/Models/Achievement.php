<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Achievement extends Model
{
    public function student(): BelongsTo {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }
}

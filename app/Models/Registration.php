<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_code',
        'activity_id',
        'time_stamp'
    ];

    public function activity() : BelongsTo {
        return $this->belongsTo(Activity::class);
    }

    public function student() : BelongsTo {
        return $this->belongsTo(Student::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Achievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'achievement_name',
        'achievement_detail',
        'achievement_year',
        'achievement_type'
    ];

    public function student(): BelongsTo {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }
}

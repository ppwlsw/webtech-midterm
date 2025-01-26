<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'student_code',
        'first_name',
        'last_name',
        'student_type',
        'contact_info',
        'telephone_num',
        'completion_year',
        'curriculum',
        'admission_channel',
        'admission_year',
        'student_status',
        'semester',
        'workplace',
        'contribution',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function achievements(): HasMany {
        return $this->hasMany(Achievement::class);
    }

    public function courses(): belongsToMany {
        return $this->belongsToMany(Course::class, 'course_result');
    }

    public function activities(): belongsToMany {
        return $this->belongsToMany(Activity::class, 'registration');
    }



}

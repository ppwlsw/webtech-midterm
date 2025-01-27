<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_name',
        'activity_type',
        'activity_detail',
        'max_participants',
        'condition',
        'start_datetime',
        'end_datetime',
        'join_start_datetime',
        'join_end_datetime',
    ];

    public function students(): belongsToMany {
        return $this->belongsToMany(Student::class, 'registrations')
            ->withPivot('time_stamp');
    }
}

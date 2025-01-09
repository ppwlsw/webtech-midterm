<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_name',
        'activity_type',
        'activity_detail',
        'max_participants',
        'condition',
        'start_date',
        'end_date',
    ];

    public function registrations() : HasMany {
        return $this->hasMany(Registration::class);
    }
}

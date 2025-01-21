<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Alumni extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'workplace',
        'contribution'
    ];

    public function student(): belongsTo {
        return $this->belongsTo(Student::class);
    }
}

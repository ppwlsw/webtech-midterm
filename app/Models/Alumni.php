<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Alumni extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'workplace',
        'contribution'
    ];

    function student(): hasOne
    {
        return $this->hasOne(Student::class, 'student_id', 'student_id');
    }
}

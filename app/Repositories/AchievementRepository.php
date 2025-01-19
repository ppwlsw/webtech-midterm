<?php

namespace App\Repositories;

use App\Models\Achievement;
use App\Models\Student;
use App\Repositories\Traits\RestAPI;
use Illuminate\Database\Eloquent\Collection;

class AchievementRepository
{
    use RestAPI;

    private string $model = Achievement::class;

    public function getAchievementByUserID($user_id) : ?Collection {
        $student = Student::where('user_id', $user_id)->first();

        if (!$student) {
            return null;
        }

        return $student->achievements;
    }

}


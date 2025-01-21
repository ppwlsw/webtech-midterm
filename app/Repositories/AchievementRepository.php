<?php

namespace App\Repositories;

use App\Models\Achievement;
use App\Models\Activity;
use App\Repositories\Traits\RestAPI;
use Illuminate\Database\Eloquent\Collection;

class AchievementRepository
{
    use RestAPI;

    private string $model = Achievement::class;

    public function getAchievementByStudentId(int $studentId)  {
        return  $this->model::where('student_id', 'LIKE', $studentId)->get();
    }

}


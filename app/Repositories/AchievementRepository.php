<?php

namespace App\Repositories;

use App\Models\Achievement;
use App\Repositories\Traits\RestAPI;

class AchievementRepository
{
    use RestAPI;

    private string $model = Achievement::class;

}


<?php

namespace App\Repositories;

use App\Http\Controllers\ActivityController;
use App\Models\Activity;
use App\Repositories\Traits\RestAPI;
use Illuminate\Database\Eloquent\Collection;

class ActivityRepository
{
    use RestAPI;

    private string $model = Activity::class;

    public function filterByName(string $name): Collection {
        return Activity::where('activity_name', 'LIKE', "%{$name}%")->get();
    }

}

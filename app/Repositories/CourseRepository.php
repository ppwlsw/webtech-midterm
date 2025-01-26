<?php

namespace App\Repositories;

use App\Models\Course;
use App\Repositories\Traits\RestAPI;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class CourseRepository
{
    use RestAPI;

    private string $model = Course::class;




}

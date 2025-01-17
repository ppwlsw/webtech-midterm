<?php

namespace App\Repositories;

use App\Models\Course;
use App\Repositories\Traits\RestAPI;
use Illuminate\Database\Eloquent\Collection;

class CourseRepository
{
    use RestAPI;

    private string $model = Course::class;

    public function getCourseById(int $id): Collection {
        return  $this->model::where("id", $id)->get();
    }



}

<?php

namespace App\Repositories;

use App\Models\Alumni;
use App\Repositories\Traits\RestAPI;

class AlumniRepository
{
    use RestAPI;

    private string $model = Alumni::class;

}

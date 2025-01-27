<?php

namespace App\Repositories;

use App\Models\Registration;
use App\Repositories\Traits\RestAPI;

class RegistrationRepository
{
    use RestAPI;

    private string $model = Registration::class;

    public function create(array $data) {
        return Registration::create($data);
    }

}

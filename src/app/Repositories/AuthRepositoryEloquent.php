<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\AuthRepository;

class AuthRepositoryEloquent extends AbstractRepository implements AuthRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }
}

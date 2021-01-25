<?php

namespace App\Services\Traits;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Trait Create
 * @package App\Services\Traits
 * @property BaseRepository $repository
 */
trait Create
{
    /**
     * @param array $fields
     * @return array
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function create(array $fields): Model
    {
        return $this->repository->create($fields);
    }
}

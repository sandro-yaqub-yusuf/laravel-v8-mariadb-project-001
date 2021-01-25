<?php

namespace App\Services\Traits;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Trait Update
 * @package App\Services\Traits
 * @property BaseRepository $repository
 */
trait Update
{
    /**
     * @param array $attributes
     * @param int $id
     * @return array
     */
    public function update(array $attributes, $id): Model
    {
        return $this->repository->update($attributes, $id);
    }
}

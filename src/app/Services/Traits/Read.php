<?php

namespace App\Services\Traits;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Trait Read
 * @package App\Services\Traits
 * @property BaseRepository $repository
 */
trait Read
{
    /**
     * @param $id
     * @return Model
     */
    public function getById($id): Model
    {
        return $this->repository->find($id);
    }
    
    /**
     * @param array|string[] $columns
     * @return LengthAwarePaginator|\Illuminate\Support\Collection|mixed
     */
    public function getAll(?array $columns = null)
    {
        return $this->repository->all($columns ?? ['*']);
    }
}

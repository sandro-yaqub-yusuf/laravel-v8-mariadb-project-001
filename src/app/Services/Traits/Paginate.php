<?php

namespace App\Services\Traits;

use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Trait Paginate
 * @package App\Services\Traits
 * @property BaseRepository $repository
 */
trait Paginate
{    
    /**
     * @param int|null $page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Support\Collection|mixed
     */
    public function paginate(?int $page = null)
    {
        return $this->repository->paginate($page);
    }
}

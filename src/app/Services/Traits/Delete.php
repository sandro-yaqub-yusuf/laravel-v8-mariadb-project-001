<?php

namespace App\Services\Traits;

use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Trait Delete
 * @package App\Services\Traits
 * @property BaseRepository $repository
 */
trait Delete
{
    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }
}

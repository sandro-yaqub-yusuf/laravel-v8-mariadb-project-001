<?php

namespace App\Services\Traits;

use App\Support\RequestHelper;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Trait Order
 * @package App\Services\Traits
 *
 *  * @property BaseRepository $repository
 */
trait Order
{
    public function order()
    {
        if (RequestHelper::valid('order_column')){
            $this->repository->orderBy(RequestHelper::get('order_column'), RequestHelper::get('order_direction') ?? 'asc');
        }
        
        return $this;
    }
}

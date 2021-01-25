<?php

namespace App\Services\Traits;

use App\Support\RequestHelper;
use App\Support\SearchHelper;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Trait Search
 * @package App\Services\Traits
 *
 * @property BaseRepository $repository
 */
trait Search
{
    protected function search(array $fields, array $config = [])
    {
        if (RequestHelper::anyValid($fields)) {
            $allFields = RequestHelper::all($fields);

            $this->repository->whereConditions(SearchHelper::where($allFields, $config));
        }
    }
}

<?php

namespace App\Services;

use Illuminate\Foundation\Application;
use App\Repositories\AbstractRepository;
use App\Repositories\Interfaces\RepositoryInterface;

/**
 * Class AbstractService
 * @package App\Services
 */
abstract class AbstractService
{
    /**
     * @var Application
     */
    protected $app;
    
    /**
     * @var AbstractRepository
     */
    protected $repository;
    
    /**
     * AbstractService constructor.
     * @param Application $app
     * @param RepositoryInterface $repository
     */
    public function __construct(Application $app, RepositoryInterface $repository)
    {
        $this->app = $app;
        $this->repository = $repository;
    }
}

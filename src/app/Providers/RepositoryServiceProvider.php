<?php

namespace App\Providers;

use App\Repositories\Interfaces\ProductRepository;
use App\Repositories\ProductRepositoryEloquent;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoryServiceProvider
 * @package App\Providers
 *
 * @property Application $app
 *
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {}

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ProductRepository::class, ProductRepositoryEloquent::class);
    }
}

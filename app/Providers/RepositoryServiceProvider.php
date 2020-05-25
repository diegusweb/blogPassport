<?php

namespace App\Providers;

use App\Contracts\IAUthRepository;
use App\Contracts\IProductRepository;
use App\Repositories\AuthRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        IAUthRepository::class         =>          AuthRepository::class,
        IProductRepository::class      =>          ProductRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

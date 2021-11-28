<?php

namespace App\Providers;

use App\Repositories\BookRepository;
use App\Repositories\RepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            RepositoryInterface::class,
            'App\Repositories\AuthorRepository'
        );

        $this->app->bind(
            RepositoryInterface::class,
            'App\Repositories\GenreRepository'
        );

        $this->app->bind(
            RepositoryInterface::class,
            BookRepository::class
        );
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

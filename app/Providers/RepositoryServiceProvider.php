<?php

namespace App\Providers;

use App\Repositories\AuthorRepository;
use App\Repositories\BookRepository;
use App\Repositories\GenreRepository;
use App\Repositories\PermissionRepository;
use App\Repositories\RepositoryInterface;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
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
            AuthorRepository::class
        );

        $this->app->bind(
            RepositoryInterface::class,
            GenreRepository::class
        );

        $this->app->bind(
            RepositoryInterface::class,
            BookRepository::class
        );

        $this->app->bind(
            RepositoryInterface::class,
            UserRepository::class
        );

        $this->app->bind(
            RepositoryInterface::class,
            PermissionRepository::class
        );

        $this->app->bind(
            RepositoryInterface::class,
            RoleRepository::class
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

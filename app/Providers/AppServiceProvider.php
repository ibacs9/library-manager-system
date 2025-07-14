<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\UserRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\BookRepositoryInterface::class,
            \App\Repositories\BookRepository::class
        );

        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(\App\Repositories\BookRentalRepositoryInterface::class, \App\Repositories\BookRentalRepository::class);
        $this->app->bind(\App\Repositories\BookUserProgressRepositoryInterface::class, \App\Repositories\BookUserProgressRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

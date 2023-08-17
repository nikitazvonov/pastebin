<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Services\UserService;
use App\Services\UserServiceInterface;
use App\Services\PasteService;
use App\Services\PasteServiceInterface;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(PasteServiceInterface::class, PasteService::class);
    }
}

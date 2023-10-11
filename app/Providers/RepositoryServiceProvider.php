<?php

namespace App\Providers;

use App\Repository\JobsRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\JobsRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(JobsRepositoryInterface::class, JobsRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

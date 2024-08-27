<?php

namespace App\Providers;

use App\Interfaces\ProjectRepositoryInterface;
use App\Interfaces\ProjectServiceInterface;
use App\Interfaces\TaskServiceInterface;
use App\Repositories\ProjectRepository;
use App\Services\ProjectService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProjectServiceInterface::class, ProjectService::class);
        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepository::class);
        $this->app->bind(TaskServiceInterface::class, TaskService::class);
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

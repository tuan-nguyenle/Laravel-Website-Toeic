<?php

namespace App\Providers;

use App\Repository\InterfaceExamsRepository;
use App\Repository\InterfaceNewsRepository;
use App\Repository\InterfaceRoleRepository;
use App\Repository\InterfaceUserRepository;
use App\Repository\InterfaceQuestionsRepository;
use App\Repository\NewsRepository;
use App\Repository\RoleRepository;
use App\Repository\UserRepository;
use App\Repository\ExamsRepository;
use App\Repository\InterfaceResultRepository;
use App\Repository\QuestionsRepository;
use App\Repository\ResultRepository;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(InterfaceUserRepository::class, UserRepository::class);
        $this->app->bind(InterfaceRoleRepository::class, RoleRepository::class);
        $this->app->bind(InterfaceNewsRepository::class, NewsRepository::class);
        $this->app->bind(InterfaceExamsRepository::class, ExamsRepository::class);
        $this->app->bind(InterfaceQuestionsRepository::class, QuestionsRepository::class);
        $this->app->bind(InterfaceSlideBannerRepository::class, SlideBannerRepository::class);
        $this->app->bind(InterfaceResultRepository::class, ResultRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}

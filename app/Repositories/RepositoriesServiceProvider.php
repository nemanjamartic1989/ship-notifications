<?php 

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\UserRepository;

class RepositoriesServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->bind(
            'App\Repositories\ShipRepositoryInterface',
            'App\Repositories\ShipRepository'
        );

        $this->app->bind(
            'App\Repositories\RankRepositoryInterface',
            'App\Repositories\RankRepository'
        );

        $this->app->bind(
            'App\Repositories\CrewMembersRepositoryInterface',
            'App\Repositories\CrewMembersRepository'
        );
    }
}
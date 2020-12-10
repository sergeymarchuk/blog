<?php

namespace App\Providers;

use App\Http\Controllers\API\v1\TagController;
use App\Repository\RepositoryInterface;
use App\Repository\TagRepository;
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
        $this->app->when(TagController::class)
            ->needs(RepositoryInterface::class)
            ->give(function () {
                return new TagRepository();
            });
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

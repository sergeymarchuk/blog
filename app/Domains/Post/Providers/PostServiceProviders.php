<?php


namespace App\Domains\Post\Providers;

use App\Domain\Post\PostService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

class PostServiceProviders extends ServiceProvider implements DeferrableProvider {
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PostService::class, function ($app) {
            return new PostService();
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

    /**
     * @return string[]
     */
    public function provides()
    {
        return [PostService::class];
    }
}

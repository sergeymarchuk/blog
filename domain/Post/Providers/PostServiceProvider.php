<?php

namespace Domain\Post\Providers;

use Domain\Common\Models\PostTag;
use Domain\Post\Models\Post;
use Domain\Post\PostService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

class PostServiceProvider extends ServiceProvider implements DeferrableProvider {
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PostService::class, function ($app) {
            return new PostService($app->make(Post::class), $app->make(PostTag::class));
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

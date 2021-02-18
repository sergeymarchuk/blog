<?php

namespace Domain\Tag\Providers;

use Domain\Tag\Models\{Tag, TagFilter};
use Domain\Tag\TagService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

class TagServiceProvider extends ServiceProvider implements DeferrableProvider {
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TagService::class, function ($app) {
            return new TagService($app->make(Tag::class), $app->make(TagFilter::class));
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
        return [TagService::class];
    }
}

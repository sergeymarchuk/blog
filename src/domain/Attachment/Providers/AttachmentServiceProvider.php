<?php

namespace Domain\Attachment\Providers;

use Domain\Attachment\AttachmentService;
use Domain\Attachment\Models\Attachment;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

class AttachmentServiceProvider extends ServiceProvider implements DeferrableProvider {
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AttachmentService::class, function ($app) {
            return new AttachmentService($app->make(Attachment::class));
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
        return [AttachmentService::class];
    }
}

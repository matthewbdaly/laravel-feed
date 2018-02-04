<?php

namespace Matthewbdaly\LaravelFeed\Providers;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Matthewbdaly\LaravelFeed\Services\FeedService;
use Zend\Feed\Reader\Reader;

/**
 * Service provider
 */
class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Zend\Feed\Reader\ReaderImportInterface', function ($app) {
            $reader = new Reader;
            $reader->setHttpClient(new FeedService);
            return $reader;
        });
    }
}

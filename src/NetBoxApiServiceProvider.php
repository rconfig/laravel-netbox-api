<?php

namespace Rconfig\NetBox;

use Illuminate\Support\ServiceProvider;
use Rconfig\NetBox\NetBoxApiManager;

class NetBoxApiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/netbox.php' => config_path('netbox.php')
        ], 'config');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['Rconfig\NetBox\NetBoxApiManager', 'NetBoxApiManager'];
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton('NetBoxApi', function ($app) {
            $netBox = new NetBox($app);
            $netBox->site($netBox->getDefaultSite());

            return $netBox;
        });
    }
}

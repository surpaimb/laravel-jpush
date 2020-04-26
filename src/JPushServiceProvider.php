<?php

namespace Surpaimb\JPush;

use Illuminate\Support\ServiceProvider;
use JPush\Client as JPush;

class JPushServiceProvider extends ServiceProvider
{


    /**
     * Bootstrap any application services.
     */
    public function boot()
    {

    }

    /**
     * Setup the config.
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__ . '/config.php');
        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('jpush.php')]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('jpush');
        }
        $this->mergeConfigFrom($source, 'jpush');
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        $this->setupConfig();
        $this->app->singleton('JPush', function () {
            return new JPush(config('jpush.appkey'), config('jpush.secretKey'));
        });
    }
}
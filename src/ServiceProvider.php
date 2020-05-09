<?php

declare(strict_types=1);

namespace Surpaimb\JPush;

use JPush\Client as JPushClient;
use Illuminate\Support\Facades\Notification;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
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


    public function register()
    {
        Notification::extend('jpush', function ($app) {
            return new Channel(new JPushClient(
                $app['config']['jpush.default.app_key'],
                $app['config']['jpush.default.master_secret'],
                $app['config']['jpush.default.log_file'],
                intval($app['config']['jpush.default.retry_times']) ?: 3
            ));
        });

        Notification::extend('jpushp', function ($app) {
            return new Channel(new JPushClient(
                $app['config']['jpush.patient.app_key'],
                $app['config']['jpush.patient.master_secret'],
                $app['config']['jpush.patient.log_file'],
                intval($app['config']['jpush.patient.retry_times']) ?: 3
            ));
        });

        Notification::extend('jpushd', function ($app) {
            return new Channel(new JPushClient(
                $app['config']['jpush.doctor.app_key'],
                $app['config']['jpush.doctor.master_secret'],
                $app['config']['jpush.doctor.log_file'],
                intval($app['config']['jpush.doctor.retry_times']) ?: 3
            ));
        });
       
    }
}

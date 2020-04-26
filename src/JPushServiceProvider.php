<?php

namespace Surpaimb\JPush;

use Surpaimb\JPush\JPushService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class JPushServiceProvider extends LaravelServiceProvider implements DeferrableProvider
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
        // $this->setupConfig();
        // $this->app->singleton('JPush', function () {
        //     return new JPush(config('jpush.appkey'), config('jpush.secretKey'));
        // });
        $this->app->bind(JPushService::class, function (){
        
            $jPush = new JPushService(
                $this->app,
                config('jpush.app_key'),
                config('jpush.secret_key'),
                config('jpush.apns_production'),
                config('jpush.log_file')
            );

           if ($this->app->bound('queue')) {
               $jPush->setQueue($this->app['queue']);
           }

           return $jPush;
       });

       $this->app->alias(JPushService::class, 'jpush');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [JPushService::class, 'jpush'];
    }
}
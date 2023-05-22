<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Cache\Factory;
use App\Models\Setting;
use Exception;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Factory $cache, Setting $settings)
    {
        try{
            $settings = $cache->remember('settings', 60, function() use ($settings){
                // Laravel >= 5.2, use 'lists' instead of 'pluck' for Laravel <= 5.1
                return $settings->pluck('value', 'name')->all();
            });
            config()->set('settings', $settings);
        }catch(Exception $e){

        }
    }
}

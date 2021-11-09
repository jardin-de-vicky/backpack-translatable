<?php

namespace DigitalUnityCa\Translatable;

use DigitalUnityCa\Translatable\App\Console\Commands\MakeTranslatable;
use Illuminate\Support\ServiceProvider;

class TranslatableServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadConsoleCommands();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('translatable', function(){
            return new Translatable();
        });
    }

    /**
     * Commands
     */
    public function loadConsoleCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeTranslatable::class,
            ]);
        }
    }
}

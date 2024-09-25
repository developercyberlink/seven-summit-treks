<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HeaderComposerProvider extends ServiceProvider
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
        $this->composeMenu();
    }

    public function composeMenu(){
          view()->composer('themes.default.common.header','App\Http\ViewComposers\HeaderComposer');
           view()->composer('themes.default.common.trip-header','App\Http\ViewComposers\HeaderComposer');
          view()->composer('themes.default.common.header-top','App\Http\ViewComposers\HeaderComposer');
          view()->composer('themes.default.common.header-detail','App\Http\ViewComposers\HeaderComposer');
          view()->composer('themes.default.common.sidebar-trip','App\Http\ViewComposers\HeaderComposer');
          view()->composer('themes.default.common.footer','App\Http\ViewComposers\HeaderComposer');
          view()->composer('themes.default.common.sidebar-region','App\Http\ViewComposers\HeaderComposer');
           view()->composer('themes.default.common.14peaks','App\Http\ViewComposers\HeaderComposer');
    }
}

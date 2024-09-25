<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SidebarInnerComposerProvider extends ServiceProvider
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
        $this->composeSidebarInner();
    }

    public function composeSidebarInner(){
          view()->composer('themes.default.sidebar-inner','App\Http\ViewComposers\SidebarInnerComposer');
             view()->composer('themes.default.common.sidebar-trip','App\Http\ViewComposers\SidebarInnerComposer');
           view()->composer('themes.default.common.sidebar-about','App\Http\ViewComposers\SidebarInnerComposer');
           view()->composer('themes.default.common.booking-sidebar','App\Http\ViewComposers\SidebarInnerComposer');
    }
}

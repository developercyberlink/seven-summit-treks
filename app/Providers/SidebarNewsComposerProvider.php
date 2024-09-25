<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SidebarNewsComposerProvider extends ServiceProvider
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
        $this->composeNewsLibrary();
    }

    public function composeNewsLibrary(){
          view()->composer('themes.default.sidebar-news','App\Http\ViewComposers\SidebarNewsComposer');
    }
}



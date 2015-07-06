<?php namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        //View::composer('profile', 'App\Http\Composers\ProfileComposer');
        View::composer('blog.sidebar', 'App\Http\Composers\BlogSidebarComposer');

        // Using Closure based composers...
        View::composer('dashboard', function()
        {

        });
    }
    
    public function register(){
        //
    }

}

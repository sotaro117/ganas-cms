<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if(request()->is(['admin', 'admin/*'])){
            Inertia::setRootView('admin.app');
        } else {
            Inertia::setRootView('client.app');
        }
        Inertia::share('TinyMce', config('TINYMCE_KEY')); 
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('admin', function(User $user){
            return $user->name === 'John Doe';
        });
        Blade::if('admin', function(){
            return request()->user()?->can('admin');
        });
        Gate::define('supporter', function(User $user){
            return $user->subscribed('default');
        });
    }
}

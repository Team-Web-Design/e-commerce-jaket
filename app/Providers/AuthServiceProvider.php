<?php

namespace App\Providers;

use App\Cart;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        view()->composer('layouts.app', function ($view) {
            //...with this variable
            // $view->with('cart', $cart);
            if (Auth::check()) {
                $view->with('currentUser', Auth::user());
                $cart = Cart::where('id_user', Auth::user()->id)->get();
                $view->with('cart', $cart);
            } else {
                $view->with('currentUser', null);
            }
        });

        View::share('key', 'value');
    }
}

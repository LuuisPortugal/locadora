<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        View::composer('layouts.view', function ($view) {
            $linksMenu = [];
            $routeCollection = Route::getRoutes();
            foreach ($routeCollection as $value)
                if (strpos($value->getName(), "index") !== false)
                    $linksMenu[$value->getName()] = ucfirst($value->getUri());
            $view->with("linksMenu", $linksMenu);
        });
    }
}

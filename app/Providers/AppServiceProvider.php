<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Way\Generators\GeneratorsServiceProvider::class);
            $this->app->register(\Xethron\MigrationsGenerator\MigrationsGeneratorServiceProvider::class);
            $this->app->register(\Remoblaser\Resourceful\ResourcefulServiceProvider::class);
            $this->app->register(\Laracasts\Generators\GeneratorsServiceProvider::class);
        }

        //Registro todos os Repositorios que estão dentro de App\Repository
        array_map(function ($value) {
            if (preg_match("/(\\w+)(Eloquent).php/", $value, $newValue)) {
                $this->app->bind(
                    "App\\Repositories\\{$newValue[1]}",
                    "App\\Repositories\\{$newValue[1]}Eloquent"
                );
            }
        }, scandir(app_path('Repositories')));
    }
}

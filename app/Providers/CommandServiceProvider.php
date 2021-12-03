<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
class CommandServiceProvider extends ServiceProvider
{
    public function boot()
    {
       
    }
    public function register()
    {
        $this->app->bind('command', 'App\Services\CommandService');
    }
}
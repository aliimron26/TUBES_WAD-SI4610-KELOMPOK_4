<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Admin;

class AdminServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('admin', function ($app) {
            return new Admin();
        });
    }

    public function boot(): void
    {
        //
    }
}

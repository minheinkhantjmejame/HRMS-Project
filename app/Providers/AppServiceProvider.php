<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use PDO;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Force HTTPS in production
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        // PostgreSQL SSL configuration
        if (env('DB_CONNECTION') === 'pgsql') {
            DB::connection('pgsql')->setPdo(function () {
                $pdo = DB::connection('pgsql')->getPdo();
                $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
                return $pdo;
            });
        }
    }
}
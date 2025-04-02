<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use PDO; // Add this if your IDE complains about PDO

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
        // Add this block for PostgreSQL SSL
        if (env('DB_CONNECTION') === 'pgsql') {
            DB::connection('pgsql')->setPdo(
                fn ($pdo) => $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true)
            );
        }
    }
}
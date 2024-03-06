<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use Log;

class SqlLogProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        DB::listen(function ($query) {
            Log::info(
                '[SQL]' . $query->sql,
                $query->bindings,
                $query->time
            );
        });
    }
}

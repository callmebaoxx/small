<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Database\Migration\CustomBlueprint;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->app->bind('db.custom.schema', function ($app) {
            $schema = $app['db']->connection()->getSchemaBuilder();
            $schema->blueprintResolver(function ($table, $callback) {
                return new CustomBlueprint($table, $callback);
            });
            return $schema;
        });
    }
}

<?php

namespace Devfaysal\SelectOption;

use Devfaysal\SelectOption\Commands\SelectOptionCommand;
use Illuminate\Support\ServiceProvider;

class SelectOptionServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/laravel-select-option.php' => config_path('laravel-select-option.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../resources/views' => base_path('resources/views/vendor/laravel-select-option'),
            ], 'views');

            $migrationFileName = 'create_laravel_select_option_table.php';
            if (! $this->migrationFileExists($migrationFileName)) {
                $this->publishes([
                    __DIR__ . "/../database/migrations/{$migrationFileName}.stub" => database_path('migrations/' . date('Y_m_d_His', time()) . '_' . $migrationFileName),
                ], 'migrations');
            }

            $this->commands([
                SelectOptionCommand::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laravel-select-option');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/laravel-select-option.php', 'laravel-select-option');
    }

    public static function migrationFileExists(string $migrationFileName): bool
    {
        $len = strlen($migrationFileName);
        foreach (glob(database_path("migrations/*.php")) as $filename) {
            if ((substr($filename, -$len) === $migrationFileName)) {
                return true;
            }
        }

        return false;
    }
}

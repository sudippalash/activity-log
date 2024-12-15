<?php

namespace Sudip\ActivityLog\Providers;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/activity-log.php', 'activity-log'
        );
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'activity-log');

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'activity-log');

        //Spatie activitylog config & migration published
        $ds = new \ReflectionClass(\Spatie\Activitylog\ActivitylogServiceProvider::class);
        $path = str_replace(DIRECTORY_SEPARATOR.$ds->getShortName().'.php', '', $ds->getFileName());

        $this->publishes([
            //Spatie activitylog config & migration published
            $path.'/../config/activitylog.php' => config_path('activitylog.php'),
            $path.'/../database/migrations/create_activity_log_table.php.stub' => $this->getMigrationFileName('create_activity_log_table.php', time()),
            $path.'/../database/migrations/add_event_column_to_activity_log_table.php.stub' => $this->getMigrationFileName('add_event_column_to_activity_log_table.php', time() + 1),
            $path.'/../database/migrations/add_batch_uuid_column_to_activity_log_table.php.stub' => $this->getMigrationFileName('add_batch_uuid_column_to_activity_log_table.php', time() + 2),
            
            __DIR__.'/../../database/migrations/add_ip_column_to_activity_log_table.php.stub' => $this->getMigrationFileName('add_ip_column_to_activity_log_table.php', time() + 3),

            __DIR__.'/../../config/activity-log.php' => config_path('activity-log.php'),
        ], 'required');

        $this->publishes([
            __DIR__.'/../lang' => lang_path('vendor/activity-log'),
        ], 'lang');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/activity-log'),
        ], 'views');
    }

    protected function getMigrationFileName($migrationFileName, $time): string
    {
        $timestamp = date('Y_m_d_His', $time);

        $filesystem = $this->app->make(Filesystem::class);

        return Collection::make($this->app->databasePath().DIRECTORY_SEPARATOR.'migrations'.DIRECTORY_SEPARATOR)
            ->flatMap(function ($path) use ($filesystem, $migrationFileName) {
                return $filesystem->glob($path.'*_'.$migrationFileName);
            })
            ->push($this->app->databasePath()."/migrations/{$timestamp}_{$migrationFileName}")
            ->first();
    }
}

<?php


namespace Mutisya\DatabaseBackup;


use Illuminate\Support\ServiceProvider;
use Mutisya\DatabaseBackup\Console\DatabaseBackupCommand;

class BackupServiceProvider extends ServiceProvider
{

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                    DatabaseBackupCommand::class,
            ]);
        }
    }

    public function register()
    {
        $this->app->bind('backup', function () {
            return new DatabaseBackupCommand();
        });
    }
}

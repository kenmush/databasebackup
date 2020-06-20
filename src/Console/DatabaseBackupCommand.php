<?php


namespace Mutisya\DatabaseBackup\Console;


use Illuminate\Console\Command;
use Mutisya\DatabaseBackup\Facades\Backup;

class DatabaseBackupCommand extends Command
{
    protected $signature = 'mutisya:backup';

    protected $description = 'Backups database to my private email';

    public function handle()
    {
     $this->info((new \Mutisya\DatabaseBackup\DatabaseBackup())->backup());
    }
}

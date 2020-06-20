<?php


namespace Mutisya\DatabaseBackup\Console;


use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Mutisya\DatabaseBackup\Facades\Backup;

class DatabaseBackupCommand extends Command
{
    protected $signature = 'mutisya:backup';

    protected $description = 'Backups database to my private email';

    public function handle()
    {
        $filename = "backup-" . Carbon::now()->format('Y-m-d') . ".gz";
        $command = "mysqldump --user=" . env('DB_USERNAME') ." --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . "  | gzip > " . storage_path() . "/app/backup/" . $filename;
        $returnVar = NULL;
        $output  = NULL;
        exec($command, $output, $returnVar);
    }
}

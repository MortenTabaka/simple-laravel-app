<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MigrateEnvDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:migrate-env-database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $result = exec('php artisan migrate:fresh --seed', $output);
        $this->info(implode("\n", $output));
    }
}

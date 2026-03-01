<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RunFreshMigrationWithSeeder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:run-migration';

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
        $result = exec('docker exec -it laravel_app php artisan migrate:fresh --seed', $output);
        $this->info('Clean migration and seeding completed ' . implode("\n", $output));
    }
}

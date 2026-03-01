<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MigrateTestDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:migrate-test-database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $result = exec('docker exec -it laravel_app php artisan migrate:fresh --seed --env=testing', $output);
        $this->info(implode("\n", $output));
    }
}

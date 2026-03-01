<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SwaggerApiGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:api-generate';

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
        // generate swagger api documentation inside container named laravel_app
        $result = exec('docker exec -it laravel_app php artisan l5-swagger:generate');
        $this->info('Api documentation generated ' . $result);
    }
}

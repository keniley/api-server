<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Artisan;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install this app';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Artisan::call('key:generate');
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed');
    }
}

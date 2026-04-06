<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallProjectCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install:project';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install project';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call("optimize:clear");
        $this->call("migrate:fresh");
        $this->call("db:seed");
        $this->call("cache:clear");
        $this->call("route:clear");
        $this->call("view:clear");
    }
}

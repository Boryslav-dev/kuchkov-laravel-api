<?php

namespace App\Console\Commands;

use App\Sensor;
use Illuminate\Console\Command;

class RemoveAllDataFromDb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'drop-sensors-table:drop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        Sensor::query()->truncate();

        return 0;
    }
}

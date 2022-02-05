<?php

namespace App\Console\Commands;

use App\Http\Controllers\Jobs\SensorJobs;
use Illuminate\Console\Command;

class SetSensorsValues extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'set-sensors-values:set';

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
    public function handle(SensorJobs $sensorJobs)
    {
        $sensorJobs->setTemperatureSensor();
        $sensorJobs->setHumiditySensor();
        $sensorJobs->setFlameRateSensor();
        $sensorJobs->setSmokeRateSensor();

        return 0;
    }
}

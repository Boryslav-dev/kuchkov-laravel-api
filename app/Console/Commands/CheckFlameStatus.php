<?php

namespace App\Console\Commands;

use App\Http\Controllers\Gpio\ApiGpio;
use Illuminate\Console\Command;

class CheckFlameStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check-flame-status:read';

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
    public function handle(ApiGpio $apiGpio)
    {
        if($apiGpio->getFlameRateGpio() < 10 && $apiGpio->getSmokeRateGpio() < 5) {
            return true;
        } else {
            $this->sendMessageToEmail();
        }

        return true;
    }

    protected function sendMessageToEmail()
    {
        //TODO-send-email
    }
}

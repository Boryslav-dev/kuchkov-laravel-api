<?php

namespace App\Http\Controllers\Gpio;

use PiPHP\GPIO\GPIO;
use PiPHP\GPIO\Pin\PinInterface;

class ApiGpio
{
    protected $gpio;

    public function __construct()
    {
        $this->gpio = new GPIO();
    }

    public function getTemperatureAndHumidityGpio(): array
    {
        exec('sensorsDrivers/examples/AdafruitDHT.py 11 13', $dht);
        dd($dht);
        return ['temperature' => 34, 'humidity' => 70];
    }

    public function getSmokeRateGpio()
    {
        return 45;
    }

    public function getFlameRateGpio()
    {
        return 10;
    }

    public function setLedStatus()
    {
        //TODO-setLedStatus
    }
}

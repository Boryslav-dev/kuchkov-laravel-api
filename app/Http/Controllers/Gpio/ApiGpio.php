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

        return explode(" ", $dht[0]);
    }

    public function getSmokeRateGpio()
    {
        $pin = $this->gpio->getInputPin(19);

        return (int)$pin;
    }

    public function getFlameRateGpio(): int
    {
        $pin = $this->gpio->getInputPin(26);

        return (int)$pin;
    }

    public function setLedStatus()
    {
        //TODO-setLedStatus
    }
}

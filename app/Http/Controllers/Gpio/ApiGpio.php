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

    public function getTemperatureAndHumidityGpioApi(): array
    {
        exec('../sensorsDrivers/examples/AdafruitDHT.py 11 13', $dht);

        return explode(" ", $dht[0]);
    }

    public function getSmokeRateGpio(): int
    {
        return $this->gpio->getInputPin(19)->getValue();
    }

    public function getFlameRateGpio(): int
    {
        return $this->gpio->getInputPin(26)->getValue();
    }

    public function getLedStatus(): int
    {
        $pin = $this->gpio->getOutputPin(18);

        return $pin->getValue();
    }

    public function setLedStatus(): int
    {
        $pin = $this->gpio->getOutputPin(18);

        if ($pin->getValue()) {
           $pin->setValue(0);

           return 0;
        } else if (!$pin->getValue()) {
            $pin->setValue(1);

            return 1;
        }
    }
}

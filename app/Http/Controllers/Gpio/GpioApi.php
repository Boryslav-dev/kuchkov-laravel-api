<?php

namespace App\Http\Controllers\Gpio;

use PiPHP\GPIO\GPIO;
use PiPHP\GPIO\Pin\InputPinInterface;

class GpioApi
{

    public function __construct()
    {
        $gpio = new GPIO();
    }

    public function getDH11SensorsValue()
    {
        //TODO-DH11_SENSORS_SETUP
    }

    public function getMQ2SensorsValue()
    {
        //TODO-MQ2_SENSORS_SETUP
    }

    public function getFlameRateValue()
    {
        //TODO-FlameRate_SENSORS_SETUP
    }
}

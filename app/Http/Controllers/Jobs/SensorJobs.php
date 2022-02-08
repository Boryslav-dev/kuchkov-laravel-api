<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Gpio\ApiGpio;
use App\Sensor;

class SensorJobs
{

    protected $apiGpio;

    public function __construct()
    {
        $this->apiGpio = new ApiGpio();
    }

    public function setTemperatureSensor()
    {
        $sensor = new Sensor();

        $sensor->type = 'temperature';
        $sensor->value = $this->apiGpio->getTemperatureAndHumidityGpio()['temperature'];
        $sensor->save();
    }

    public function setHumiditySensor()
    {
        $sensor = new Sensor();

        $sensor->type = 'humidity';
        $sensor->value = $this->apiGpio->getTemperatureAndHumidityGpio()['humidity'];
        $sensor->save();
    }

    public function setSmokeRateSensor()
    {
        $sensor = new Sensor();

        $sensor->type = 'smoke';
        $sensor->value = $this->apiGpio->getSmokeRateGpio();
        $sensor->save();
    }

    public function setFlameRateSensor()
    {
        $sensor = new Sensor();

        $sensor->type = 'flame';
        $sensor->value = $this->apiGpio->getFlameRateGpio();
        $sensor->save();
    }
}

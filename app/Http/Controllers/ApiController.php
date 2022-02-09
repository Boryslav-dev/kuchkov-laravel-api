<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Gpio\ApiGpio;
use App\Http\Controllers\Integrations\OpenWeatherApiController;
use App\Sensor;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use http\Env;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PiPHP\GPIO\GPIO;
use Psy\Util\Json;
use Symfony\Component\HttpFoundation\JsonResponse;
use function GuzzleHttp\Promise\all;

class ApiController extends Controller
{
    private $openWeatherApi;

    private $systemController;

    private $apiGpio;

    public function __construct()
    {
        $this->openWeatherApi = new OpenWeatherApiController();
        $this->systemController = new SystemController();
        $this->apiGpio = new ApiGpio();
    }

    /**
     * @throws \Exception
     * @throws GuzzleException
     */
    public function getWeatherParams(): \Psr\Http\Message\StreamInterface
    {
        return $this->openWeatherApi->getWeatherParamsApi();
    }

    public function getLedStatus(): string
    {
        return (string)$this->apiGpio->getLedStatus();
    }

    public function setLedStatus(): string
    {
        return (string)$this->apiGpio->setLedStatus();
    }

    public function getSmokeDangerStatusApi(): string
    {
        return (string)$this->apiGpio->getSmokeRateGpio();
    }

    public function getFlameDangerStatusApi(): string
    {
        return (string)$this->apiGpio->getFlameRateGpio();
    }

    public function getTemperatureApi(): string
    {
        dd($this->apiGpio->getTemperatureAndHumidityGpio()[0]);
        return $this->apiGpio->getTemperatureAndHumidityGpio()[0];
    }

    public function getHumidityApi(): string
    {
        return $this->apiGpio->getTemperatureAndHumidityGpio()[1];
    }

    public function getServerCpu()
    {
        return $this->systemController->getServerCpuUsage();
    }

    public function getServerMem(): string
    {
        return $this->systemController->getServerMemoryUsage();
    }

    public function getServerRam()
    {
        return json_encode($this->systemController->getServerRamUsage());
    }

    public function getSensorsValueForDay(string $type): string
    {
        $date = date('Y-m-d H:i:s', strtotime('-1 day', strtotime(date('Y-m-d H:i:s'))));
        //TODO-SET_DATE_VALIDATOR
        $sensor = DB::table('sensors')->where('type', $type)->get();
        return $sensor->toJson();
    }
}

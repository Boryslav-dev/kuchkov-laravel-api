<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Integrations\OpenWeatherApiController;
use App\Sensor;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use http\Env;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class ApiController extends Controller
{
    private $openWeatherApi;

    public function __construct()
    {
        $this->openWeatherApi = new OpenWeatherApiController();
    }

    /**
     * @throws \Exception
     * @throws GuzzleException
     */
    public function getWeatherParams(): \Psr\Http\Message\StreamInterface
    {
        return $this->openWeatherApi->getWeatherParamsApi();
    }


    public function getSensorsValueForDay(string $type): string
    {
        $date = date('Y-m-d H:i:s', strtotime('-1 day', strtotime(date('Y-m-d H:i:s'))));
        //TODO-SET_DATE_VALIDATOR
        $sensor = DB::table('sensors')->where('type', $type)->get();
        return $sensor->toJson();
    }
}

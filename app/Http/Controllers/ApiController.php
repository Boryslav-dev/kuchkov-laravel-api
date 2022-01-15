<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Integrations\OpenWeatherApiController;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use http\Env;
use Illuminate\Http\Request;

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
}

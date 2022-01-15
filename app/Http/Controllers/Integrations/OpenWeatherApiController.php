<?php

namespace App\Http\Controllers\Integrations;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class OpenWeatherApiController
{
    private const CITY_NAME = 'Kharkiv';
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function getWeatherParamsApi(): \Psr\Http\Message\StreamInterface
    {
        $weatherParams = $this->client->request(
            'GET',
            env('API_WEATHER_URL')
            . '?q=' . self::CITY_NAME
            . '&appid=' . env('API_KEY')
        );
        if ($weatherParams->getStatusCode() !== 200) {
            throw new Exception();
        }
        return $weatherParams->getBody();
    }
}

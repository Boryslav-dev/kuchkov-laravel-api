<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getWeatherParams', 'ApiController@getWeatherParams');
Route::get('/getTemperatureApi', 'ApiController@getTemperatureApi');
Route::get('/getLedStatus', 'ApiController@getLedStatus');
Route::get('/setLedStatus', 'ApiController@setLedStatus');
Route::get('/getHumidityApi', 'ApiController@getHumidityApi');
Route::get('/getSmokeDangerStatusApi', 'ApiController@getSmokeDangerStatusApi');
Route::get('/getFlameDangerStatusApi', 'ApiController@getFlameDangerStatusApi');
Route::get('/getServerCpu', 'ApiController@getServerCpu');
Route::get('/getServerMem', 'ApiController@getServerMem');
Route::get('/getServerRam', 'ApiController@getServerRam');
Route::get('/getSensorsValueForDay/{type}', 'ApiController@getSensorsValueForDay');

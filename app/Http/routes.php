<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('wilaya/{wilaya}', 'WilayaController@show');
Route::get('commune/{commune}', 'CommuneController@show');

Route::get('/test', function()
	{
		return view('welcome');
	});

$api = app('Dingo\Api\Routing\Router');
 
$api->version('v1', function ($api) {
    $api->get('/all', function() {
        return ['test' => 'hakim'];
    });
});
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
    $wilaya = \App\Models\Wilaya::getAll();
    return view('welcome', ['wilaya' => $wilaya] );
});

// Route::get('/api/all', '\App\Http\Controllers\AllController@show');
// Route::get('/api/wilaya/{wilaya}', '\App\Http\Controllers\WilayaController@show');
// Route::get('/api/commune/{commune}', '\App\Http\Controllers\AllController@search');

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
            $api->get('/all', '\App\Http\Controllers\AllController@show');
            $api->get('/wilaya/{wilaya}', '\App\Http\Controllers\WilayaController@show' );
            $api->get('/commune/{commune}', '\App\Http\Controllers\CommuneController@show');

            $api->get('/search/{commune}', '\App\Http\Controllers\AllController@search');
        });    
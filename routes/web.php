<?php
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//Without cache: Time 2117ms
Route::get('/test', function () {
    return $json = json_decode(file_get_contents('https://jsonplaceholder.typicode.com/photos'), true);
});

//With cache: Time 632ms
Route::get('/test_memcache', function () {
    if (Cache::has('photos')) {
        return Cache::get('photos');
    }
    $minutes = 10;
    $json = json_decode(file_get_contents('https://jsonplaceholder.typicode.com/photos'), true);
    Cache::put('photos', $json, $minutes);
    return $json;
});

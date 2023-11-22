<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('/camera', 'camera')->name('camera');

Route::post('/stop-video', function () {
    
    $fastApiUrl = 'http://localhost:8001/stop_video_feed';

    // Send the POST request using Laravel HTTP client
    $response = Http::post($fastApiUrl);

    // Handle the response
    return $response->json(); // or return other data as needed
});
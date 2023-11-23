<?php

use App\Http\Controllers\CameraController;
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

Route::get('/', function () { return view('welcome');});

Route::get('/camera', [CameraController::class, 'index'])->name('camera');

Route::post('/stop-video', function () {
    
    $fastApiUrl = fastapi_url('stop_video_feed');
    $response = Http::post($fastApiUrl);
    return $response->json(); // or return other data as needed
});
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

Route::view('/', 'splash')->name('splash');
Route::view('/home', 'home')->name('home');
Route::view('/categories', 'categories')->name('categories');
Route::view('/camera', 'camera')->name('camera');
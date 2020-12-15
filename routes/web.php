<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

// Frontend
Route::get('/', 'LandingController@index')->name('welcome');

// Auth
Auth::routes();

// Admin
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

// Archivos
Route::resource('files', 'FileController');

<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Mifiel\ApiClient as Mifiel;


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

// Mifiel
Mifiel::setTokens('47da3e9067c87df705c65118ee1fd6b3eaf4591b', 'VVtR9pDVM79qlgdjLyKECrYwP65cmCat50XxymF8IeDHYl0t699IGkzXldy5dohKC9EhYTUBN56wOoDXqWtyDw==');
Mifiel::url('https://sandbox.mifiel.com/api/v1/');

// Frontend
Route::get('/', 'LandingController@index')->name('welcome');

// Auth
Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    // Admin
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    // Archivos
    Route::resource('files', 'FileController');

    // Contratos
    Route::resource('contracts', 'ContractController');
    Route::get('contract/{id}', 'ContractController@recibe')->name('contracts.recibe');
    Route::get('contract/{id}', 'ContractController@presign')->name('contracts.presign');

    Route::post('contracts/store', 'ContractController@store')->name("contracts.store");
    Route::post('contracts/sign', 'ContractController@sign')->name("contracts.sign");
    Route::post('contracts', 'ContractController@confirm')->name('contracts.confirm');

    // Firmas
    Route::post('signature', 'SignatureController@generatePDF')->name('signature.generate');


    // Langing Admin
    Route::resource('sliders', 'SliderController');
    Route::resource('about', 'AboutController');
});


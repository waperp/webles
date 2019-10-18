<?php

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

// Route::get('/', function () {
//     return view('home');
// });


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('datatables/quienes_somos', 'datatablesController@datatablesQuienesSomos')->name('home');
Route::resource('secusr', 'secusrController');
Route::resource('confrs', 'confrsController');

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
Route::get('noticia', 'HomeController@demo')->name('demo');
Route::get('redes-sociales/{slug}/{secconnuid}', 'HomeController@demo');
Route::get('ultimas-noticias/{slug}/{secconnuid}', 'HomeController@demo');
Route::get('galeria/{slug}/{secconnuid}', 'HomeController@demo');
Route::get('quienes-somos/{slug}/{secconnuid}', 'HomeController@demo');
Route::get('datatables/quienes_somos', 'datatablesController@datatablesQuienesSomos');
Route::get('datatables/redes_sociales', 'datatablesController@datatablesQuienesSomos');
Route::get('datatables/usuarios', 'datatablesController@datatablesUsuarios');

Route::resource('secusr', 'secusrController');
Route::resource('confrs', 'confrsController');
Route::get('selectSubform', 'HomeController@selectSubform');


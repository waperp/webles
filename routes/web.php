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
Route::get('datatables/gestionarMenu', 'datatablesController@datatablesGestionarMenu');
Route::patch('update_user', 'secusrController@update_user');

Route::resource('secusr', 'secusrController');
Route::resource('confrs', 'confrsController');
Route::get('selectSubform', 'HomeController@selectSubform');
Route::get('selectUserSubform', 'HomeController@selectUserSubform');
Route::get('selectGestionarMenuSubform', 'HomeController@selectGestionarMenuSubform');


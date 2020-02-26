<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('noticia', 'HomeController@demo')->name('demo');
Route::get('redes-sociales/{slug}/{secconnuid}', 'HomeController@demo');
Route::get('ultimas-noticias/{slug}/{secconnuid}', 'HomeController@demo');
Route::get('galeria/{slug}/{secconnuid}', 'HomeController@demo');
Route::get('servicio/{slug}/{secconnuid}', 'HomeController@demo');
Route::get('quienes-somos/{slug}/{secconnuid}', 'HomeController@demo');
Route::get('datatables/quienes_somos', 'datatablesController@datatablesQuienesSomos');
Route::get('datatables/redes_sociales', 'datatablesController@datatablesQuienesSomos');
Route::get('datatables/servicios', 'datatablesController@datatablesServicios');
Route::get('datatables/usuarios', 'datatablesController@datatablesUsuarios');
Route::get('datatables/gestionarMenu', 'datatablesController@datatablesGestionarMenu');
Route::patch('update_user', 'secusrController@update_user');

Route::resource('secusr', 'secusrController');
Route::resource('confrs', 'confrsController');
Route::resource('confrm', 'confrmController');
Route::get('selectSubform', 'HomeController@selectSubform');
Route::get('selectUserSubform', 'HomeController@selectUserSubform');
Route::get('selectGestionarMenuSubform', 'HomeController@selectGestionarMenuSubform');
Route::get('selectGestionarMenuSubformServicios', 'HomeController@selectGestionarMenuSubformServicios');
Route::get('selectGestionarMenuSubMenu', 'HomeController@selectGestionarMenuSubMenu');
Route::get('selectServiciosSubMenu', 'HomeController@selectServiciosSubMenu');
Route::get('selectServicios', 'HomeController@selectServicios');
Route::get('listaServicios', 'HomeController@listaServicio');
Route::post('storeServicios', 'confrsController@storeServicios');
Route::post('updateServicios', 'confrsController@updateServicios');
Route::get('icons', 'conicoController@icons');


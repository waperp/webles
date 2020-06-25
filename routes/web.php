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

Route::get('datatables/quienes_somos', 'datatablesController@datatablesQuienesSomos')->middleware('auth');
Route::get('datatables/contactos', 'datatablesController@datatablesQuienesSomos')->middleware('auth');
Route::get('datatables/redes_sociales', 'datatablesController@datatablesQuienesSomos')->middleware('auth');
Route::get('datatables/servicios', 'datatablesController@datatablesServicios')->middleware('auth');
Route::get('datatables/usuarios', 'datatablesController@datatablesUsuarios')->middleware('auth');
Route::get('datatables/gestionarMenu', 'datatablesController@datatablesGestionarMenu')->middleware('auth');
Route::patch('update_user', 'secusrController@update_user')->middleware('auth');

Route::resource('secusr', 'secusrController')->middleware('auth');
Route::resource('confrs', 'confrsController')->middleware('auth');
Route::resource('confrm', 'confrmController')->middleware('auth');
Route::get('selectSubform', 'HomeController@selectSubform');
Route::get('selectUserSubform', 'HomeController@selectUserSubform');
Route::get('selectGestionarMenuSubform', 'HomeController@selectGestionarMenuSubform');
Route::get('selectGestionarMenuSubformServicios', 'HomeController@selectGestionarMenuSubformServicios');
Route::get('selectGestionarMenuSubMenu', 'HomeController@selectGestionarMenuSubMenu');
Route::get('selectServiciosSubMenu', 'HomeController@selectServiciosSubMenu');
Route::get('selectServicios', 'HomeController@selectServicios');
Route::get('listaServicios', 'HomeController@listaServicio');
Route::post('storeServicios', 'confrsController@storeServicios')->middleware('auth');
Route::post('updateServicios', 'confrsController@updateServicios')->middleware('auth');
Route::get('showServicios/{servicio}', 'confrsController@showServicios');
Route::get('icons', 'conicoController@icons');
Route::get('listaSucursales', 'HomeController@listaSucursales');


<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('noticia', 'HomeController@demo')->name('demo')->middleware('auth');
Route::get('redes-sociales/{slug}/{secconnuid}', 'HomeController@demo')->middleware('auth');
Route::get('ultimas-noticias/{slug}/{secconnuid}', 'HomeController@demo')->middleware('auth');
Route::get('galeria/{slug}/{secconnuid}', 'HomeController@demo')->middleware('auth');
Route::get('servicio/{slug}/{secconnuid}', 'HomeController@demo')->middleware('auth');
Route::get('quienes-somos/{slug}/{secconnuid}', 'HomeController@demo')->middleware('auth');
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
Route::get('selectSubform', 'HomeController@selectSubform')->middleware('auth');
Route::get('selectUserSubform', 'HomeController@selectUserSubform')->middleware('auth');
Route::get('selectGestionarMenuSubform', 'HomeController@selectGestionarMenuSubform')->middleware('auth');
Route::get('selectGestionarMenuSubformServicios', 'HomeController@selectGestionarMenuSubformServicios')->middleware('auth');
Route::get('selectGestionarMenuSubMenu', 'HomeController@selectGestionarMenuSubMenu')->middleware('auth');
Route::get('selectServiciosSubMenu', 'HomeController@selectServiciosSubMenu')->middleware('auth');
Route::get('selectServicios', 'HomeController@selectServicios')->middleware('auth');
Route::get('listaServicios', 'HomeController@listaServicio')->middleware('auth');
Route::post('storeServicios', 'confrsController@storeServicios')->middleware('auth');
Route::post('updateServicios', 'confrsController@updateServicios')->middleware('auth');
Route::get('showServicios/{servicio}', 'confrsController@showServicios')->middleware('auth');
Route::get('icons', 'conicoController@icons')->middleware('auth');
Route::get('listaSucursales', 'HomeController@listaSucursales')->middleware('auth');


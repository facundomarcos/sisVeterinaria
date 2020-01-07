<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('auth/login');
});


Route::resource('configuracion/especie','EspecieController');
Route::resource('configuracion/raza','RazaController');
Route::resource('consultorio/paciente','PacienteController');
Route::resource('seguridad/usuario','UsuarioController');
Route::resource('consultorio/atencionveterinaria','AtencionVeterinariaController');
Route::resource('consultorio/cliente','ClienteController');
Route::resource('consultorio/turno','TurnoController');

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/{slug?}', 'HomeController@index');
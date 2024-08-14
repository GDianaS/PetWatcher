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

Route::get('/', 'UserController@usuarioAtual');
Route::get('/dashboard', 'UserController@show');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

Route::get('password_reset', 'Auth\ResetPasswordController@showResetForm');
Route::post('password_reset', 'Auth\ResetPasswordController@resetPassword');

Route::get('logout', 'Auth\LoginController@logout');

Route::get('register', 'Auth\RegisterController@showRegistrationForm');

Route::get('especie', 'EspecieController@index');
Route::get('/especie/create', 'EspecieController@create');
Route::post('/especie/store', 'EspecieController@store');
Route::get('/especie/show/{id}', 'EspecieController@show');
Route::get('/especie/edit/{id}', 'EspecieController@edit');
Route::put('/especie/edit{id}', 'EspecieController@update');
Route::delete('/especie/{id}', 'EspecieController@destroy');

Route::get('credenciada', 'CredenciadaController@index');
Route::get('/credenciada/create', 'CredenciadaController@create');
Route::post('/credenciada/store', 'CredenciadaController@store');
Route::get('/credenciada/show/{id}', 'CredenciadaController@show');
Route::put('/credenciada/toggle_sitaucao/{id}', 'CredenciadaController@toggle_sitaucao');
Route::put('/credenciada/reset_credenciada_password/{id}', 'CredenciadaController@reset_credenciada_password');
Route::get('/credenciada/edit/{id}', 'CredenciadaController@edit');
Route::put('/credenciada/edit{id}', 'CredenciadaController@update');
Route::delete('/credenciada/{id}', 'CredenciadaController@destroy');

Route::get('license', 'LicenseController@index');
Route::get('/license/create', 'LicenseController@create');
Route::post('/license/store', 'LicenseController@store');
Route::get('/license/show/{id}', 'LicenseController@show');
Route::get('/license/edit/{id}', 'LicenseController@edit');
Route::put('/license/edit{id}', 'LicenseController@update');
Route::delete('/license/{id}', 'LicenseController@destroy');
Route::post('/license/credenciada_licenses', 'LicenseController@get_credenciada_licenses');
Route::put('/license/toggle_isRevogada/{id}', 'LicenseController@toggle_isRevogada');

Route::get('/proprietario', 'ProprietarioController@index')->name('proprietario');
Route::get('/proprietario/create', 'ProprietarioController@create');
Route::post('/proprietario/store', 'ProprietarioController@store');
Route::get('/proprietario/show/{id}', 'ProprietarioController@show');
Route::get('/proprietario/edit/{id}', 'ProprietarioController@edit');
Route::put('/proprietario/edit/{id}', 'ProprietarioController@update')->name('proprietario_update');
Route::delete('/proprietario/{id}', 'ProprietarioController@destroy')->name('proprietario_delete');

Route::get('/animal', 'AnimalController@index')->name('animal');
Route::get('/animal/create', 'AnimalController@create');
Route::post('/animal/store', 'AnimalController@store');
Route::get('/animal/show/{id}', 'AnimalController@show');
Route::get('/animal/edit/{id}', 'AnimalController@edit');
Route::put('/animal/edit/{id}', 'AnimalController@update')->name('animal_update');
Route::get('/animal/inativar/{id}', 'AnimalController@inativar_form')->name('animal_inativar');
Route::put('/animal/inativar/{id}', 'AnimalController@inativar')->name('animal_inativar');
Route::delete('/animal/{id}', 'AnimalController@destroy')->name('animal_delete');
Route::put('/animal/toggle_sitaucao/{id}', 'AnimalController@toggle_situacao');

Route::get('/consulta_animal', 'AnimalController@index_geral');
Route::post('/consulta_animal', 'AnimalController@show_animal_geral');
Route::get('/consulta_animal/show/{id}', 'AnimalController@show_geral');

Route::get('funcionario', 'FuncionarioController@index');
Route::get('/funcionario/create', 'FuncionarioController@create');
Route::post('/funcionario/store', 'FuncionarioController@store');
Route::get('/funcionario/show/{id}', 'FuncionarioController@show');
Route::put('/funcionario/toggle_sitaucao/{id}', 'FuncionarioController@toggle_situacao');
Route::put('/funcionario/reset_credenciada_password/{id}', 'FuncionarioController@reset_funcionario_password');
Route::get('/funcionario/edit/{id}', 'FuncionarioController@edit');
Route::put('/funcionario/edit{id}', 'FuncionarioController@update');
Route::delete('/funcionario/{id}', 'FuncionarioController@destroy');

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

Route::get('/', 'PesquisaController@index');


Auth::routes();

Route::get('/pesquisa/formulario', 'PesquisaController@formulario')->middleware('auth');
Route::post('/save/formulario', 'PesquisaController@save')->middleware('auth');
Route::get('/home', 'PesquisaController@formulario')->middleware('auth');
Route::post('/bairro', 'PesquisaController@getBairros')->middleware('auth');

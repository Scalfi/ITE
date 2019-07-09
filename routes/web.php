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
//Route::get('/pesquisa/firststep', 'PesquisaController@stepone')->middleware('auth');
//Route::get('/pesquisa/secondstep', 'PesquisaController@secondstep')->middleware('auth');

Route::post('/save/formulario', 'PesquisaController@save')->middleware('auth');
//Route::post('/save/stepone', 'PesquisaController@steponesave')->middleware('auth');
//Route::post('/save/stepsecond', 'PesquisaController@secondstepsave')->middleware('auth');

Route::post('/bairro', 'BairroController@getBairros')->middleware('auth');


Route::get('/home', 'PesquisaController@formulario')->middleware('auth');

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

Route::get('/', function () {
    return view('auth/login');
});


Auth::routes();

Route::get('/pesquisa', 'PesquisaController@index')->middleware('auth');
Route::post('/save/stepone', 'PesquisaController@stepone')->middleware('auth');

Route::post('/bairro', 'BairroController@getBairros')->middleware('auth');


Route::get('/home', 'HomeController@index')->name('home');

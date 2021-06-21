<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/Funcionarios', 'FuncionarioController@index')->name('Funcionarios.index');
Route::get('/Funcionarios/new', 'FuncionarioController@new') ->name('Funcionarios.new');
Route::post('/Funcionarios/store', 'FuncionarioController@store') ->name('Funcionarios.store');
Route::get('/Funcionarios/edit/{id}', 'FuncionarioController@edit') ->name('Funcionarios.edit');
Route::get('/depedente/new/{id}', 'DependenteController@index') ->name('depedente.index');
Route::post('/depedente/new/', 'DependenteController@store') ->name('depedente.store');
Route::post('/Funcionarios/update/{id}', 'FuncionarioController@update') ->name('Funcionarios.update');
Route::get('/Funcionarios/remove/{id}', 'FuncionarioController@deleta') ->name('Funcionarios.remove');
Route::get('/Funcionarios/remove/', 'FuncionarioController@tudo')->name('Funcionarios.remove.tudo');
Route::get('/depedente/remove/{id}', 'DependenteController@remove') ->name('depedente.remove');
Route::post('/depedente/deletar/{id}', 'DependenteController@remove') ->name('depedente.deletar');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

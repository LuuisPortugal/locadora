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

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name("home.index");
Route::resource('aluguel', 'AluguelsController');
Route::resource('ator', 'AtorsController');
Route::resource('categorium', 'CategoriaController');
Route::resource('cidade', 'CidadesController');
Route::resource('cliente', 'ClientesController');
Route::resource('endereco', 'EnderecosController');
Route::resource('filme', 'FilmesController');
Route::resource('filmeator', 'FilmeAtorsController');
Route::resource('filmecategorium', 'FilmeCategoriaController');
Route::resource('filmetexto', 'FilmeTextosController');
Route::resource('funcionario', 'FuncionariosController');
Route::resource('idioma', 'IdiomasController');
Route::resource('inventario', 'InventariosController');
Route::resource('loja', 'LojasController');
Route::resource('pagamento', 'PagamentosController');
Route::resource('pai', 'PaisController');
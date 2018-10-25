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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware'=> ['auth']], function() {

    Route::prefix('admin')->namespace('Admin')->group(function () {

        Route::prefix('fornecedor')->group(function () {
            Route::get('/', 'FornecedorController@index')->name('fornecedor.index');
            Route::get('new', 'FornecedorController@new')->name('fornecedor.new');
            Route::get('edit/{fornecedores}', 'FornecedorController@edit')->name('fornecedor.edit');
            Route::get('remove/{id}', 'FornecedorController@delete')->name('fornecedor.remove');
            Route::post('store', 'FornecedorController@store')->name('fornecedor.store');
            Route::post('update/{id}', 'FornecedorController@update')->name('fornecedor.update');

        });

    });

    Route::prefix('admin')->namespace('Admin')->group(function () {

        Route::prefix('cliente')->group(function () {
            Route::get('/', 'ClienteController@index')->name('cliente.index');
            Route::get('new', 'ClienteController@new')->name('cliente.new');
            Route::get('edit/{clientes}', 'ClienteController@edit')->name('cliente.edit');
            Route::post('update/{id}', 'ClienteController@update')->name('cliente.update');
            Route::get('remove/{id}', 'ClienteController@delete')->name('cliente.remove');
            Route::post('store', 'ClienteController@store')->name('cliente.store');

        });

    });

    Route::prefix('admin')->namespace('Admin')->group(function () {

        Route::prefix('perfil')->group(function () {
            Route::get('/', 'PerfilController@index')->name('perfil.index');
            Route::get('new', 'PerfilController@new')->name('perfil.new');
            Route::get('edit/{perfils}', 'PerfilController@edit')->name('perfil.edit');
            Route::post('update/{id}', 'PerfilController@update')->name('perfil.update');
            Route::get('remove/{id}', 'PerfilController@delete')->name('perfil.remove');
            Route::post('store', 'PerfilController@store')->name('perfil.store');

        });

    });
    Route::prefix('admin')->namespace('Admin')->group(function () {

        Route::prefix('agente')->group(function () {
            Route::get('/', 'AgentesController@index')->name('agente.index');
            Route::get('new', 'AgentesController@new')->name('agente.new');
            Route::get('edit/{agentes}', 'AgentesController@edit')->name('agente.edit');
            Route::post('update/{id}', 'AgentesController@update')->name('agente.update');
            Route::get('remove/{id}', 'AgentesController@delete')->name('agente.remove');
            Route::post('store', 'AgentesController@store')->name('agente.store');

        });

    });

    Route::prefix('admin')->namespace('Admin')->group(function () {

        Route::prefix('ativo')->group(function () {
            Route::get('//{id}', 'AtivosController@index')->name('ativo.index');
            Route::get('new', 'AtivosController@new')->name('ativo.new');
            Route::get('edit/{ativos}', 'AtivosController@edit')->name('ativo.edit');
            Route::post('update/{id}', 'AtivosController@update')->name('ativo.update');
            Route::get('remove/{id}', 'AtivosController@delete')->name('ativo.remove');
            Route::post('store', 'AtivosController@store')->name('ativo.store');

        });

    });

    Route::prefix('admin')->namespace('Admin')->group(function () {

        Route::prefix('medidor')->group(function () {
            Route::get('//{id}', 'MedidoresController@index')->name('medidor.index');
            Route::get('new', 'MedidoresController@new')->name('medidor.new');
            Route::get('edit/{medidores}', 'MedidoresController@edit')->name('medidor.edit');
            Route::post('update/{id}', 'MedidoresController@update')->name('medidor.update');
            Route::get('remove/{id}', 'MedidoresController@delete')->name('medidor.remove');
            Route::post('store', 'MedidoresController@store')->name('medidor.store');

        });

    });


    Route::prefix('admin')->namespace('Admin')->group(function () {

        Route::prefix('acompanhamentoGeracao')->group(function () {
            Route::get('/', 'AcompanhamentoGeracaoController@index')->name('acompanhamentoGeracao.index');
            Route::get('/{id}', 'AcompanhamentoGeracaoController@index2')->name('acompanhamentoGeracao.index2');
            Route::get('new', 'MedidoresController@new')->name('medidor.new');
            Route::get('edit/{medidores}', 'MedidoresController@edit')->name('medidor.edit');
            Route::post('update/{id}', 'MedidoresController@update')->name('medidor.update');
            Route::get('remove/{id}', 'MedidoresController@delete')->name('medidor.remove');
            Route::post('store', 'MedidoresController@store')->name('medidor.store');

        });
    });



});

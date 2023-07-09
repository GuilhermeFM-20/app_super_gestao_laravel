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

/*

    Verbo http {
        'get';
        'post';
        'put';
        'patch';
        'delete';
        'options';
    }


*/

Route::get('/', 'PrincipalController@principal')->name('site.index');

Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')->name('site.contato');

Route::post('/contato', 'ContatoController@salvar')->name('site.contato');

//nome, categoria, assunto, mensagem

Route::get('/contato/{nome}/{categoria_id}', 

    function(string $nome  = 'Desconhecido', int $categoria_id = 1){

        echo 'Estamos aqui: '.$nome." - ".$categoria_id;

    }

)->where('categoria_id','[0-9]+')->where('nome','[A-Za-z]+');

Route::get('/login',function(){ return 'Login';})->name('site.login');

Route::prefix('/app')->group(function(){

    Route::get('/clientes',function(){ return 'Clientes';})->name('app.clientes');

    Route::get('/fornecedores', 'FornecedorController@index')->name('app.fornecedores');

    Route::get('/contato',function(){ return 'Contato';})->name('app.produtos');

});

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');

Route::fallback(function(){
    echo "404 | Página não encontrada";
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;


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

Route::get('/login/{erro?}','LoginController@index')->name('site.login');
Route::post('/login','LoginController@autenticacao')->name('site.login');

//Route::middleware('autenticacao:ldap,visitante')->prefix('/app')->group(function(){
Route::middleware('autenticacao:ldap,visitante')->prefix('/app')->group(function(){
    
    Route::get('/home','HomeController@index')->name('app.home');
    Route::get('/sair','LoginController@sair')->name('app.sair');
    Route::get('/cliente','ClienteController@index')->name('app.cliente');
    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
    Route::post('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::get(' /fonecedor/excluir', 'FornecedorController@excluir')->name('app.fornecedor.excluir');
    
    Route::get('/produto','ProdutoController@index')->name('app.produto');

});

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');

Route::fallback(function(){
    echo "404 | Página não encontrada";
});

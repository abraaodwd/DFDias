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

// Routes da página inicial
Route::get('index', 'IndexController@index');
Route::get('home', 'IndexController@index');
Route::get('/', 'IndexController@index');
// Fim routes da página inicial

// Route da seção "Sobre"
Route::get('sobre', 'SobreController@index');
// Fim route "Sobre"

// Routes da área de login
Route::get('logout', 'LoginController@logout');
Route::get('delete/{id}', 'LoginController@destroy')->where(['id' => '[0-9]{1,3}']);
Route::get('cadastro', 'LoginController@formCadastro');
Route::post('update', 'LoginController@update');
Route::resource('login', 'LoginController', ['except' => ['destroy', 'update']]);
// Fim routes da área de login

// Routes da área de contato
Route::post('contato/sendmail', 'ContatoController@sendMail');
Route::resource('contato', 'ContatoController');
// Fim routes da área de contato

// Middleware que gerencia a autenticação dos usuários
Route::post('autenticar', 'AuthController@authenticate');

// Routes do blog

Route::get('blog/novoartigo',                    ['middleware' => 'autenticar', 'uses' => 'BlogController@newArticleForm']);
Route::get('blog/atualizarartigo/{id_artigo}',   ['middleware' => 'autenticar', 'uses' => 'BlogController@edit'])->where(['id_artigo' => '[0-9]{1,6}']);
Route::get('destroy/{id_artigo}',                ['middleware' => 'autenticar', 'uses' => 'BlogController@destroy'])->where(['id_artigo' => '[0-9]{1,6}']);
Route::get('blog/lista',                         ['middleware' => 'autenticar', 'uses' => 'BlogController@lista']);
Route::get('blog/index/{id_categoria}',           'BlogController@indexPorCategoria')->where(['id_categoria' => '[0-9]{1,2}']);
Route::get('blog/index/{mes}/{ano}',              'BlogController@indexPorMesAno')->where(['mes' => '^(0?[1-9]|1[0-2])$', 'ano' => '20[0-9]{2}']);
Route::get('blog/json',                           'BlogController@index_json');
Route::post('blog/update',                       ['middleware' => 'autenticar', 'uses' => 'BlogController@update']);

Route::resource('blog', 'BlogController', ['except' => ['destroy', 'update', 'edit']]);

// Fim routes do blog

// Routes categorias
Route::get('categoria/lista', 'CategoriaController@index');
Route::get('categoria/atualizar/{id_categoria}', 'CategoriaController@edit')->where(['id_categoria' => '[0-9]{1,2}']);
Route::post('categoria/update', 'CategoriaController@update');
// Fim routes categorias



/*
Route::get('teste/{id}/{nome}', ['as' => 'dados', function($nome = ''){  
    //$url = url('diegofi');
    return 'Bom dia '.$nome.'!';
}])
->where(['id' => '[0-9]{1,3}','nome' => '^D[A-Za-z]+']); // Aceita somente ids com 1 a 3 números e palavras que começam com D
*/
//Route::get('teste/{nome?}', 'TesteController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

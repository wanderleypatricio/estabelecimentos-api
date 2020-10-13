<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login','AuthController@login');

Route::get('/estabelecimentos', ['as' => 'consultar.estabelecimentos', 'uses'=>'EstabelecimentoController@index']);
Route::post('/busca-estabelecimento', ['as' => 'consultar.busca.estabelecimentos', 'uses'=>'EstabelecimentoController@busca']);
Route::get('/estabelecimento/{id}', ['as' => 'consultar.estabelecimentos.id', 'uses'=>'EstabelecimentoController@show']);

Route::group(['middleware' => ['jwt.verify']], function() {
    //rotas do objeto user
    Route::get('user', 'UserController@getAuthenticatedUser');
    Route::get('users','AuthController@index');
    Route::post('user/{id}','UserController@update');
    Route::get('user/{id}','UserController@show');
    Route::delete('user/{id}','UserController@destroy');
    Route::get('user/pedido/{id}','UserController@retornaListaPedidosID');

    
    
    Route::post('/cadastrar-estabelecimento', ['as' => 'cadastrar.estabelecimentos', 'uses'=>'EstabelecimentoController@store']);
    Route::post('/alterar-estabelecimento', ['as' => 'alterar.estabelecimentos', 'uses'=>'EstabelecimentoController@update']);
    Route::delete('/estabelecimento/{id}', ['as' => 'excluir.estabelecimentos', 'uses'=>'EstabelecimentoController@destroy']);


    Route::post('logout', 'AuthController@logout');


});
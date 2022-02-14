<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
})->name('welcome')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth','prefix' => 'perfil'], function(){
    Route::get('/', ['as' => 'perfil.index', 'uses' => 'App\Http\Controllers\PerfilController@index']);
    Route::get('/create', ['as' => 'perfil.create', 'uses' => 'App\Http\Controllers\PerfilController@create']);
    Route::post('/store', ['as' => 'perfil.store', 'uses' => 'App\Http\Controllers\PerfilController@store']);
    Route::get('/show/{id}', ['as' => 'perfil.show', 'uses' => 'App\Http\Controllers\PerfilController@show']);
    Route::get('/edit/{id}', ['as' => 'perfil.edit', 'uses' => 'App\Http\Controllers\PerfilController@edit']);
    Route::put('/update/{id}', ['as' => 'perfil.update', 'uses' => 'App\Http\Controllers\PerfilController@update']);
    Route::delete('/destroy/{id}', ['as' => 'perfil.destroy', 'uses' => 'App\Http\Controllers\PerfilController@destroy']);

    Route::get('/permissao/{id}',['as' => 'perfil.permissao', 'uses' => 'App\Http\Controllers\PerfilController@perfilPermissao']);

    Route::post('/adicionarPerfil',['as' => 'perfil.adicionarPermissao', 'uses' => 'App\Http\Controllers\PerfilController@adicionarPermissao']);

    Route::get('/deletarPerfil/{id_perfil}/{id_permissao}',['as' => 'perfil.deletarPermissao', 'uses' => 'App\Http\Controllers\PerfilController@deletarPermissao']);
});

Route::group(['middleware' => 'auth','prefix' => 'permissao'], function(){
    Route::get('/', ['as' => 'permissao.index', 'uses' => 'App\Http\Controllers\PermissaoController@index']);
    Route::get('/create', ['as' => 'permissao.create', 'uses' => 'App\Http\Controllers\PermissaoController@create']);
    Route::post('/store', ['as' => 'permissao.store', 'uses' => 'App\Http\Controllers\PermissaoController@store']);
    Route::get('/show/{id}', ['as' => 'permissao.show', 'uses' => 'App\Http\Controllers\PermissaoController@show']);
    Route::get('/edit/{id}', ['as' => 'permissao.edit', 'uses' => 'App\Http\Controllers\PermissaoController@edit']);
    Route::put('/update/{id}', ['as' => 'permissao.update', 'uses' => 'App\Http\Controllers\PermissaoController@update']);
    Route::delete('/destroy/{id}', ['as' => 'permissao.destroy', 'uses' => 'App\Http\Controllers\PermissaoController@destroy']);
});


Route::group(['middleware' => 'auth','prefix' => 'users'], function(){
    Route::get('/', ['as' => 'users.index', 'uses' => 'App\Http\Controllers\UsersController@index']);
    Route::get('/create', ['as' => 'users.create', 'uses' => 'App\Http\Controllers\UsersController@create']);
    Route::post('/store', ['as' => 'users.store', 'uses' => 'App\Http\Controllers\UsersController@store']);
    Route::get('/show/{id}', ['as' => 'users.show', 'uses' => 'App\Http\Controllers\UsersController@show']);
    Route::get('/edit/{id}', ['as' => 'users.edit', 'uses' => 'App\Http\Controllers\UsersController@edit']);
    Route::put('/update/{id}', ['as' => 'users.update', 'uses' => 'App\Http\Controllers\UsersController@update']);
    Route::delete('/destroy/{id}', ['as' => 'users.destroy', 'uses' => 'App\Http\Controllers\UsersController@destroy']);

    Route::get('/perfil/{id}',['as' => 'users.perfil', 'uses' => 'App\Http\Controllers\UsersController@usersPerfil']);
    Route::post('/adicionarPerfil',['as' => 'users.adicionarPerfil', 'uses' => 'App\Http\Controllers\UsersController@adicionarPerfil']);
    Route::get('/deletarPerfil/{id_usuario}/{id_perfil}',['as' => 'users.deletarPerfil', 'uses' => 'App\Http\Controllers\UsersController@deletarPerfil']);
});

Route::group(['prefix' => 'login'], function(){
    Route::get('/github',['as' => 'login.github', 'uses' => 'App\Http\Controllers\SocialiteAuthController@github']);
    Route::get('/retornoGithub',['as' => 'login.retornoGithub', 'uses' => 'App\Http\Controllers\SocialiteAuthController@retornoGithub']);


    Route::get('/facebook',['as' => 'login.facebook', 'uses' => 'App\Http\Controllers\SocialiteAuthController@facebook']);
    Route::get('/retornoFacebook',['as' => 'login.retornoFacebook', 'uses' => 'App\Http\Controllers\SocialiteAuthController@retornoFacebook']);

    Route::get('/google',['as' => 'login.google', 'uses' => 'App\Http\Controllers\SocialiteAuthController@google']);
    Route::get('/retornoGoogle',['as' => 'login.retornoGoogle', 'uses' => 'App\Http\Controllers\SocialiteAuthController@retornoGoogle']);
});
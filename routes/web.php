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

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
    
	Route::post('user', [
        'uses' => 'sistema\usuario\usuario\UserController@store',
        'as' => 'user.store'
    ]);

    Route::put('user/{user}', [
        'uses' => 'sistema\usuario\usuario\UserController@update',
        'as' => 'user.update'
    ]);

        /** Ruta para actualizar perfil propio*/
    Route::get('user/perfil', [
        'uses' => 'sistema\usuario\usuario\UserController@perfil',
        'as' => 'user.perfil'
    ]);

        /** Ruta para guardar los cambios del perfil*/
    Route::put('user/actualizar/{id}', [
        'uses' => 'sistema\usuario\usuario\UserController@actualizarPerfil',
        'as' => 'user.perfil.actualizar'
    ]);

    
    /** ------------------------------------- USUARIOS ----------------------------------------- */
    /**
     * Rutas definidas para el manejo de los usuarios del sistema
     */

    Route::get('user', [
        'uses' => 'sistema\usuario\usuario\UserController@index',
        'as' => 'user.index'
    ]);

    Route::get('user/create', [
        'uses' => 'sistema\usuario\usuario\UserController@create',
        'as' => 'user.create'
    ]);

    Route::get('user/{user}/edit', [
        'uses' => 'sistema\usuario\usuario\UserController@edit',
        'as' => 'user.edit'
    ]);

    Route::get('user/{id}/destroy', [
        'uses' => 'sistema\usuario\usuario\UserController@destroy',
        'as' => 'user.destroy'
    ]);

    /**------------------------------------------------------------------------------------------**/

    /** ------------------------------------- OBJETIVOS ----------------------------------------- */
    /**
     * Rutas definidas para el manejo de los objetivos de  la empresa
     */
    Route::get('objetivo', [
        'uses' => 'sistema\objetivos\ObjetivoController@index',
        'as' => 'objetivo.index_objetivos'
    ]);

     Route::get('objetivo/create', [
        'uses' => 'sistema\objetivos\ObjetivoController@create',
        'as' => 'objetivo.create'
    ]);

     Route::post('objetivo', [
        'uses' => 'sistema\objetivos\ObjetivoController@store',
        'as' => 'objetivo.store'
    ]);  

    Route::put('objetivo/{objetivo}', [
        'uses' => 'sistema\objetivos\ObjetivoController@update',
        'as' => 'objetivo.update'
    ]);  

    Route::get('objetivo{objetivo}/edit', [
        'uses' => 'sistema\objetivos\ObjetivoController@edit',
        'as' => 'objetivo.edit'
    ]);

    Route::get('financiero', [
        'uses' => 'sistema\objetivos\ObjetivoController@indexF',
        'as' => 'financiero.index'
    ]);        
    /**------------------------------------------------------------------------------------------**/
});



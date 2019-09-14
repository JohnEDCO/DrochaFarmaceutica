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

Route::group(['middleware' =>  'admin'], function () {
    /** ------------------------------------- USUARIOS ----------------------------------------- */
    /**
     * Rutas definidas para el manejo de los usuarios del sistema
     */

    Route::post('user', [
        'uses' => 'sistema\usuario\usuario\UserController@store',
        'as' => 'user.store'
    ]);

    Route::put('user/{user}', [
        'uses' => 'sistema\usuario\usuario\UserController@update',
        'as' => 'user.update'
    ]);
    
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
    /** ------------------------------------- ROLES ----------------------------------------- */
    /**
     * Rutas definidas para el manejo de los ROLES del sistema
     */

    Route::get('rol', [
        'uses' => 'sistema\usuario\rol\RolController@index',
        'as' => 'rol.index'
    ]);

    Route::get('rol/create', [
        'uses' => 'sistema\usuario\rol\RolController@create',
        'as' => 'rol.create'
    ]);

    Route::get('rol/{rol}/edit', [
        'uses' => 'sistema\usuario\rol\RolController@edit',
        'as' => 'rol.edit'
    ]);

    Route::get('rol/{id}/destroy', [
        'uses' => 'sistema\usuario\rol\RolController@destroy',
        'as' => 'rol.destroy'
    ]);

    Route::put('rol/{rol}', [
        'uses' => 'sistema\usuario\rol\RolController@update',
        'as' => 'rol.update'
    ]);

    Route::post('rol', [
        'uses' => 'sistema\usuario\rol\RolController@store',
        'as' => 'rol.store'
    ]);
});
    /**------------------------------------------------------------------------------------------**/
    /** ------------------------------------- OBJETIVOS ----------------------------------------- */
    /**
     * Rutas definidas para el manejo de los objetivos de  la empresa
     */
    Route::get('objetivo/BSC', [
        'uses' => 'sistema\objetivos\ObjetivoController@indexBsc',
        'as' => 'objetivo.bsc'
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

    Route::get('objetivo/{objetivo}/edit', [
        'uses' => 'sistema\objetivos\ObjetivoController@edit',
        'as' => 'objetivo.edit'
    ]);

    Route::get('objetivo/{id}/destroy', [
        'uses' => 'sistema\objetivos\ObjetivoController@destroy',
        'as' => 'objetivo.destroy'
    ]);

    Route::get('indicador/{id}/{id_objetivo}/destroy', [
        'uses' => 'sistema\objetivos\ObjetivoController@destroyI',
        'as' => 'indicador.destroy'
    ]);

    Route::get('meta/{id}/{id_objetivo}/destroy', [
        'uses' => 'sistema\objetivos\ObjetivoController@destroyM',
        'as' => 'meta.destroy'
    ]);

    Route::get('iniciativa/{id}/{id_objetivo}/destroy', [
        'uses' => 'sistema\objetivos\ObjetivoController@destroyIn',
        'as' => 'iniciativa.destroy'
    ]);

    Route::get('objetivo', [
        'uses' => 'sistema\objetivos\ObjetivoController@indexOb',
        'as' => 'objetivo.index'
    ]);        
    /**------------------------------------------------------------------------------------------**/
});



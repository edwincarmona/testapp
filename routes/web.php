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

Route::get('activate/{token}', 'Auth\RegisterController@activate')
    ->name('activate');

Route::group(['middleware' => 'auth'], function () {

    Route::get('products', [
        'as' => 'products.index',
        'uses' => 'ProductController@Index'
    ])->middleware('permission:lector-productos|autor-productos|editor-productos|gestor-productos');

    Route::get('products/create', [
        'as' => 'products.create',
        'uses' => 'ProductController@Create'
    ])->middleware('permission:autor-productos|editor-productos|gestor-productos');

    Route::post('products', [
        'as' => 'products.store',
        'uses' => 'ProductController@Store'
    ])->middleware('permission:autor-productos|editor-productos|gestor-productos');

    Route::get('products/{product}/edit', [
        'as' => 'products.edit',
        'uses' => 'ProductController@Edit'
    ])->middleware('permission:autor-productos|editor-productos|gestor-productos');

    Route::match(array('PUT', 'PATCH'), 'products/{product}', [
        'as' => 'products.update',
        'uses' => 'ProductController@Update'
    ])->middleware('permission:autor-productos|editor-productos|gestor-productos');

    Route::get('products/{product}', [
        'as' => 'products.show',
        'uses' => 'ProductController@Show'
    ])->middleware('permission:lector-productos|autor-productos|editor-productos|gestor-productos');

    Route::delete('products/{product}', [
        'as' => 'products.destroy',
        'uses' => 'ProductController@Destroy'
    ])->middleware('gestor-productos');

    Route::get('clients', [
        'as' => 'clients.index',
        'uses' => 'ClientController@Index'
    ])->middleware('permission:lector-clientes|autor-clientes|editor-clientes|gestor-clientes');

    Route::get('clients/create', [
        'as' => 'clients.create',
        'uses' => 'ClientController@Create'
    ])->middleware('permission:autor-clientes|editor-clientes|gestor-clientes');

    Route::post('clients', [
        'as' => 'clients.store',
        'uses' => 'ClientController@Store'
    ])->middleware('permission:autor-clientes|editor-clientes|gestor-clientes');

    Route::get('clients/{client}/edit', [
        'as' => 'clients.edit',
        'uses' => 'ClientController@Edit'
    ])->middleware('permission:autor-clientes|editor-clientes|gestor-clientes');

    Route::match(array('PUT', 'PATCH'), 'clients/{client}', [
        'as' => 'clients.update',
        'uses' => 'ClientController@Update'
    ])->middleware('permission:autor-clientes|editor-clientes|gestor-clientes');

    Route::get('clients/{client}', [
        'as' => 'clients.show',
        'uses' => 'ClientController@Show'
    ])->middleware('permission:lector-clientes|autor-clientes|editor-clientes|gestor-clientes');

    Route::delete('clients/{client}', [
        'as' => 'clients.destroy',
        'uses' => 'ClientController@Destroy'
    ])->middleware('gestor-clientes');
    
    Route::group(['middleware' => ['permission:catalogos-sistema']], function () {
        Route::resource('units', 'UnitController');
        Route::resource('segments', 'SegmentController');
    });
});


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
// Route::post('auth/login', ['uses' => 'AuthController@login', 'as' => 'login']);

Route::get('/home', 'HomeController@index')->name('home');

//Tasks
Route::group(['prefix' => '/task'], function () {
    Route::get('/', 'TaskController@index');
    Route::get('/create', 'TaskController@create');
    Route::get('/{task}/edit', 'TaskController@edit');
    Route::post('/', 'TaskController@store');
    Route::get('/{task}', 'TaskController@show');
    Route::put('/update/{task}', 'TaskController@update');
    Route::delete('/{task}', 'TaskController@destroy');
});

Route::group(['prefix' => '/category', 'middleware' => 'admin'], function () {
    Route::get('/', 'CategoryController@index');
    Route::get('/create', 'CategoryController@create');
    Route::get('/{category}/edit', 'CategoryController@edit');
    Route::post('/', 'CategoryController@store');
    Route::get('/{category}', 'CategoryController@show');
    Route::put('/update/{category}', 'CategoryController@update');
    Route::delete('/{category}', 'CategoryController@destroy');
});

// Route::resource('task', 'TaskController');

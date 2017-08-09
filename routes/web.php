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
Route::get('test', 'UserMasterController@start');
Route::post('add', 'UserMasterController@addLocation');
Route::get('pdf', function() {
    $pdf = App::make('dompdf.wrapper');
    $pdf->loadHTML('<h1>Test</h1>');
    return $pdf->stream();
});

Route::post('addLocation', 'UserMasterController@addLocation');

Route::get('login', 'Auth\AuthController@login');
Route::post('verify', 'Auth\AuthController@verify');

Route::get('logout', 'Auth\AuthController@logout');

Route::post('forgot', 'Auth\AuthController@forgot');
Route::get('reset/{value?}', 'Auth\AuthController@reset')->where('value', '(.*)');
Route::post('resetAction', 'Auth\AuthController@resetAction');

Route::get('activate/{value?}', 'UserMasterController@activate')->where('value', '(.*)');
Route::post('activateAction', 'UserMasterController@activateAction');

$router->group(['middleware' => ['auth', 'auth.session']], function ($router) {

    Route::get('/', 'BeeController@index');
    Route::get('index', 'BeeController@index');

    Route::get('user', 'UserController@profile');
    Route::post('user/profileAction', 'UserController@profileAction');
    Route::get('user/check/{username}', 'UserController@check');
    Route::get('file/avatar/{size}', 'FileController@getAvatar');

    Route::get('master/users', 'UserMasterController@index');
    Route::get('master/users/datatables', 'UserMasterController@datatables');
    Route::get('master/users/avatar/{id}', 'FileController@getAvatarByUserId');
    Route::get('master/users/toggle/{id}', 'UserMasterController@toggle');
    Route::get('master/users/delete/{id}', 'UserMasterController@delete');
    Route::get('master/users/add', 'UserMasterController@add');
    Route::post('master/users/addAction', 'UserMasterController@addAction');
    Route::get('master/users/check/{username}', 'UserMasterController@check');
    Route::get('master/users/edit/{id}', 'UserMasterController@edit');
    Route::post('master/users/editAction', 'UserMasterController@editAction');
    Route::get('master/users/editCheck/{usernames}', 'UserMasterController@editCheck');
    Route::post('master/users/deleteAll', 'UserMasterController@deleteAll');


});

<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::controller('password', 'RemindersController');

Route::get('/', 'HomeController@index');

Route::group(array('prefix' => 'user'), function(){
    Route::post('login', array('before' => 'csrf', 'uses' => 'UserController@login'));
    Route::get('logout', array('before' => 'auth', 'uses' => 'UserController@logout'));
});

Route::group(array('prefix' => 'customer'), function(){
    Route::get('/', array('before' => 'auth', 'uses' => 'CustomerController@index'));
    Route::get('settings', array('before' => 'auth', 'uses' => 'CustomerController@displayAllSettings'));
    Route::get('settings/{i}', array('before' => 'auth', 'uses' => 'CustomerController@displaySingleSetting'));
    Route::post('settings/{i}/edit', array('before' => 'auth|csrf', 'uses' => 'CustomerController@editSetting'));

    Route::post('signup', array('before' => 'csrf', 'uses' => 'CustomerController@signUp'));
});

Route::group(array('prefix' => 'business'), function(){
    Route::get('/', array('before' => 'auth', 'uses' => 'BusinessController@index'));
});

Route::group(array('prefix' => 'admin'), function(){
    Route::get('/', array('before' => 'auth', 'uses' => 'AdminController@index'));
});
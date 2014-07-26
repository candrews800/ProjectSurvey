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
    Route::get('settings', array('before' => 'auth', 'uses' => 'UserController@displayAllSettings'));
    Route::get('settings/{i}', array('before' => 'auth', 'uses' => 'UserController@displaySingleSetting'));
    Route::post('settings/{i}/edit', array('before' => 'auth|csrf', 'uses' => 'UserController@editSetting'));

    Route::get('logout', array('before' => 'auth', 'uses' => 'UserController@logout'));
    Route::post('signup', array('before' => 'csrf', 'uses' => 'UserController@signUp'));
    Route::post('signin', array('before' => 'csrf', 'uses' => 'UserController@signIn'));
});
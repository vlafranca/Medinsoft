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

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('test', function()
{
    return View::make('hello');
});

Route::filter('acl.permitted', 'AclPermittedFilter');

Route::group(array('prefix' => 'user'), function() {
    Route::get('login', array(
        'as' => 'user.index',
        'uses' => 'UserController@index'
    ));

    Route::get('supersecret', array(
        'before' => ['auth', 'acl.permitted'],
        'as' => 'user.supersecret',
        'uses' => 'UserController@supersecret'
    ));
});
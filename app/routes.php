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
    if($user = Auth::user())
        echo "Logged as {$user->email} <br />";
    $routeCollection = Route::getRoutes();

    foreach ($routeCollection as $value) {
        echo $value->getMethods()[0].' '.URL::to($value->getPath())."<br />";
    }

	return View::make('hello');
});

Route::get('user/confirm/{token}', array(
    'as' => 'user.confirm',
    'uses' => 'UserController@confirmEmail'
));

Route::get('denied', array(
    'as' => 'user.denied',
    function()
    {
        return View::make('user.denied');
    }
));

Route::get('unauthorized', array(
    'as' => 'user.unauthorized',
    function()
    {
        return View::make('user.unauthorized');
    }
));

Route::filter('acl.permitted', 'AclPermittedFilter');

Route::controller('password', 'RemindersController');

Route::get('logout', array(
    'as' => 'logout',
    'uses' => 'AuthController@logout'
));

Route::get('reminder', array(
    'before' => ['guest'],
    'as' => 'password.remind',
    'uses' => 'RemindersController@getRemind'
));


Route::post('reminder', array(
    'as' => 'password.request',
    'uses' => 'RemindersController@postRemind'
));

Route::group(array('prefix' => 'recruiter'), function() {

    Route::get('login', array(
        'before' => ['guest'],
        'as' => 'recruiter.login',
        'uses' => 'AuthController@getUserLogin'
    ));

    Route::post('login', array(
        'before' => ['guest'],
        'as' => 'recruiter.postLogin',
        'uses' => 'AuthController@postUserLogin'
    ));

    Route::get('/', array(
        'before' => ['auth', 'acl.permitted'],
        'as' => 'recruiter.home',
        'uses' => 'RecruiterController@index'
    ));
});

Route::group(array('prefix' => 'candidate'), function() {

    Route::get('login', array(
        'before' => ['guest'],
        'as' => 'candidate.login',
        'uses' => 'AuthController@getUserLogin'
    ));

    Route::post('login', array(
        'before' => ['guest'],
        'as' => 'candidate.postLogin',
        'uses' => 'AuthController@postUserLogin'
    ));

    Route::get('register', array(
        'before' => ['guest'],
        'as' => 'candidate.register',
        'uses' => 'CandidateController@create'
    ));

    Route::post('register', array(
        'before' => ['guest'],
        'as' => 'candidate.register',
        'uses' => 'CandidateController@store'
    ));

    Route::get('/', array(
        'before' => ['auth', 'acl.permitted'],
        'as' => 'candidate.home',
        'uses' => 'CandidateController@index'
    ));
});

Route::group(array('prefix' => 'trainingcenter'), function() {

    Route::get('login', array(
        'before' => ['guest'],
        'as' => 'trainingcenter.login',
        'uses' => 'AuthController@getUserLogin'
    ));

    Route::post('login', array(
        'before' => ['guest'],
        'as' => 'trainingcenter.postLogin',
        'uses' => 'AuthController@postUserLogin'
    ));

    Route::get('/', array(
        'before' => ['auth', 'acl.permitted'],
        'as' => 'trainingcenter.home',
        'uses' => 'TrainingCenterController@index'
    ));
});
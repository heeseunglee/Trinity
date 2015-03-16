<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/', 'IndexController@index');

Route::group(['prefix' => 'Consultant'], function() {
    Route::get('/', 'Consultant\CoursesManagementController@index');

    Route::get('index', 'Consultant\CoursesManagementController@index');

    Route::group(['prefix' => 'coursesManagement'], function() {
        Route::get('/', 'Consultant\CoursesManagementController@index');

        Route::get('index', 'Consultant\CoursesManagementController@index');
    });
});

Route::group(['prefix' => 'Student'], function() {

});

Route::group(['prefix' => 'Hr'], function() {

});

Route::group(['prefix' => 'Instructor'], function() {

});

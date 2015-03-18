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

Route::group(['prefix' => 'Consultant', 'middleware' => 'auth'], function() {
    Route::get('/', function() {
        return redirect('Consultant/coursesManagement/index');
    });

    Route::get('index', function() {
        return redirect('Consultant/coursesManagement/index');
    });

    Route::group(['prefix' => 'coursesManagement'], function() {

        Route::get('/', function() {
            return redirect('Consultant/coursesManagement/index');
        });

        Route::get('index', 'Consultant\CoursesManagementController@index');

    });

    Route::group(['prefix' => 'usersManagement'], function() {

        Route::get('/', function() {
            return redirect('Consultant/usersManagement/index');
        });

        Route::get('index', 'Consultant\UsersManagementController@index');

        Route::group(['prefix' => 'students'], function() {

            Route::get('/', function() {
                return redirect('Consultant/usersManagement/students/index');
            });

            Route::get('index', 'Consultant\UsersManagementStudentsController@index');

            Route::get('register', 'Consultant\UsersManagementStudentsController@register');

            Route::post('create', 'Consultant\UsersManagementStudentsController@create');

        });

        Route::group(['prefix' => 'instructors'], function() {

            Route::get('/', function() {
                return redirect('Consultant/usersManagement/instructors/index');
            });

            Route::get('index', 'Consultant\UsersManagementInstructorsController@index');

            Route::get('register', 'Consultant\UsersManagementInstructorsController@register');

            Route::get('register/popups/certificate', 'Consultant\UsersManagementInstructorsController@certificatePopUp');

            Route::get('register/popups/otherCertificate', 'Consultant\UsersManagementInstructorsController@otherCertificatePopUp');

            Route::get('register/popups/curriculum', 'Consultant\UsersManagementInstructorsController@curriculumPopUp');

            Route::post('create', 'Consultant\UsersManagementInstructorsController@create');

        });

        Route::group(['prefix' => 'hrs'], function() {

            Route::get('/', function() {
                return redirect('Consultant/usersManagement/hrs/index');
            });

            Route::get('index', 'Consultant\UsersManagementHrsController@index');

            Route::get('register', 'Consultant\UsersManagementHrsController@register');

            Route::post('create', 'Consultant\UsersManagementHrsController@create');

        });

        Route::group(['prefix' => 'consultants'], function() {

            Route::get('/', function() {
                return redirect('Consultant/usersManagement/consultants/index');
            });

            Route::get('index', 'Consultant\UsersManagementConsultantsController@index');

            Route::get('register', 'Consultant\UsersManagementConsultantsController@register');

            Route::post('create', 'Consultant\UsersManagementConsultantsController@create');

        });
    });

    Route::group(['prefix' => 'companiesManagement'], function() {
        Route::get('/', function() {
            return redirect('Consultant/companiesManagement/index');
        });

        Route::get('index', 'Consultant\CompaniesManagementController@index');

        Route::post('create', 'Consultant\CompaniesManagementController@create');
    });

});

Route::group(['prefix' => 'Student'], function() {

});

Route::group(['prefix' => 'Hr'], function() {

});

Route::group(['prefix' => 'Instructor'], function() {

});

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

use App\CourseMainCurriculum;
use App\PreferredAreaGroup;

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/', 'IndexController@index');

Route::post('firstLogin/Student', 'Student\FirstLoginController@update');

Route::post('firstLogin/Instructor', 'Instructor\FirstLoginController@update');

Route::get('firstLogin/Instructor/popups/certificate', function() {
    return view('instructor.popups.firstLogin.certificate');
});

Route::get('firstLogin/Instructor/popups/otherCertificate', function() {
    return view('instructor.popups.firstLogin.otherCertificate');
});

Route::get('firstLogin/Instructor/popups/curriculum', function() {
    return view('instructor.popups.firstLogin.curriculum')
        ->with('course_main_curriculums', CourseMainCurriculum::all());;
});

Route::get('firstLogin/Instructor/popups/preferredArea', function() {
    return view('instructor.popups.firstLogin.preferredArea')
        ->with('preferred_area_groups', PreferredAreaGroup::all());
});

Route::post('firstLogin/Hr', 'Hr\FirstLoginController@update');

Route::post('firstLogin/Consultant', 'Consultant\FirstLoginController@update');

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

        Route::group(['prefix' => 'requestedCourses'], function() {

            Route::get('/', function() {
                return redirect('Consultant/coursesManagement/requestedCourses/index');
            });

            Route::get('index', 'Consultant\CoursesManagementRequestedCoursesController@index');

        });

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

Route::group(['prefix' => 'Student', 'middleware' => 'auth'], function() {

    Route::get('/', function() {
        return redirect('Student/coursesManagement/index');
    });

    Route::get('index', function() {
        return redirect('Student/coursesManagement/index');
    });

    Route::group(['prefix' => 'coursesManagement'], function() {

        Route::get('/', function() {
            return redirect('Student/coursesManagement/index');
        });

        Route::get('index', 'Student\CoursesManagementController@index');

    });

});

Route::group(['prefix' => 'Hr', 'middleware' => 'auth'], function() {

    Route::get('/', function() {
        return redirect('Hr/coursesManagement/index');
    });

    Route::get('index', function() {
        return redirect('Hr/coursesManagement/index');
    });

    Route::group(['prefix' => 'coursesManagement'], function() {

        Route::get('/', function() {
            return redirect('Hr/coursesManagement/index');
        });

        Route::get('index', 'Hr\CoursesManagementController@index');

        Route::group(['prefix' => 'newCourses'], function() {

            Route::get('/', function() {
                return redirect('Hr/coursesManagement/newCourses/index');
            });

            Route::get('index', 'Hr\CoursesManagementNewCoursesController@index');

            Route::get('register', 'Hr\CoursesManagementNewCoursesController@register');

            Route::post('register', 'Hr\CoursesManagementNewCoursesController@create');

            Route::get('popups/curriculum', function() {
                return view('hr.coursesManagement.newCourses.popups.curriculum')
                    ->with('course_main_curriculums', CourseMainCurriculum::all());;
            });

            Route::get('ajax/subCurriculum/{course_main_curriculum_id}', function($course_main_curriculum_id) {
                return view('hr.coursesManagement.newCourses.ajax.subCurriculum')
                    ->with('course_main_curriculum', CourseMainCurriculum::find($course_main_curriculum_id));
            });

        });

    });

});

Route::group(['prefix' => 'Instructor', 'middleware' => 'auth'], function() {

    Route::get('/', function() {
        return redirect('Instructor/coursesManagement/index');
    });

    Route::get('index', function() {
        return redirect('Instructor/coursesManagement/index');
    });

    Route::group(['prefix' => 'coursesManagement'], function() {

        Route::get('/', function() {
            return redirect('Instructor/coursesManagement/index');
        });

        Route::get('index', 'Instructor\CoursesManagementController@index');

    });

});

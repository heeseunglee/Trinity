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

use App\Consultant;
use App\Course;
use App\CourseMainCurriculum;
use App\Hr;
use App\Instructor;
use App\LvlTest;
use App\NewCourseRequest;
use App\PreferredAreaGroup;
use App\Student;

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/', 'IndexController@index');

Route::group(['prefix' => 'firstLogin', 'middleware' => 'auth'], function() {

    Route::post('Student', 'Student\FirstLoginController@update');

    Route::post('Instructor', 'Instructor\FirstLoginController@update');

    Route::get('Instructor/popups/certificate', function() {
        return view('instructor.popups.firstLogin.certificate');
    });

    Route::get('Instructor/popups/otherCertificate', function() {
        return view('instructor.popups.firstLogin.otherCertificate');
    });

    Route::get('Instructor/popups/curriculum', function() {
        return view('instructor.popups.firstLogin.curriculum')
            ->with('course_main_curriculums', CourseMainCurriculum::all());;
    });

    Route::get('Instructor/popups/preferredArea', function() {
        return view('instructor.popups.firstLogin.preferredArea')
            ->with('preferred_area_groups', PreferredAreaGroup::all());
    });

    Route::post('Hr', 'Hr\FirstLoginController@update');

    Route::post('Consultant', 'Consultant\FirstLoginController@update');

});


Route::group(['prefix' => 'Consultant', 'middleware' => ['auth', 'firstLogin', 'role']], function() {

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

        Route::get('index', function() {
            return view('consultant.coursesManagement.index')
                ->with('courses', Course::all());
        });

        Route::get('register', function() {
            return view('consultant.coursesManagement.register');
        });

        Route::post('register', 'Consultant\CoursesManagementController@create');

        Route::get('ajax/hrSelect/{company_id}', function($company_id) {

            if(\Request::ajax()) {
                return view('consultant.coursesManagement.ajax.hrSelect')
                    ->with('hrs', \App\Company::find($company_id)->hrs);
            }

        });

        Route::get('popups/curriculum', function() {
            return view('consultant.coursesManagement.popups.curriculum')
                ->with('course_main_curriculums', CourseMainCurriculum::all());
        });

        Route::get('ajax/subCurriculum/{course_main_curriculum_id}', function($course_main_curriculum_id) {

            if(\Request::ajax()) {
                return view('consultant.coursesManagement.ajax.subCurriculum')
                    ->with('course_main_curriculum', CourseMainCurriculum::find($course_main_curriculum_id));
            }

        });

        Route::get('ajax/studentsListMultiselect/{company_id}', function($company_id) {

            if(\Request::ajax()) {
                return view('consultant.coursesManagement.ajax.studentsListMultiselect')
                    ->with('company', \App\Company::find($company_id));
            }

        });

        Route::group(['prefix' => 'requestedCourses'], function() {

            Route::get('/', function() {
                return redirect('Consultant/coursesManagement/requestedCourses/index');
            });

            Route::get('index', 'Consultant\CoursesManagementRequestedCoursesController@index');

            Route::get('approve/{new_course_request_id}', 'Consultant\CoursesManagementRequestedCoursesController@approve');

            Route::get('show/{new_course_request_id}', function($new_course_request_id) {
                return view('consultant.coursesManagement.requestedCourses.show')
                    ->with('new_course_request', NewCourseRequest::find($new_course_request_id));
            });

            Route::get('modify/{new_course_request_id}', function($new_course_request_id) {
                return view('consultant.coursesManagement.requestedCourses.modify')
                    ->with('new_course_request', NewCourseRequest::find($new_course_request_id));
            });

            Route::post('modify/{new_course_request_id}', 'Consultant\CoursesManagementRequestedCoursesController@update');

            Route::get('reject/{new_course_request_id}', 'Consultant\CoursesManagementRequestedCoursesController@reject');

            Route::get('popups/curriculum', function() {
                return view('consultant.coursesManagement.requestedCourses.popups.curriculum')
                    ->with('course_main_curriculums', CourseMainCurriculum::all());
            });

            Route::get('ajax/subCurriculum/{course_main_curriculum_id}', function($course_main_curriculum_id) {

                if(\Request::ajax()) {
                    return view('consultant.coursesManagement.requestedCourses.ajax.subCurriculum')
                        ->with('course_main_curriculum', CourseMainCurriculum::find($course_main_curriculum_id));
                }

            });

        });

        Route::group(['prefix' => 'preCourses'], function() {

            Route::get('/', function() {
                return redirect('Consultant/coursesManagement/preCourses/index');
            });

            Route::get('index', 'Consultant\CoursesManagementPreCoursesController@index');

            Route::get('show/{pre_course_id}', function($pre_course_id) {
                return view('consultant.coursesManagement.preCourses.show')
                    ->with('pre_course', Course::find($pre_course_id));
            });

            Route::post('show/{pre_course_id}', 'Consultant\CoursesManagementPreCoursesController@complete');

            Route::get('signUpStudents/{pre_course_id}', function($pre_course_id) {
                return view('consultant.coursesManagement.preCourses.signUpStudents')
                    ->with('pre_course', Course::find($pre_course_id));
            });

            Route::post('signUpStudents/{pre_course_id}', 'Consultant\CoursesManagementPreCoursesController@signUpStudents');

            Route::get('removeStudents/{pre_course_id}', function($pre_course_id) {
                return view('consultant.coursesManagement.preCourses.removeStudents')
                    ->with('pre_course', Course::find($pre_course_id));
            });

            Route::post('removeStudents/{pre_course_id}', 'Consultant\CoursesManagementPreCoursesController@removeStudents');

            Route::get('register', function() {
                return view('consultant.coursesManagement.preCourses.register');
            });

            Route::post('register', 'Consultant\CoursesManagementPreCoursesController@create');

            Route::get('popups/curriculum', function() {
                return view('consultant.coursesManagement.preCourses.popups.curriculum')
                    ->with('course_main_curriculums', CourseMainCurriculum::all());
            });

            Route::get('ajax/subCurriculum/{course_main_curriculum_id}', function($course_main_curriculum_id) {

                if(\Request::ajax()) {
                    return view('consultant.coursesManagement.preCourses.ajax.subCurriculum')
                        ->with('course_main_curriculum', CourseMainCurriculum::find($course_main_curriculum_id));
                }

            });

            Route::get('ajax/hrSelect/{company_id}', function($company_id) {

                if(\Request::ajax()) {
                    return view('consultant.coursesManagement.preCourses.ajax.hrSelect')
                        ->with('hrs', \App\Company::find($company_id)->hrs);
                }

            });
        });

    });

    Route::group(['prefix' => 'usersManagement'], function() {

        Route::get('/', function() {
            return redirect('Consultant/usersManagement/index');
        });

        Route::get('index', function() {
            return view('consultant.usersManagement.index')
                ->with('students', Student::all())
                ->with('instructors', Instructor::all())
                ->with('hrs', Hr::all())
                ->with('consultants', Consultant::all());
        });

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

Route::group(['prefix' => 'Student', 'middleware' => ['auth', 'firstLogin', 'role']], function() {

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

    Route::group(['prefix' => 'testsManagement'], function() {

        Route::get('/', function() {
            return redirect('Student/testsManagement/index');
        });

        Route::get('index', function() {
            $current_user = \Auth::user();
            $current_student = Student::find($current_user->userable_id);
            return view('student.testsManagement.index')
                ->with('waiting_tests', $current_student->lvlTests()->where('status', 'w')->get())
                ->with('in_progress_tests', $current_student->lvlTests()->where('status', 'p')->get())
                ->with('completed_tests', $current_student->lvlTests()->where('status', 'c')->get());
        });

        Route::get('participate/{encrypted_test_id?}', function($encrypted_test_id = null) {
            $current_user = \Auth::user();
            $current_student = Student::find($current_user->userable_id);
            if(is_null($encrypted_test_id)) {
                return view('student.testsManagement.waitingTests')
                    ->with('waiting_tests', $current_student->lvlTests()->where('status', 'r')->get());
            }

            $lvl_test = LvlTest::find(\Crypt::decrypt($encrypted_test_id));

            if(is_null($lvl_test)) {
                \Flash::error('해당 테스트를 찾을 수 없습니다.');
                return redirect()->back();
            }

            return view('student.testsManagement.confirmStart')
                ->with('encrypted_test_id', $encrypted_test_id);
        });

        Route::post('participate/{encrypted_test_id}', 'Student\TestsManagementController@participate');

        Route::get('takeTest/{encrypted_test_id}', 'Student\TestsManagementController@takeTest');

        Route::post('takeTest/ajax/updateMcAnswer', 'Student\TestsManagementController@updateMcAnswer');

        Route::post('takeTest/ajax/pauseMcTest', 'Student\TestsManagementController@pauseMcTest');

        Route::post('takeTest/ajax/submitMcTest', 'Student\TestsManagementController@submitMcTest');

    });

});

Route::group(['prefix' => 'Hr', 'middleware' => ['auth', 'firstLogin', 'role']], function() {

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
                    ->with('course_main_curriculums', CourseMainCurriculum::all());
            });

            Route::get('ajax/subCurriculum/{course_main_curriculum_id}', function($course_main_curriculum_id) {
                if(\Request::ajax()) {
                    return view('hr.coursesManagement.newCourses.ajax.subCurriculum')
                        ->with('course_main_curriculum', CourseMainCurriculum::find($course_main_curriculum_id));
                }
            });

        });

    });

});

Route::group(['prefix' => 'Instructor', 'middleware' => ['auth', 'firstLogin', 'role']], function() {

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

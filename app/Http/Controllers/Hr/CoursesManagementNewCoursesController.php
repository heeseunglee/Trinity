<?php namespace App\Http\Controllers\Hr;

use App\CourseSubCurriculum;
use App\Hr;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewCourseRequest;
use App\NewCourseRequest;

class CoursesManagementNewCoursesController extends Controller {

	public function index() {
        return view('hr.coursesManagement.newCourses.index')
            ->with('new_course_requests', NewCourseRequest::all());
    }

    public function register() {
        return view('hr.coursesManagement.newCourses.register')
            ->with('current_user', \Auth::user());
    }

    public function create(CreateNewCourseRequest $request) {

        \DB::transaction(function() use($request){

            $current_user = \Auth::user();
            $new_course_request = new NewCourseRequest();

            $new_course_request->hr_id = $current_user->userable_id;
            $new_course_request->company_id = $current_user->userable->company->id;
            $new_course_request->course_type_id = $request->input('course_type_id');
            $new_course_request->estimated_size = $request->input('estimated_size');
            $new_course_request->instructor_visa_type_id = $request->input('instructor_visa_type_id');
            $new_course_request->instructor_gender = $request->input('instructor_gender');
            $new_course_request->instructor_career = $request->input('instructor_career');
            $new_course_request->start_datetime = $request->input('start_date').' '.$request->input('start_time');
            $new_course_request->end_datetime = $request->input('end_date').' '.$request->input('end_time');
            $new_course_request->meeting_datetime = $request->input('meeting_date').' '.$request->input('meeting_time');
            $new_course_request->running_days = implode(', ', $request->input('running_days'));
            $new_course_request->location = $request->input('location');
            $new_course_request->is_lvl_test = $request->input('is_lvl_test');
            $new_course_request->other_requests = $request->input('other_requests');

            $new_course_request->save();

            $curriculum_array = explode(', ', $request->input('curriculum'));
            foreach($curriculum_array as $curriculum) {
                $new_course_request->curriculums()->attach(CourseSubCurriculum::where('name', $curriculum)->first()->id);
            }

        });

        \Flash::success('새로운 클래스가 성공적으로 요청되었습니다.');
        return redirect('Hr/coursesManagement/newCourses/index');
    }

}

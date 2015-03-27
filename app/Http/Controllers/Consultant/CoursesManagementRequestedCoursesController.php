<?php namespace App\Http\Controllers\Consultant;

use App\Course;
use App\CourseSubCurriculum;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\UpdateNewCourseRequest;
use App\NewCourseRequest;
use Illuminate\Http\Request;

class CoursesManagementRequestedCoursesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('consultant.coursesManagement.requestedCourses.index')
            ->with('new_course_requests', NewCourseRequest::all());
	}

    public function approve($new_course_request_id) {

        \DB::transaction(function() use($new_course_request_id) {

            $current_user = \Auth::user();
            $new_course_request = NewCourseRequest::find($new_course_request_id);

            $new_course_request->status = 'ca';
            $new_course_request->approved_by = $current_user->userable_id;
            $new_course_request->save();

            $new_course = new Course();

            $new_course->is_pre_course = true;
            $new_course->is_lvl_test = $new_course_request->is_lvl_test;
            $new_course->name = $new_course_request->company->name.' '.$new_course_request->courseType->name.' '.'사전과정';
            $new_course->hr_id = $new_course_request->hr_id;
            $new_course->company_id = $new_course_request->company_id;
            $new_course->course_type_id = $new_course_request->course_type_id;
            $new_course->start_datetime = $new_course_request->start_datetime;
            $new_course->end_datetime = $new_course_request->end_datetime;
            $new_course->running_days = $new_course_request->running_days;
            $new_course->location = $new_course_request->location;
            $new_course->status = 'p';

            $new_course->save();

            $curriculum_id_array = array();
            foreach($new_course_request->curriculums()->get() as $curriculum) {
                $curriculum_id_array[] = $curriculum->id;
            }

            $new_course->curriculums()->sync($curriculum_id_array);

        });

        \Flash::success('클래스 요청 승인 완료');
        return redirect('Consultant/coursesManagement/index');

    }

    public function modify($new_course_request_id) {
        return view('consultant.coursesManagement.requestedCourses.modify')
            ->with('new_course_request', NewCourseRequest::find($new_course_request_id));
    }

    public function update($new_course_request_id, UpdateNewCourseRequest $request) {

        \DB::transaction(function() use($new_course_request_id, $request) {

            $new_course_request = NewCourseRequest::find($new_course_request_id);

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
            $curriculum_id_array = array();
            foreach($curriculum_array as $curriculum) {
                $curriculum_id_array[] = CourseSubCurriculum::where('name', $curriculum)->first()->id;
            }

            $new_course_request->curriculums()->sync($curriculum_id_array);

        });

        return redirect('Consultant/coursesManagement/requestedCourses/approve/'.$new_course_request_id);

    }

}

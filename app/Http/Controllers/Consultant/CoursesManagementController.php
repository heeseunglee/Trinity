<?php namespace App\Http\Controllers\Consultant;

use App\Course;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCourseRequest;

class CoursesManagementController extends Controller {

    public function create(CreateCourseRequest $request) {
//        array:19 [▼
//  "_token" => "5UsNuxsiUQ7JRRQ4KVksd4LSpB78W1FscuWaLlRL"
//  "company_id" => "1"
//  "hr_id" => "1"
//  "curriculum" => "직무특화 : 금융"
//  "course_type_id" => "1"
//  "name" => "CGV 금융중국어 입문 A 1차"
//  "start_date" => "2015-04-06"
//  "end_date" => "2015-05-29"
//  "start_time" => "07:00"
//  "end_time" => "08:00"
//  "running_days" => array:3 [▶]
//  "location" => "강남역 본사 강의장"
//  "is_lvl_test" => "1"
//  "mid_lvl_test_start_date" => "2015-04-27"
//  "mid_lvl_test_end_date" => "2015-05-01"
//  "final_lvl_test_start_date" => "2015-05-25"
//  "final_lvl_test_end_date" => "2015-05-29"
//  "instructor_id" => "1"
//  "students" => array:1 [▶]
//]

        $course = Course::where('name', $request->input('name'))->first();
        if(is_null($course)) {
            $new_course = new Course();
            $new_course->is_pre_course = false;
            $new_course->is_lvl_test = $request->input('is_lvl_test');
            $new_course->name = $request->input('name');
            $new_course->instructor_id = $request->input('instructor_id');
            $new_course->hr_id = $request->input('hr_id');
            $new_course->company_id = $request->input('company_id');
            $new_course->start_datetime = $request->input('start_date').' '.$request->input('start_time');
            $new_course->end_datetime = $request->input('end_date').' '.$request->input('end_time');
            $new_course->running_days = implode(', ', $request->input('running_days'));
            $new_course->location = $request->input('location');
            $new_course->status = 'r';

            \DB::transaction(function() use($new_course) {
                $new_course->save();
            });

        }

        \Flash::error('동일한 클래스 이름이 이미 존재합니다.');
        return redirect()->back()->withInput();
    }

}

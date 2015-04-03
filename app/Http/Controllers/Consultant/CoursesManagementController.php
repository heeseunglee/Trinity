<?php namespace App\Http\Controllers\Consultant;

use App\Course;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\LvlTest;
use App\LvlTestMc;
use App\LvlTestMcPoolBeginner;
use App\LvlTestMcPoolElementary;
use App\LvlTestMcPoolExpert;
use App\LvlTestMcPoolIntermediate;
use App\RunningCourse;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCourseRequest;

class CoursesManagementController extends Controller {

    public function create(CreateCourseRequest $request) {

        $course = Course::where('name', $request->input('name'))->first();
        if(is_null($course)) {
            $new_course = new Course();
            $new_course->is_pre_course = false;
            $new_course->is_lvl_test = $request->input('is_lvl_test');
            $new_course->name = $request->input('name');
            $new_course->instructor_id = $request->input('instructor_id');
            $new_course->hr_id = $request->input('hr_id');
            $new_course->company_id = $request->input('company_id');
            $new_course->course_type_id = $request->input('course_type_id');
            $new_course->start_datetime = $request->input('start_date').' '.$request->input('start_time');
            $new_course->end_datetime = $request->input('end_date').' '.$request->input('end_time');
            $new_course->running_days = implode(', ', $request->input('running_days'));
            $new_course->location = $request->input('location');
            $new_course->status = 'r';

            \DB::transaction(function() use($new_course) {
                $new_course->save();
            });

            $start= strtotime($request->input('start_date'));
            $end = strtotime($request->input('end_date'));
            $days_array = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

            for($date = $start, $session = 1;  $date <= $end; $date += 24*60*60) {
                foreach($request->input('running_days') as $running_day) {
                    if(date('l', $date) == $days_array[$running_day % 7]) {
                        $new_running_course = new RunningCourse();
                        $new_running_course->course_id = $new_course->id;
                        $new_running_course->session = $session;
                        $new_running_course->planned_start_datetime = date('Y-m-d', $date).' '.$request->input('start_time');
                        $new_running_course->planned_end_datetime = date('Y-m-d', $date).' '.$request->input('end_time');
                        $new_running_course->status = 'r';
                        $session++;
                        \DB::transaction(function() use($new_running_course) {
                            $new_running_course->save();
                        });
                    }
                }
            }

            \DB::transaction(function() use($new_course, $request) {
                foreach($request->input('students') as $student) {
                    if($new_course->is_lvl_test) {
                        $mid_lvl_test = $this->generateLvlTest(Student::find($student),
                            $new_course,
                            $request->input('mid_lvl_test_start_date'),
                            $request->input('mid_lvl_test_end_date'));
                        $final_lvl_test = $this->generateLvlTest(Student::find($student),
                            $new_course,
                            $request->input('final_lvl_test_start_date'),
                            $request->input('final_lvl_test_end_date'));
                        \DB::transaction(function() use($new_course, $student, $mid_lvl_test, $final_lvl_test) {
                            $new_course->students()->attach($student, ['mid_lvl_test_id' => $mid_lvl_test->id, 'final_lvl_test_id' => $final_lvl_test->id]);
                        });
                    }
                    else {
                        \DB::transaction(function() use($new_course, $student) {
                            $new_course->students()->attach($student);
                        });
                    }
                }
            });

            \Flash::success('성공적으로 클래스를 생성하였습니다.');
            return redirect('Consultant/coursesManagement/index');
        }

        \Flash::error('동일한 클래스 이름이 이미 존재합니다.');
        return redirect()->back()->withInput();
    }

    protected function generateLvlTest($student, $course, $start_date, $end_date) {
        $new_lvl_test = new LvlTest();

        $new_lvl_test->student_id = $student->id;
        $new_lvl_test->course_id = $course->id;
        $new_lvl_test->status = 'w';

        $new_lvl_test_mc = new LvlTestMc();

        $new_lvl_test_mc->status = 'r';

        $lvl_test_mc_pool_beginner_session_1 = LvlTestMcPoolBeginner::where('session', 1)
            ->orderByRaw("RAND()")->get();
        $lvl_test_mc_pool_beginner_session_2 = LvlTestMcPoolBeginner::where('session', 2)
            ->orderByRaw("RAND()")->get();
        $lvl_test_mc_pool_beginner_session_3 = LvlTestMcPoolBeginner::where('session', 3)
            ->orderByRaw("RAND()")->get();
        $lvl_test_mc_pool_beginner_session_4 = LvlTestMcPoolBeginner::where('session', 4)
            ->orderByRaw("RAND()")->get();

        $new_lvl_test_mc->question_1 = $lvl_test_mc_pool_beginner_session_1[0]->id;
        $new_lvl_test_mc->question_2 = $lvl_test_mc_pool_beginner_session_1[1]->id;
        $new_lvl_test_mc->question_3 = $lvl_test_mc_pool_beginner_session_2[0]->id;
        $new_lvl_test_mc->question_4 = $lvl_test_mc_pool_beginner_session_3[0]->id;
        $new_lvl_test_mc->question_5 = $lvl_test_mc_pool_beginner_session_4[0]->id;

        $lvl_test_mc_pool_elementary_session_1 = LvlTestMcPoolElementary::where('session', 1)
            ->orderByRaw("RAND()")->get();
        $lvl_test_mc_pool_elementary_session_2 = LvlTestMcPoolElementary::where('session', 2)
            ->orderByRaw("RAND()")->get();
        $lvl_test_mc_pool_elementary_session_3 = LvlTestMcPoolElementary::where('session', 3)
            ->orderByRaw("RAND()")->get();
        $lvl_test_mc_pool_elementary_session_4 = LvlTestMcPoolElementary::where('session', 4)
            ->orderByRaw("RAND()")->get();
        $lvl_test_mc_pool_elementary_session_5 = LvlTestMcPoolElementary::where('session', 5)
            ->orderByRaw("RAND()")->get();

        $new_lvl_test_mc->question_6 = $lvl_test_mc_pool_elementary_session_1[0]->id;
        $new_lvl_test_mc->question_7 = $lvl_test_mc_pool_elementary_session_2[0]->id;
        $new_lvl_test_mc->question_8 = $lvl_test_mc_pool_elementary_session_3[0]->id;
        $new_lvl_test_mc->question_9 = $lvl_test_mc_pool_elementary_session_4[0]->id;
        $new_lvl_test_mc->question_10 = $lvl_test_mc_pool_elementary_session_5[0]->id;

        $lvl_test_mc_pool_intermediate_session_1 = LvlTestMcPoolIntermediate::where('session', 1)
            ->orderByRaw("RAND()")->get();
        $lvl_test_mc_pool_intermediate_session_2 = LvlTestMcPoolIntermediate::where('session', 2)
            ->orderByRaw("RAND()")->get();
        $lvl_test_mc_pool_intermediate_session_3 = LvlTestMcPoolIntermediate::where('session', 3)
            ->orderByRaw("RAND()")->get();
        $lvl_test_mc_pool_intermediate_session_4 = LvlTestMcPoolIntermediate::where('session', 4)
            ->orderByRaw("RAND()")->get();

        $new_lvl_test_mc->question_11 = $lvl_test_mc_pool_intermediate_session_1[0]->id;
        $new_lvl_test_mc->question_12 = $lvl_test_mc_pool_intermediate_session_2[0]->id;
        $new_lvl_test_mc->question_13 = $lvl_test_mc_pool_intermediate_session_3[0]->id;
        $new_lvl_test_mc->question_14 = $lvl_test_mc_pool_intermediate_session_3[1]->id;
        $new_lvl_test_mc->question_15 = $lvl_test_mc_pool_intermediate_session_4[0]->id;

        $lvl_test_mc_pool_expert_session_1 = LvlTestMcPoolExpert::where('session', 1)
            ->orderByRaw("RAND()")->get();
        $lvl_test_mc_pool_expert_session_2 = LvlTestMcPoolExpert::where('session', 2)
            ->orderByRaw("RAND()")->get();
        $lvl_test_mc_pool_expert_session_3 = LvlTestMcPoolExpert::where('session', 3)
            ->orderByRaw("RAND()")->get();
        $lvl_test_mc_pool_expert_session_4 = LvlTestMcPoolExpert::where('session', 4)
            ->orderByRaw("RAND()")->get();

        $new_lvl_test_mc->question_16 = $lvl_test_mc_pool_expert_session_1[0]->id;
        $new_lvl_test_mc->question_17 = $lvl_test_mc_pool_expert_session_2[0]->id;
        $new_lvl_test_mc->question_18 = $lvl_test_mc_pool_expert_session_3[0]->id;
        $new_lvl_test_mc->question_19 = $lvl_test_mc_pool_expert_session_4[0]->id;
        $new_lvl_test_mc->question_20 = $lvl_test_mc_pool_expert_session_4[1]->id;

        \DB::transaction(function() use($new_lvl_test_mc) {
            $new_lvl_test_mc->save();
        });

        $new_lvl_test->lvl_test_mc_id = $new_lvl_test_mc->id;

        $new_lvl_test->start_date = $start_date;
        $new_lvl_test->end_date = $end_date;

        \DB::transaction(function() use($new_lvl_test, $student) {
            $new_lvl_test->save();
        });

        return $new_lvl_test;
    }

}

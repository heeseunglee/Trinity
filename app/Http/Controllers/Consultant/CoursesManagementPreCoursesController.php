<?php namespace App\Http\Controllers\Consultant;

use App\Company;
use App\Course;
use App\CourseSubCurriculum;
use App\CourseType;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreatePreCourseRequest;
use App\LvlTest;
use App\LvlTestMc;
use App\LvlTestMcPoolBeginner;
use App\LvlTestMcPoolElementary;
use App\LvlTestMcPoolExpert;
use App\LvlTestMcPoolIntermediate;
use App\NewCourseRequest;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\CourseStudentsSignUpRequest;
use App\Http\Requests\CourseStudentsRemoveRequest;

class CoursesManagementPreCoursesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('consultant.coursesManagement.preCourses.index')
            ->with('pre_courses', Course::where('is_pre_course', true)->get());
	}

	public function signUpStudents($pre_course_id, CourseStudentsSignUpRequest $request) {

        if(!(count($request->input('existing_students')) + $request->input('number_of_students'))) {
            \Flash::error('입력값을 확인해 주세요');
            return redirect()->back();
        }

        \DB::transaction(function() use($pre_course_id, $request) {
            $pre_course = Course::find($pre_course_id);
            $student_ids_array = array();
            $number_of_students = $request->input('number_of_students');
            $number_of_existing_students = count($request->input('existing_students'));

            foreach ($pre_course->students as $student) {
                $student_ids_array[] = $student->id;
            }

            if ($number_of_existing_students) {
                foreach ($request->input('existing_students') as $existing_student) {
                    $student_ids_array[] = $existing_student;
                }
            }

            for ($i = 1; $i <= $number_of_students; $i++) {
                $user = User::where('email', $request->input('email_' . $i))->first();
                if (is_null($user)) {
                    $new_student = new Student();
                    $new_student->company_id = $pre_course->company->id;
                    $new_student->save();
                    $new_student->user()->create([
                        'email' => $request->input('email_' . $i),
                        'name_kor' => $request->input('name_kor_' . $i),
                    ]);
                    $student_ids_array[] = $new_student->id;
                } else {
                    $student_ids_array[] = $user->userable_id;
                }
            }

            $pre_course->students()->sync($student_ids_array);
        });

        if(Course::find($pre_course_id)->is_lvl_test) {
            \DB::transaction(function() use($pre_course_id) {
                foreach(Course::find($pre_course_id)->students as $student) {
                    if(is_null($student->pivot->lvl_test_id)) {
                        $new_lvl_test = new LvlTest();

                        $new_lvl_test->student_id = $student->id;
                        $new_lvl_test->course_id = $pre_course_id;
                        $new_lvl_test->status = 'p';

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

                        $new_lvl_test_mc->save();

                        $new_lvl_test->lvl_test_mc_id = $new_lvl_test_mc->id;

                        $pre_course = Course::find($pre_course_id);

                        $new_lvl_test->start_date = explode(' ', $pre_course->start_datetime)[0];
                        $new_lvl_test->end_date = explode(' ', $pre_course->end_datetime)[0];

                        $new_lvl_test->save();

                        $student->pivot->lvl_test_id = $new_lvl_test->id;
                        $student->pivot->save();

                        // TODO : 학생 레벨테스트 생성 및 등록 후 메일 전송
                    }
                }
            });
        }

        \Flash::success('학생 등록이 성공적으로 완료되었습니다.');
        return redirect('Consultant/coursesManagement/preCourses/show/'.$pre_course_id);
    }

    public function removeStudents($pre_course_id, CourseStudentsRemoveRequest $request) {
        \DB::transaction(function() use($pre_course_id, $request) {

            $pre_course = Course::find($pre_course_id);

            foreach($request->input('students') as $student_id) {
                $pre_course->students()->detach($student_id);
                $student = Student::find($student_id);
                $lvl_test = $student->lvlTests()->where('course_id', $pre_course_id)->first();
                $lvl_test_mc_id = $lvl_test->lvl_test_mc_id;
                $lvl_test->delete();
                LvlTestMc::find($lvl_test_mc_id)->delete();
            }

        });

        \Flash::success('학생 등록취소가 성공적으로 완료되었습니다.');
        return redirect('Consultant/coursesManagement/preCourses/show/'.$pre_course_id);
    }

    public function create(CreatePreCourseRequest $request) {
        \DB::transaction(function() use($request){

            $current_user = \Auth::user();
            $new_course_request = new NewCourseRequest();

            $new_course_request->hr_id = $request->input('hr_id');
            $new_course_request->company_id = $request->input('company_id');
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
            $new_course_request->status = 'ca';
            $new_course_request->approved_by = $current_user->userable_id;

            $new_course_request->save();

            $curriculum_array = explode(', ', $request->input('curriculum'));
            $curriculum_id_array = array();
            foreach($curriculum_array as $curriculum) {
                $curriculum_id_array[] = CourseSubCurriculum::where('name', $curriculum)->first()->id;
            }

            $new_course_request->curriculums()->sync($curriculum_id_array);

            $new_pre_course = new Course();

            $new_pre_course->is_pre_course = true;
            $new_pre_course->is_lvl_test = $request->input('is_lvl_test');
            $new_pre_course->name = Company::find($request->input('company_id'))->name.' '.CourseType::find($request->input('course_type_id'))->name.' 사전과정';
            $new_pre_course->hr_id = $request->input('hr_id');
            $new_pre_course->company_id = $request->input('company_id');
            $new_pre_course->course_type_id = $request->input('course_type_id');

            $start_datetime = new \DateTime($request->input('pre_course_start_date'));
            $start_datetime->setTime(6, 0);
            $new_pre_course->start_datetime = $start_datetime;

            $end_datetime = new \DateTime($request->input('pre_course_end_date'));
            $end_datetime->setTime(21, 0);
            $new_pre_course->end_datetime = $end_datetime;

            $new_pre_course->running_days = implode(', ', $request->input('running_days'));
            $new_pre_course->location = $request->input('location');
            $new_pre_course->status = 'p';

            $new_pre_course->save();

            $new_course_request->pre_course_id = $new_pre_course->id;

            $new_course_request->save();

        });

        \Flash::success('새로운 클래스가 성공적으로 요청되었습니다.');
        return redirect('Consultant/coursesManagement/preCourses/index');
    }

    public function complete($pre_course_id) {

        $pre_course = Course::find($pre_course_id);

        if($pre_course->students()->count() < 1) {
            \Flash::error('학생 등록을 먼저 진행해 주시기 바랍니다.');
            return redirect()->back();
        }

        if($pre_course->is_lvl_test) {
            foreach($pre_course->students as $student) {
                if($student->lvlTests()->where('course_id', $pre_course_id)->first()->status != 'c') {
                    \Flash::error('입과 테스트를 완료하지 않은 학생이 있습니다. 테스트를 모두 완료하여 주시기 바랍니다.');
                    return redirect()->back();
                }
            }
        }

        $pre_course->status = 'c';

        \DB::transaction(function() use($pre_course) {
            $pre_course->save();
        });

        \Flash::success('성공적으로 Pre 클래스를 완료하였습니다. 클래스를 개설하여 주시기 바랍니다.');
        return redirect('Consultant/coursesManagement/register');
    }

}

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

                    $new_lvl_test->save();

                    $student->pivot->lvl_test_id = $new_lvl_test->id;
                    $student->pivot->save();

                    //TODO : 테스트 진행 메일 전송 + lvl_test 의 start_date end_date 설정
                }
           }
        });

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

}

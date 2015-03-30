<?php namespace App\Http\Controllers\Student;

use App\Course;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\LvlTest;
use App\LvlTestMcPoolBeginner;
use App\LvlTestMcPoolElementary;
use App\LvlTestMcPoolExpert;
use App\LvlTestMcPoolIntermediate;
use App\Student;
use Illuminate\Http\Request;

class TestsManagementController extends Controller {

    public function participate($encrypted_test_id) {
        \DB::transaction(function() use ($encrypted_test_id) {
            $test_id = \Crypt::decrypt($encrypted_test_id);
            $lvl_test = LvlTest::find($test_id);
            $lvl_test_mc = $lvl_test->lvlTestMc;
            $lvl_test_mc->started_at = new \DateTime('now');
            $lvl_test_mc->finished_at = new \DateTime('now');
            $lvl_test_mc->status = 'c';
            $lvl_test_mc->save();

            $lvl_test->status = 'c';
            $lvl_test->save();
        });
        return view('student.testsManagement.index');
    }

    public function takeTest($encrypted_test_id) {
        $test_id = \Crypt::decrypt($encrypted_test_id);
        $lvl_test = LvlTest::find($test_id);
        $lvl_test_mc = $lvl_test->lvlTestMc;

        \DB::transaction(function() use($encrypted_test_id, $lvl_test, $lvl_test_mc) {
            // TODO::LC

            // MC
            if($lvl_test_mc->status == 'r' or $lvl_test_mc->status == 'pa') {
                $lvl_test_mc->status = 'p';
                $lvl_test_mc->started_at = new \DateTime('now');
                $lvl_test_mc->save();
            }

            // TODO::WR

            // TODO::SP

            // 현재 예상 가능한 시나리오는 transaction 부분을 네부분으로 쪼개고
            // 해당하는 뷰를 계속 리턴시키고
            // 완료가 되면 takeTest 로 다시 redirect

        });

        return view('student.testsManagement.popups.takeTest')
            ->with('lvl_test', $lvl_test)
            ->with('lvl_test_mc', $lvl_test_mc)
            ->with('encrypted_test_id', $encrypted_test_id);
    }

    public function updateMcAnswer() {
        if(\Request::ajax()) {
            \DB::transaction(function() {
                $encrypted_test_id = \Request::input('encrypted_test_id');
                $test_id = \Crypt::decrypt($encrypted_test_id);
                $lvl_test = LvlTest::find($test_id);
                if(!is_null($lvl_test)) {
                    $lvl_test_mc = $lvl_test->lvlTestMc;

                    \DB::table('lvl_test_mcs')
                        ->where('id', $lvl_test_mc->id)
                        ->update(array('answer_'.\Request::input('answer_number') => \Request::input('answer')));

                    $lvl_test_mc->save();
                }
            });
        }
    }

    public function pauseMcTest() {
        if(\Request::ajax()) {
            \DB::transaction(function() {
                $encrypted_test_id = \Request::input('encrypted_test_id');
                $test_id = \Crypt::decrypt($encrypted_test_id);
                $lvl_test = LvlTest::find($test_id);
                if(!is_null($lvl_test)) {
                    $lvl_test_mc = $lvl_test->lvlTestMc;

                    \DB::table('lvl_test_mcs')
                        ->where('id', $lvl_test_mc->id)
                        ->update(['paused_at' => new \DateTime('now'), 'status' => 'pa']);

                    $lvl_test_mc->save();
                }
            });
        }
    }

    public function submitMcTest() {
        if(\Request::ajax()) {
            $encrypted_test_id = \Request::input('encrypted_test_id');
            $test_id = \Crypt::decrypt($encrypted_test_id);
            $lvl_test = LvlTest::find($test_id);

            if(!is_null($lvl_test)) {

                $lvl_test_mc = $lvl_test->lvlTestMc;

                if($lvl_test_mc->proceed_step == 0) {

                    $lvl_test_mc_result = $lvl_test->lvl_test_mc_result;
                    $lvl_test_mc_result += $this->scoreTheTest(1, 5, 1, $lvl_test_mc);
                    $lvl_test->lvl_test_mc_result = $lvl_test_mc_result;

                    \DB::transaction(function() use($lvl_test, $lvl_test_mc) {
                        $lvl_test_mc->save();
                        $lvl_test->save();
                    });

                    return view('student.testsManagement.popups.partials.takeTestElementary')
                        ->with('lvl_test', $lvl_test)
                        ->with('lvl_test_mc', $lvl_test_mc)
                        ->with('encrypted_test_id', $encrypted_test_id);

                }

                if($lvl_test_mc->proceed_step == 1) {

                    $lvl_test_mc_result = $lvl_test->lvl_test_mc_result;
                    $lvl_test_mc_result += $this->scoreTheTest(6, 10, 2, $lvl_test_mc);
                    $lvl_test->lvl_test_mc_result = $lvl_test_mc_result;

                    \DB::transaction(function() use($lvl_test, $lvl_test_mc) {
                        $lvl_test_mc->save();
                        $lvl_test->save();
                    });

                    return view('student.testsManagement.popups.partials.takeTestIntermediate')
                        ->with('lvl_test', $lvl_test)
                        ->with('lvl_test_mc', $lvl_test_mc)
                        ->with('encrypted_test_id', $encrypted_test_id);

                }

                if($lvl_test_mc->proceed_step == 2) {

                    $lvl_test_mc_result = $lvl_test->lvl_test_mc_result;
                    $lvl_test_mc_result += $this->scoreTheTest(11, 15, 3, $lvl_test_mc);
                    $lvl_test->lvl_test_mc_result = $lvl_test_mc_result;

                    \DB::transaction(function() use($lvl_test, $lvl_test_mc) {
                        $lvl_test_mc->save();
                        $lvl_test->save();
                    });

                    return view('student.testsManagement.popups.partials.takeTestExpert')
                        ->with('lvl_test', $lvl_test)
                        ->with('lvl_test_mc', $lvl_test_mc)
                        ->with('encrypted_test_id', $encrypted_test_id);

                }

                if($lvl_test_mc->proceed_step == 3) {

                    $lvl_test_mc_result = $lvl_test->lvl_test_mc_result;
                    $lvl_test_mc_result += $this->scoreTheTest(16, 20, 4, $lvl_test_mc);
                    $lvl_test->lvl_test_mc_result = $lvl_test_mc_result;

                    // TODO::여기서 아직 모든것을 종료시키지는 않는다! 시험 추가되면 수정해야됨

                    $lvl_test_mc->status = 'c';
                    $lvl_test->status = 'c';

                    \DB::transaction(function() use($lvl_test, $lvl_test_mc) {
                        $lvl_test_mc->save();
                        $lvl_test->save();
                    });

                    return view('student.testsManagement.completeTest');

                }

            }

        }

    }

    protected function scoreTheTest($num_start, $num_end, $score, $lvl_test_mc) {

        $lvl_test_mc_result = 0;

        for($i = $num_start; $i <= $num_end; $i++) {

            if($i == 13 or $i == 14) {
                $pool_id = \DB::table('lvl_test_mcs')
                    ->where('id', $lvl_test_mc->id)
                    ->pluck('question_'.$i);
                $answer_selected_1 = \DB::table('lvl_test_mcs')
                    ->where('id', $lvl_test_mc->id)
                    ->pluck('answer_'.$i.'1');
                $answer_selected_2 = \DB::table('lvl_test_mcs')
                    ->where('id', $lvl_test_mc->id)
                    ->pluck('answer_'.$i.'2');
                $answer_1 = LvlTestMcPoolIntermediate::find($pool_id)->answer;
                $answer_2 = LvlTestMcPoolIntermediate::find($pool_id)->answer_2;

                if($answer_selected_1 == $answer_1) {
                    $lvl_test_mc_result += floatval($score) / 2 ;
                }

                if($answer_selected_2 == $answer_2) {
                    $lvl_test_mc_result += floatval($score) / 2;
                }

            }
            else {
                $pool_id = \DB::table('lvl_test_mcs')
                    ->where('id', $lvl_test_mc->id)
                    ->pluck('question_'.$i);
                $answer_selected = \DB::table('lvl_test_mcs')
                    ->where('id', $lvl_test_mc->id)
                    ->pluck('answer_'.$i);

                if($num_end == 5) {
                    $answer = LvlTestMcPoolBeginner::find($pool_id)->answer;
                }
                if($num_end == 10) {
                    $answer = LvlTestMcPoolElementary::find($pool_id)->answer;
                }
                if($num_end == 15) {
                    $answer = LvlTestMcPoolIntermediate::find($pool_id)->answer;
                }
                if($num_end == 20) {
                    $answer = LvlTestMcPoolExpert::find($pool_id)->answer;
                }
                if($answer_selected == $answer) {
                    $lvl_test_mc_result += $score;
                }
            }

        }

        \DB::table('lvl_test_mcs')
            ->where('id', $lvl_test_mc->id)
            ->increment('proceed_step');

        return $lvl_test_mc_result;
    }

}

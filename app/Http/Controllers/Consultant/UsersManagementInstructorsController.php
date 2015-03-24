<?php namespace App\Http\Controllers\Consultant;

use App\Certificate;
use App\CourseMainCurriculum;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Instructor;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\CreateInstructorsRequest;

class UsersManagementInstructorsController extends Controller {

	public function index() {
        return view('consultant.usersManagement.instructors.index')
            ->with('instructors', Instructor::all());
    }

    public function register() {
        return view('consultant.usersManagement.instructors.register');
    }

    public function create(CreateInstructorsRequest $request) {
        $number_of_instructors = $request->input('number_of_instructors');
        $result_array = array();
        for($i = 1; $i <= $number_of_instructors; $i++) {
            $user = User::where('email', $request->input('email_'.$i))->first();
            if(!is_null($user)) {
                $result_array[$user->userable_id] = false;
            }
            else {
                $new_instructor = new Instructor();
                \DB::transaction(function() use ($request, $i, $result_array, $new_instructor) {
                    $new_instructor->save();
                    $new_instructor->user()->create([
                        'email' => $request->input('email_'.$i),
                        'name_kor' => $request->input('name_kor_'.$i),
                    ]);
                });
                $result_array[$new_instructor->id] = true;
            }
        }
        return view('consultant.usersManagement.instructors.createResult')
            ->with('result_array', $result_array);
    }

}

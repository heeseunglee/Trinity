<?php namespace App\Http\Controllers\Consultant;

use App\Company;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateStudentsRequest;
use App\Student;
use Illuminate\Http\Request;

class UsersManagementStudentsController extends Controller {

	public function index() {
        return view('consultant.usersManagement.students.index')
            ->with('students', Student::all());
    }

    public function register() {
        return view('consultant.usersManagement.students.register')
            ->with('companies', Company::all());
    }

    public function create(CreateStudentsRequest $request) {
        $number_of_students = $request->input('number_of_students');
        $company_id = $request->input('company_id');
        $result_array = array();
        for($i = 1; $i <= $number_of_students; $i++) {
            $user = User::where('email', $request->input('email_'.$i))->first();
            if(!is_null($user)) {
                $result_array[$user->userable_id] = false;
            }
            else {
                $new_student = null;
                \DB::transaction(function() use ($company_id, $request, $i, $result_array) {
                    $new_student = Student::create([
                        'company_id' => $company_id
                    ]);
                    $new_student->user()->create([
                        'email' => $request->input('email_'.$i),
                        'name_kor' => $request->input('name_kor_'.$i),
                    ]);
                });
                $result_array[$new_student->id] = true;
            }
        }
        return view('consultant.usersManagement.students.createResult')
            ->with('result_array', $result_array);
    }

}

<?php namespace App\Http\Controllers\Consultant;

use App\Company;
use App\Consultant;
use App\Hr;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateStudentsRequest;
use App\Instructor;
use App\Student;
use App\User;
use Illuminate\Http\Request;

class UsersManagementController extends Controller {

	public function index() {
        return view('consultant.usersManagement.index')
            ->with('students', Student::all())
            ->with('instructors', Instructor::all())
            ->with('hrs', Hr::all())
            ->with('consultants', Consultant::all());
    }

}

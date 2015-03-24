<?php namespace App\Http\Controllers\Student;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CoursesManagementController extends Controller {

	public function index() {
        return view('student.coursesManagement.index');
    }

}

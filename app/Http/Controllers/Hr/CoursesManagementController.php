<?php namespace App\Http\Controllers\Hr;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CoursesManagementController extends Controller {

	public function index() {
        return view('hr.coursesManagement.index');
    }

}

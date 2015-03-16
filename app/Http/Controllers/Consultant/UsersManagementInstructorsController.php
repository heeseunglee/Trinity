<?php namespace App\Http\Controllers\Consultant;

use App\Certificate;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Instructor;
use Illuminate\Http\Request;

class UsersManagementInstructorsController extends Controller {

	public function index() {
        return view('consultant.usersManagement.instructors.index')
            ->with('instructors', Instructor::all());
    }

    public function register() {
        return view('consultant.usersManagement.instructors.register');
    }

    public function certificatePopUp() {
        return view('consultant.usersManagement.instructors.popups.certificate');
    }

    public function otherCertificatePopUp() {
        return;
    }

    public function create() {

    }

}

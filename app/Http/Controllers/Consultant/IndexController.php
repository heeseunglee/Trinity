<?php namespace App\Http\Controllers\Consultant;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class IndexController extends Controller {

	public function index() {
        return redirect('Consultant/coursesManagement/index');
    }

}

<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Illuminate\Http\Request;
use Redirect;

class IndexController extends Controller {


    function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $current_user = Auth::user();
        $url_token = explode('\\', $current_user->userable_type);
        return Redirect::to($url_token[1].'/coursesManagement/index');
    }

}

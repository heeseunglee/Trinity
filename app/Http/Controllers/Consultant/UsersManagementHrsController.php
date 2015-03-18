<?php namespace App\Http\Controllers\Consultant;

use App\Company;
use App\Hr;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateHrsRequest;

use App\User;
use Illuminate\Http\Request;

class UsersManagementHrsController extends Controller {

    public function index() {

    }

    public function register() {
        return view('consultant.usersManagement.hrs.register')
            ->with('companies', Company::all());
    }

    public function create(CreateHrsRequest $request) {
        $number_of_hrs = $request->input('number_of_hrs');
        $company_id = $request->input('company_id');
        $consultant_id = \Auth::user()->userable_id;
        $result_array = array();
        for($i = 1; $i <= $number_of_hrs; $i++) {
            $user = User::where('email', $request->input('email_'.$i))->first();
            if(!is_null($user)) {
                $result_array[$user->userable_id] = false;
            }
            else {
                $new_hr = new Hr();
                \DB::transaction(function() use ($company_id, $consultant_id, $request, $i, $result_array, $new_hr) {
                    $new_hr->company_id = $company_id;
                    $new_hr->consultant_id = $consultant_id;
                    $new_hr->save();
                    $new_hr->user()->create([
                        'email' => $request->input('email_'.$i),
                        'name_kor' => $request->input('name_kor_'.$i),
                    ]);
                });
                $result_array[$new_hr->id] = true;
            }
        }
        return view('consultant.usersManagement.hrs.createResult')
            ->with('result_array', $result_array);
    }

}

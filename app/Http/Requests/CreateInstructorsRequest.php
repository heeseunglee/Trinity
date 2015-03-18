<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateInstructorsRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
        $current_user = \Auth::user();
        if($current_user->userable_type == 'App\Consultant') {
            return true;
        }
        return false;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
        $number_of_instructors = Request::input('number_of_instructors');
        $rules_array = array();
        for ($i = 1; $i <= $number_of_instructors; $i++) {
            $rules_array['name_kor_'.$i] = 'required';
            $rules_array['email_'.$i] = 'required|email';
        }
        return $rules_array;
	}

}

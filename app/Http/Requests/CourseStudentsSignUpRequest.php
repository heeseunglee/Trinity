<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CourseStudentsSignUpRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{

        $rules_array = array();
        if(count(Request::input('existing_students'))) {
            $rules_array['existing_students'] = 'required|array';
        }
        $number_of_students = Request::input('number_of_students');
        for ($i = 1; $i <= $number_of_students; $i++) {
            $rules_array['name_kor_'.$i] = 'required';
            $rules_array['email_'.$i] = 'required|email';
        }
        return $rules_array;
	}

}

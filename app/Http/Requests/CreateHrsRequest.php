<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateHrsRequest extends Request {

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
        $number_of_hrs = Request::input('number_of_hrs');
        $rules_array = array();
        $rules_array['company_id'] = 'required|exists:companies,id';
        for ($i = 1; $i <= $number_of_hrs; $i++) {
            $rules_array['name_kor_'.$i] = 'required';
            $rules_array['email_'.$i] = 'required|email';
        }
        return $rules_array;
	}

}

<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateConsultantsRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
        $current_user = \Auth::user();
        if($current_user->userable_type == 'App\Consultant' && $current_user->userable->is_admin) {
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
		return [
			//
		];
	}

}

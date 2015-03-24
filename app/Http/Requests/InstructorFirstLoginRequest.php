<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class InstructorFirstLoginRequest extends Request {

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
		return [
            'password' => 'required|confirmed',
            'name_eng' => 'required',
            'name_chn' => 'required',
            'phone_number' => 'required',
            'date_of_birth' => 'required',
            'bank_id' => 'required|exists:banks,id',
            'bank_account_number' => 'required',
            'gender' => 'required',
            'instructor_visa_type_id' => 'required|exists:instructor_visa_types,id',
            'certificate' => 'required',
            'academic_background_id' => 'required|exists:academic_backgrounds,id',
            'academic_background_detail' => 'required',
            'major' => 'required',
            'years_of_stay_in_china' => 'required',
            'career_years' => 'required',
            'curriculum' => 'required',
            'preferred_area' => 'required',
            'available_morning_from' => 'required_with:available_morning_to',
            'available_morning_to' => 'required_with:available_morning_from',
            'available_afternoon_from' => 'required_with:available_afternoon_to',
            'available_afternoon_to' => 'required_with:available_afternoon_from',
            'available_night_from' => 'required_with:available_night_to',
            'available_night_to' => 'required_with:available_night_from',
            'profile_image' => 'required|image'
		];
	}

}

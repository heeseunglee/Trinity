<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateCourseRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
        if(\Auth::user()->userable_type == 'App\Consultant') {
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
            "company_id" => "required|integer|exists:companies,id",
            "hr_id" => "required|integer|exists:hrs,id",
            "curriculum" => "required",
            "course_type_id" => "required|integer",
            "name" => "required",
            "start_date" => "required|date_format:Y-m-d",
            "end_date" => "required|date_format:Y-m-d",
            "start_time" => "required|date_format:H:i",
            "end_time" => "required|date_format:H:i",
            "running_days" => "required|array",
            "location" => "required",
            "is_lvl_test" => "required|boolean",
            "mid_lvl_test_start_date" => "required_if:is_lvl_test,1|date_format:Y-m-d",
            "mid_lvl_test_end_date" => "required_if:is_lvl_test,1|date_format:Y-m-d",
            "final_lvl_test_start_date" => "required_if:is_lvl_test,1|date_format:Y-m-d",
            "final_lvl_test_end_date" => "required_if:is_lvl_test,1|date_format:Y-m-d",
            "instructor_id" => "required|integer|exists:instructors,id",
            "students" => "required|array",
		];
	}

}

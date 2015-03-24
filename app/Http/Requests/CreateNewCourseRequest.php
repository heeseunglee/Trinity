<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateNewCourseRequest extends Request {

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
            "curriculum" => "required",
            "course_type_id" => "required|integer",
            "estimated_size" => "required|integer",
            "instructor_visa_type_id" => "required|integer",
            "instructor_gender" => "required|alpha",
            "instructor_career" => "required|integer",
            "start_date" => "required|date_format:Y-m-d",
            "end_date" => "required|date_format:Y-m-d",
            "meeting_date" => "required|date_format:Y-m-d",
            "start_time" => "required|date_format:H:i",
            "end_time" => "required|date_format:H:i",
            "meeting_time" => "required|date_format:H:i",
            "running_days" => "required|array",
            "location" => "required",
            "is_lvl_test" => "required|boolean",
		];
	}

}

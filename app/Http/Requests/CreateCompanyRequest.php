<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateCompanyRequest extends Request {

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
            'name' => 'required',
            'postcode_1' => 'required',
            'postcode_2' => 'required',
            'address_1' => 'required',
            'address_2' => 'required',
            'contact_email' => 'required|email',
            'contact_number_1' => 'required',
            'logo_image' => 'required|image|image_size:500,500'
		];
	}

}

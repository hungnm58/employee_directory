<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class DepartmentRequest extends Request {

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
			'txtName'       =>      'required|unique:departments,name',
			'txtPhone'      =>      'required|numeric'
		];
	}

	public function message() {
		return [
			'txtName.required'      =>      'Please enter the name',
			'txtName.unique'        =>      'This name is exists',
			'txtPhone.required'     =>      'Please enter the phone number',
			'txtPhone.numeric'      =>      'Phone number is not true'
		];
	}
}

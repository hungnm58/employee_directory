<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\DepartmentRequest;
use App\Department;

class DepartmentController extends Controller {

	public function getList() {
		return view('admin.department.list');
	}

	public function getAdd() {
		return view('admin.department.add');
	}

	public function postAdd(DepartmentRequest $request) {
		$depart = new Department();
		$depart->name = $request->txtName;
		$depart->office_phone = $request->txtPhone;
		$depart->em_id = 1;
		$depart->save();
		return redirect()->route('admin.department.list')->with(['flash_message' => 'Success! Complete add department']);
	}

}

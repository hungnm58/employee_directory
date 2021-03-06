<?php namespace App\Http\Controllers;

use App\Employee;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\DepartmentRequest;
use App\Department;

class DepartmentController extends Controller {

	public function getList() {
		$data = Department::select('id','name','office_phone','em_id')->orderBy('name','ASC')->get()->toArray();
		return view('admin.department.list',compact('data'));
	}

	public function getAdd() {
		$data = Employee::select('id','name','depart_id')->get()->toArray();
		return view('admin.department.add',compact('data'));
	}

	public function postAdd(DepartmentRequest $request) {
		$depart = new Department();
		$depart->name = $request->txtName;
		$depart->office_phone = $request->txtPhone;
		$depart->em_id = $request->txtManager;
		$depart->save();
		return redirect()->route('admin.department.list')->with(['flash_message' => 'Success! Complete add department']);
	}

	public function getDelete($id) {
		$depart = Department::find($id);
		$depart->delete($id);
		return redirect()->route('admin.department.list')->with(['flash_message' => 'Success! Complete delete department']);
	}

	public function getEdit($id) {
		$emp = Employee::select('id','name','depart_id')->get()->toArray();
		$data = Department::find($id)->toArray();
		return view('admin.department.edit',compact('data','id','emp'));
	}

	public function postEdit(Request $request,$id) {
		$this->validate($request,
			[
				"txtName" => "required",
				"txtPhone" => "required"
			]
		);
		$depart = Department::find($id);
		$depart->name = $request->txtName;
		$depart->office_phone = $request->txtPhone;
		$depart->em_id = $request->txtManager;
		$depart->save();
		return redirect()->route('admin.department.list')->with(['flash_message' => 'Success! Complete edit department']);
	}

	public function getView($id) {
		$data = Employee::select('id','name','job_title','email')->where('depart_id','=',$id)->get()->toArray();
		return view('admin.department.view',compact('data'));
	}
}

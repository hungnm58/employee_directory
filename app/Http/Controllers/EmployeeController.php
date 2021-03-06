<?php namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use Input;

class EmployeeController extends Controller {
	public function getList() {
		$data = Employee::select('id','name','image','job_title','cell_phone','email','depart_id')->get()->toArray();
		return view('admin.employee.list',compact('data'));
	}

	public function getAdd() {
		$depart = Department::select('name','id','em_id')->get()->toArray();
		return view('admin.employee.add',compact('depart'));
	}

	public function postAdd(EmployeeRequest $request) {
		$filename = $request->file('fImage')->getClientOriginalName();
		$employee = new Employee();
		$employee->name = $request->txtName;
		$employee->image = $filename;
		$employee->job_title = $request->txtJobTitle;
		$employee->cell_phone = $request->txtCellPhone;
		$employee->email = $request->txtEmail;
		$employee->depart_id = $request->txtDepartment;
		$request->file('fImage')->move('resources/uploads',$filename);
		$employee->save();
		return redirect()->route('admin.employee.list')->with(['flash_message' => 'Success! Complete add employee']);
	}

	public function getDelete($id) {
		$emp = Employee::find($id);
		$emp->delete($id);
		return redirect()->route('admin.employee.list')->with(['flash_message' => 'Success! Complete add employee']);
	}

	public function getEdit($id) {
		$depart = Department::select('name','id')->get()->toArray();
		$data = Employee::find($id);
		return view('admin.employee.edit',compact('data','depart'));
	}

	public function postEdit(Request $request, $id) {
		$employee = Employee::find($id);
		$employee->name = $request->txtName;
		$employee->job_title = $request->txtJobTitle;
		$employee->cell_phone = $request->txtCellPhone;
		$employee->email = $request->txtEmail;
		$employee->depart_id = $request->txtDepartment;

		if(!empty($request->file('fImage'))) {
			$filename=$request->file('fImage')->getClientOriginalName();
			$employee->image = $filename;
			$request->file('fImage')->move('resources/uploads',$filename);
		}
		$employee->save();
		return redirect()->route('admin.employee.list')->with(['flash_message' => 'Success! Complete add employee']);
	}

}

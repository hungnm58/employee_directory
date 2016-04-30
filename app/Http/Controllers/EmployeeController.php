<?php namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller {

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
		//return redirect()->route('admin.employee.list')->with(['flash_message' => 'Success! Complete add employee']);
	}

}

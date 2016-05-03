<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Hash;

class UserController extends Controller {

	public function getList(){
		$data = User::select('id','username','password','email')->get()->toArray();
		return view('admin.user.list',compact('data'));
	}

	public function getAdd(){
		return view('admin.user.add');
	}

	public function postAdd(UserRequest $request){
		$user = new User();
		$user->username = $request->txtUser;
		$user->password = Hash::make($request->txtPass);
		$user->email = $request->txtEmail;
		$user->remember_token = $request->_token;
		$user->save();
		return redirect()->route('admin.user.list')->with(['flash_level' => 'success','flash_message' => 'Complete add user']);
	}

	public function getDelete($id){
		$user = User::find($id);
		$user->delete($id);
		return redirect()->route('admin.user.list')->with(['flash_level' => 'success','flash_message' => 'Complete delete user']);
	}

	public function getEdit($id){
		$data = User::find($id)->toArray();
		return view('admin.user.edit',compact('data'));
	}

	public function postEdit($id,Request $request){
		$this->validate($request,[
			'txtPass'       =>      'required|min:8',
			'txtRePass'     =>      'required|same:txtPass',
			//'txtEmail'      =>      'required|regex:/^[a-z][a-z0-9]*(_[a-z0-9]+)*(\.[a-z0-9]+)*@[a-z0-9]([a-z0-9-][a-z0-9]+)*(\.[a-z]{2,4}){1,2}$/'
		]);
		$user = User::find($id);
		$user->password = Hash::make($request->txtPass);
		$user->save();
		return redirect()->route('admin.user.list')->with(['flash_level' => 'success','flash_message' => 'Complete add user']);
	}
}

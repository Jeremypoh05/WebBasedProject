<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin; 

class AdminController extends Controller
{
    // Login view
    public function login(){
        return view('backend.login'); //since the login file is inside the backend folder
    }

    // Submit login
    public function submitLogin(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $userCheck=Admin::where(['username'=>$request->username,'password'=>$request->password])->count();
    	if($userCheck>0){
            $adminData=Admin::where(['username'=>$request->username,'password'=>$request->password])->first();
    		return redirect('admin/dashboard');
    	}else{
    		return redirect('admin/login')->with('Invalid username or password!');
    	}
    }

    // Dashboard
    public function dashboard(){
    	return view('backend.dashboard');
    }
}

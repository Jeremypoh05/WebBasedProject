<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin; 
use Session;
use Auth;

class AdminController extends Controller
{
    public function __contruct(){
        $this->middleware('auth');
    } 

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
            session(['adminData'=>$adminData]);
    		return redirect('admin/dashboard');
    	}else{
            Session::flash('error','Invalid username or password');
    		return redirect('admin/login');
    	}
    }

    // Dashboard
    public function dashboard(){
    	return view('backend.dashboard');
    }

    // Logout
    function logout(){
        session()->forget(['adminData']);
        return redirect('admin/login');
    }
}

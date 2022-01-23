<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin; 
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
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
    function showDashboard(){
        $posts=Post::orderBy('id','desc')->get();
    	return view('backend.dashboard',['posts'=>$posts]);
    }

     // Show all users
     function showUsers(){
        $data=User::orderBy('id','desc')->get();
        return view('backend.user.index',['data'=>$data]);
    }

    public function delete_user($id)
    {
        User::where('id',$id)->delete();
        return redirect('admin/user');
    }


    // Show all comments
    function showComments(){
        $data=Comment::orderBy('id','desc')->get();
        return view('backend.comment.index',['data'=>$data]);
    }

    //delete comments from dashboard
    public function delete_comment($id)
    {
        Comment::where('id',$id)->delete();
        return redirect('admin/comment');
    }

    // Logout
    function logout(){
        session()->forget(['adminData']);
        return redirect('admin/login');
    }
}

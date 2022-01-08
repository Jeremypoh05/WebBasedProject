<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use DB;

class HomeController extends Controller
{
    public function home(){
    	// $posts=Post::orderBy('id','desc')->simplePaginate(1);
    	
    		$posts=Post::orderBy('id','desc')->paginate(2);
            return view('home')->with('posts',$posts);
    }

    public function searchPost(){
        $data=request();
        $keyword=$data->keyword; 
        //select the Database table （products) where the name is same as the keyword
        //keyword is the input type(name) that declared in the layout.blade so every interface
        //can use this search function
        $posts=DB::table('posts')->where('title','like','%'.$keyword.'%')->paginate(10);
        return view('home')->with('posts',$posts); 
    }

     // Post Detail
     public function detail(Request $request,$slug,$postId){
    	$detail=Post::find($postId);
    	return view('viewDetail',['detail'=>$detail]);
    }

}

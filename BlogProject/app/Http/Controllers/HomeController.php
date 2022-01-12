<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use DB;

class HomeController extends Controller
{
    public function index(Request $request){
    	// $posts=Post::orderBy('id','desc')->simplePaginate(1);
        // Used for Searching !!! //
    	if($request->has('keyword')){
    		$keyword=$request->keyword;
            $posts=Post::where('title','like','%'.$keyword.'%')->orderBy('id','desc')->get();
        }else{
    		$posts=Post::orderBy('id','desc')->paginate(4);
        }
            return view('home',['posts'=>$posts]);
           // return view('home')->with('posts',$posts);
    }

    // public function searchPost(){
    //    $data=request();
    //    $keyword=$data->keyword; 
    //    select the Database table （products) where the name is same as the keyword
    //    keyword is the input type(name) that declared in the layout.blade so every interface
    //    can use this search function
    //    $posts=DB::table('posts')->where('title','like','%'.$keyword.'%')->paginate(10);
    //   return view('home')->with('posts',$posts); 
    //}

     // Post Detail
     public function detail(Request $request,$slug,$postId){
        // Update post count
        Post::find($postId)->increment('views');
    	$detail=Post::find($postId);
    	return view('viewDetail',['detail'=>$detail]);
    }

     //Show All Categories
     public function all_category(){
        $categories=Category::orderBy('id','desc')->get();
        return view('AllCategories',['categories'=>$categories]);
    }

    // All posts according to the category
    public function category(Request $request,$cat_slug,$cat_id){
        $category=Category::find($cat_id);
        $posts=Post::where('cat_id',$cat_id)->orderBy('id','desc')->paginate(3);
        return view('category',['posts'=>$posts,'category'=>$category]);
    }

     // Save Comment
     public function save_comment(Request $request,$slug,$id){
        $request->validate([
            'comment'=>'required'
        ]);
        $data=new Comment;
        $data->user_id=$request->user()->id;
        $data->post_id=$id;
        $data->comment=$request->comment;
        $data->save();
        return redirect('viewDetail/'.$slug.'/'.$id)->with('success','Comment has been submitted.');
    }
}

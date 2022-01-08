<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use DB;

class HomeController extends Controller
{
    public function index(){
    	// $posts=Post::orderBy('id','desc')->simplePaginate(1);
    	
    		$posts=Post::orderBy('id','desc')->paginate(6);
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
        // Update post count
        Post::find($postId)->increment('views');
    	$detail=Post::find($postId);
    	return view('viewDetail',['detail'=>$detail]);
    }

     //Show All Categories
     public function all_category(){
        $categories=Category::orderBy('id','desc')->paginate(6);
        return view('AllCategories',['categories'=>$categories]);
    }

    // All posts according to the category
    public function category(Request $request,$cat_slug,$cat_id){
        $category=Category::find($cat_id);
        $posts=Post::where('cat_id',$cat_id)->orderBy('id','desc')->paginate(6);
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

     // User submit post
     public function save_post_form(){
        $cats=Category::all();
        return view('SavePostForm',['cats'=>$cats]);
    }

    // Save Data of the user's posting
    public function save_post_data(Request $request){
        $request->validate([
            'title'=>'required',
            'category'=>'required',
            'detail'=>'required',
        ]);

    // Post Thumbnail
        if($request->hasFile('post_thumb')){
            $image1=$request->file('post_thumb');
            $reThumbImage=time().'.'.$image1->getClientOriginalExtension();
            $dest1=public_path('/images/thumb');
            $image1->move($dest1,$reThumbImage);
        }else{
            $reThumbImage='na';
        }

          // Post Full Image
          if($request->hasFile('post_image')){
            $image2=$request->file('post_image');
            $reFullImage=time().'.'.$image2->getClientOriginalExtension();
            $dest2=public_path('/images/full');
            $image2->move($dest2,$reFullImage);
        }else{
            $reFullImage='na';
        }

        $post=new Post;
        $post->user_id=$request->user()->id;
        $post->cat_id=$request->category;
        $post->title=$request->title;
        $post->thumb=$reThumbImage;
        $post->full_img=$reFullImage;
        $post->detail=$request->detail;
        $post->tags=$request->tags;
        $post->status=1;
        $post->save();

        return redirect('save-post-form')->with('success','Post has been added');
    }
}

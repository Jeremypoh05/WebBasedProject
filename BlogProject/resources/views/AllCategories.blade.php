@extends('frontlayout')
@section('title','All Categories')
@section('content')

<!-- --------------------- All Categories Page ----------------- -->
<section class="container" id="">
	<div class="categories">
        <div class="site-content">
            <div class="row">
            @if(count($categories)>0)
            @foreach($categories as $category)
                <div class="box">
                    <a href="{{url('category/'.Str::slug($category->title).'/'.$category->id)}}">
                        <img src="{{asset('images/'.$category->image)}}" alt="{{$category->title}}">
                        <div class="content">
                    		<h4>{{$category->detail}}</h4>
                        <div class="title">
                            <h3><a href="{{url('category/'.Str::slug($category->title).'/'.$category->id)}}">{{$category->title}}</a></h3>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                    <p class="alert alert-danger">No Category Found</p>
                @endif
            </div>
            
        <aside class="sidebar">
        <!-- Search -->
            <div class="search-bar">
                <form action="{{url('/')}}">
                @csrf
                    <div class="fontuser">
                        <input type="text" name="keyword" placeholder="Searching...">
                        <i class="fas fa-search"></i>
                    </div>
                 </form>
            </div>
    
            <!--Popular Post-->
            <div class="Post">
                 <h2>Popular Post</h2>
                @if($popular_posts)
                 @foreach($popular_posts as $post)
                    <div class="post-content" data-aos="flip-up" data-aos-delay="200">
                        <div class="post-image">
                    		<div>
                        	<img src="{{asset('images/thumb/'.$post->thumb)}}" class="img" alt="">
                    		</div>
                   		 <div class="post-info flex-row">
                        		<span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;
                     			{{$post->created_at->format('d M Y ') }}</span>
                        		<span>{{$post->views}} Views</span>
                    		</div>
                        </div>
                        <div class="post-title">
                            <a href="{{url('viewDetail/'.Str::slug($post->title).'/'.$post->id)}}" 
                            class="list-group-item">{{$post->title}}</a>     
                        </div>  
						<hr>	
                        @endforeach
                        @endif	   
                    </div>
                </div>
        	</aside>
        </div>
	</div>
</section>

@endsection('content')
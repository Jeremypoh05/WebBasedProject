@extends('frontlayout')
@section('title',$detail->title)
@section('content')

	<!-- --------------------- View Post Detail ----------------- -->
	@if(Session::has('success'))
		<p class="text-success">{{session('success')}}</p>
	@endif
	<section class="container">
		<div class="post-detail">
        	<div class="site-content">
            <div class="post">
					<h1>{{$detail->title}}</h1>
					<img src="{{asset('images/full/'.$detail->full_img)}}" width="110%" class="card-img-top" alt="{{$detail->title}}">
					<div class="cat-views">
						<p class="float-right"> Categrory: <a href="{{url('category/'.Str::slug($detail->category->title).'/'.$detail->category->id)}}">
						{{$detail->category->title}}</a> <span>Total Views = {{$detail->views}}</span></p>
					</div>
					<div class="content">
						<p>{{$detail->detail}}</p>
					</div>
				@auth
				<!-- Add Comment -->
				<div class="text-area">
					<h5 class="title">Add Comment</h5>
					<div class="body">
						<form method="post" action="{{url('save-comment/'.Str::slug($detail->title).'/'.$detail->id)}}">
						@csrf
						<textarea name="comment"placeholder="Message..." class="form-control"></textarea>
						<br>
						<input type="submit" class="btn btn-secondary mt-2" />
					</div>
				</div>
                @endauth
                	<!-- Fetch Comments -->
				<div class="comment">
					<h5 class="title">Comments <span class="count">{{count($detail->comments)}}</span></h5>
					<hr>
					<div class="card-body">
						@if($detail->comments)
							@foreach($detail->comments as $comment)
								  <p class="comment-detail">{{$comment->comment}}</p>
								  @if($comment->user_id==0)
								  <span>Admin<span>
								  @else
								  <span>{{$comment->user->name}}</span>
								  @endif
								<hr/>
							@endforeach
						@endif
					</div>
				</div>
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

				   <!-- Recent Posts -->
				   <div class="Post">
                    <h2>Recent Post</h2>
					@if($recent_posts)
					@foreach($recent_posts as $post)
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
					@endforeach
					@endif
				</div>

				 <!-- Popular Posts -->
                    <div class="popular-post">
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
                        @endforeach
					    @endif	   
                    </div>
                      
                </aside>
			</div>
		</div>
	</section>


@endsection('content')
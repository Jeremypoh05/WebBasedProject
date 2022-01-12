@extends('frontlayout')
@section('title',$category->title)
@section('content')

<!-- ---------------------Particular Category Page ----------------- -->
	<h1 class="page-title">{{$category->title}}</h1>
        <section class="container" id="container">
            <div class="site-content">
                <div class="posts">
				@if(count($posts)>0)
				@foreach($posts as $post)
                    <div class="post-content" data-aos="zoom-in" data-aos-delay="200">
                        <div class="post-image">
                            <div>
								<img src="{{asset('images/thumb/'.$post->thumb)}}" class="img" alt="{{$post->title}}" />
                            </div>
                            <div class="post-info flex-row">
                                <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;Admin</span>
                                <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;
                                {{$post->created_at->format('d M Y ') }}</span>
                                <span>{{count($post->comments)}} Comment</span>
                            </div>
                        </div>
                        <div class="post-title">
						<a href="{{url('viewDetail/'.Str::slug($post->title).'/'.$post->id)}}">{{$post->title}}</a>
                            <p>{{$post->detail}} </p>
                            <a href="{{url('viewDetail/'.Str::slug($post->title).'/'.$post->id)}}">
								<button class="btn post-btn">Read More &nbsp; <i class="fas fa-arrow-right"></i></button></a>
                        </div>
                    </div>
                    <hr>
					@endforeach
					@else
					<p class="alert alert-danger">Comming Soon...</p>
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
                        @endforeach
					    @endif	   
                    </div>   
                </aside>
			</div>
        </div>
	</section>
		
@endsection('content')
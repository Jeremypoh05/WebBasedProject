@extends('frontlayout')
@section('content')
		<div class="row">
			<div class="col-md-8">
				<div class="row mb-5"> 
					@if(count($posts)>0)
						@foreach($posts as $post)
						<div class="col-md-4">
							<div class="card">
							<a href="{{url('viewDetail/'.Str::slug($post->title).'/'.$post->id)}}"><img src="{{asset('images/thumb/'.$post->thumb)}}" class="card-img-top" alt="{{$post->title}}" /></a>
							  <div class="card-body">
							    <h5 class="card-title"><a href="{{url('viewDetail/'.Str::slug($post->title).'/'.$post->id)}}">{{$post->title}}</a></h5>
							  </div>
							</div>
						</div>
						@endforeach
					@else
					<p class="alert alert-danger">No Post Found</p>
					@endif
				</div>
				<!-- Pagination -->
				{{ $posts->links('pagination::bootstrap-4') }}
			</div>
			<!-- Right SIdebar -->
			<div class="col-md-4">
				<!-- Search -->
				<div class="card mb-4">
					<h5 class="card-header">Search</h5>
					<div class="card-body">
						<form action="{{route('search.post')}}" method="POST">
						@csrf
							<div class="input-group">
							  <input type="text" name="keyword" class="form-control" />
							  <div class="input-group-append">
							    <button class="btn btn-dark" type="submit" id="button-addon2">Search</button>
							  </div>
							</div>
						</form>
					</div>
				</div>
				<!-- Recent Posts -->
				<div class="card mb-4">
					<h5 class="card-header">Recent Posts</h5>
					<div class="list-group list-group-flush">
					@if($recent_posts)
						@foreach($recent_posts as $post)
							<a href="#" class="list-group-item">{{$post->title}}	
							<img src="{{asset('images/thumb/'.$post->thumb)}}" width="200" height="150" alt=""/></a>
						
						@endforeach
					@endif
					</div>
				</div>
				<!-- Popular Posts -->
				<div class="card mb-4">
					<h5 class="card-header">Popular Posts</h5>
					<div class="list-group list-group-flush">
						<a href="#" class="list-group-item">Post 1</a>
						<a href="#" class="list-group-item">Post 2</a>
					</div>
				</div>
			</div>
		</div>
@endsection('content')
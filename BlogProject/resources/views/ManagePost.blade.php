@extends('frontlayout')
@section('title','Manage Posts')
@section('content')
		<div class="row">
			<div class="col-md-8 mb-5">
				<h3 class="mb-4">Manage Post</h3>
				<div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Category</th>
              <th>Title</th>
              <th>Image</th>
              <th>Full</th>
            </tr>
          </thead>
    
          <tbody>
              @foreach($data as $post)
              <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->category->title}}</td>
                <td>{{$post->title}}</td>
                <td><img src="{{ asset('images/thumb').'/'.$post->thumb }}" width="100" /></td>
                <td><img src="{{ asset('images/full').'/'.$post->full_img }}" width="100" /></td>
              </tr>
              @endforeach
          </tbody>
        </table>
        </div>
			</div>
			<!-- Right SIdebar -->
			<div class="col-md-4">
				<!-- Search -->
				<div class="card mb-4">
					<h5 class="card-header">Search</h5>
					<div class="card-body">
					<form action="{{url('/')}}">
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
								<a href="{{url('viewDetail/'.Str::slug($post->title).'/'.$post->id)}}" class="list-group-item">{{$post->title}}</a>
							@endforeach
						@endif
					</div>
				</div>
				<!-- Popular Posts -->
				<div class="card mb-4">
					<h5 class="card-header">Popular Posts</h5>
					<div class="list-group list-group-flush">
                    @if($popular_posts)
						@foreach($popular_posts as $post)
							<a href="{{url('viewDetail/'.Str::slug($post->title).'/'.$post->id)}}" class="list-group-item">{{$post->title}} <span class="badge badge-info float-right">{{$post->views}}</span></a>
						@endforeach
					@endif					
					</div>
				</div>
			</div>
		</div>
<!-- Page level plugin CSS-->
<link href="{{asset('backend')}}/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
<script src="{{asset('backend')}}/vendor/datatables/jquery.dataTables.js"></script>
<script src="{{asset('backend')}}/vendor/datatables/dataTables.bootstrap4.js"></script>
<script src="{{asset('backend')}}/js/demo/datatables-demo.js"></script>
@endsection('content')
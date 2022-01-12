<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="{{asset('css/all.css')}}">
	
	<!-- Custom Style   -->
	<link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- Bootstrap cdn  
	<link rel="stylesheet" type="text/css" href="{{asset('lib')}}/bs4/bootstrap.min.css" /> -->
    
    <!-- Jquery -->
    <script type="text/javascript" src="{{asset('lib')}}/jquery-3.5.1.min.js"></script>
    <!-- BS4 Js -->
    <script type="text/javascript" src="{{asset('lib')}}/bs4/bootstrap.bundle.min.js"></script>
</head>
<body>

 <!-- ----------------------------  Navigation ---------------------------------------------- -->

 <nav class="nav">
        <div class="nav-menu flex-row">
            <div class="nav-brand">
                <a href="{{url('/home')}}">JP's BLOG</a>
            </div>
            <div class="toggle-collapse">
                <div class="toggle-icons">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
            <div>
                <ul class="nav-items">
                    <li class="nav-link">
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-link">
                        <a href="{{url('all-categories')}}">Categories</a>
                    </li>
					@guest
                    <li class="nav-link">
                        <a href="{{url('login')}}">Login</a>
                    </li>
                    @else
					<li class="nav-link">
						<a class="nav-link" onclick="event.preventDefault(); 
						document.getElementById('logout-form').submit();" href="{{url('logout')}}">Logout</a>
             		</li>  
					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                	@csrf
             		</form>
		      		@endguest 
				</ul>
            </div>
            <div class="social">
                <a href="#" ><i class="fab fa-facebook-f" id="fb"></i></a>
                <a href="#" ><i class="fab fa-instagram" id="ig"></i></a>
                <a href="#" ><i class="fab fa-twitter" id="tt"></i></a>
                <a href="#" ><i class="fab fa-linkedin" id="ld"></i></i></a>
            </div>
        </div>
    </nav>

    <!-- ------------x---------------  Navigation --------------------------x------------------- -->

	<!--Content -->
	@yield('content')

 	<!-- Jquery Library file -->
 	<script type="text/javascript" src="{{ URL::asset('js/Jquery3.4.1.min.js') }}"></script>

	 <!-- --------- Owl-Carousel js ------------------->
	 <script type="text/javascript" src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>

	  <!-- ------------ AOS js Library  ------------------------- -->
	  <script type="text/javascript" src="{{ URL::asset('js/aos.js') }}"></script>

	<!-- Custom Javascript file -->
    <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
</body>
</html>


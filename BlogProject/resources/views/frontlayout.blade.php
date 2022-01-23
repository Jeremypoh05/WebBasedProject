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
                    <li class="nav-link">
                        <a href="{{url('contact')}}">Contact</a>
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


     <!-- --------------------------- Footer ---------------------------------------- -->
     <footer class="footer">
        <div class="containers">
            <div class="about-us" data-aos="fade-right" data-aos-delay="200">
                <h2>About us</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium quia atque nemo ad modi officiis
                    iure, autem nulla tenetur repellendus.</p>
            </div>
            <div class="newsletter" data-aos="fade-right" data-aos-delay="200">
                <h2>Newsletter</h2>
                <p>Stay update with our latest</p>
                <div class="form-element">
                    <input type="text" placeholder="Email"><span><i class="fas fa-chevron-right"></i></span>
                </div>
            </div>
            <div class="instagram" data-aos="fade-left" data-aos-delay="200">
                <h2>Instagram</h2>
                <div class="flex-row">
                    <img src="{{ asset('images/instagram/thumb-card3.png')}}" alt="insta1">
                    <img src="{{ asset('images/instagram/thumb-card4.png')}}" alt="insta2">
                    <img src="{{ asset('images/instagram/thumb-card5.png')}}" alt="insta3">
                </div>
                <div class="flex-row">
                    <img src="{{ asset('images/instagram/thumb-card6.png')}}" alt="insta4">
                    <img src="{{ asset('images/instagram/thumb-card7.png')}}" alt="insta5">
                    <img src="{{ asset('images/instagram/thumb-card8.png')}}" alt="insta6">
                </div>
            </div>
            <div class="follow" data-aos="fade-left" data-aos-delay="200">
                <h2>Follow us</h2>
                <p>Let us be Social</p>
                <div>
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>
        <div class="rights flex-row">
            <h4 class="text-gray">
                Copyright ©2021 All rights reserved | made by Web Based System-Group 2
            </h4>
        </div>
        <div class="move-up">
            <span><i class="fas fa-arrow-circle-up fa-2x"></i></span>
        </div>
    </footer>
    <!-- -------------x------------- Footer --------------------x------------------- -->


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


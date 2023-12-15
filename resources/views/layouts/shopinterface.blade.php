<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  {{-- <title>Thieves Thrift</title> --}}

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">
  
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="" />
  
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="{{ asset('assets2/plugins/themefisher-font/style.css') }}">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{ asset('assets2/plugins/bootstrap/css/bootstrap.min.css') }}">
  
  <!-- Animate css -->
  <link rel="stylesheet" href="{{ asset('assets2/plugins/animate/animate.css') }}">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="{{ asset('assets2/plugins/slick/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('assets2/plugins/slick/slick-theme.css') }}">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{ asset('assets2/css/style.css') }}">

</head>

<body id="body">

<!-- Start Top Header Bar -->
<section class="top-header">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-xs-12 col-sm-4">
				@guest
				<div class="contact-number">
					<i class=""></i>
					{{-- <span>{{ Auth::user()->name }}</span> --}}
				</div>
				@else
				<div class="nav-link">
					<i class=""></i>
					<a>{{ Auth::user()->name }}</a>
				</div>
				@endguest
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4 text-center" >
				<h1>Thieves Thrift</h1>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-3">
				<!-- Cart -->
				<ul class="top-menu text-right list-inline">
					<li class="dropdown cart-nav dropdown-slide">

					</li>
					@guest
					<li class="nav-item">
                        <a class="nav-link {{ (request()->is('register')) ? 'active' : '' }}" href="{{ route('register') }}">Sign Up</a>
						<a> | </a>
						<a class="nav-link {{ (request()->is('login')) ? 'active' : '' }}" href="{{ route('login') }}">Login</a>	
                    </li>
					@else
						<!-- Cart -->
						{{-- <a href="{{ url('show_cart') }}" class="btn btn-main btn-small">
							Cart
						<i class="tf-ion-android-cart"></i></a> --}}
						<!-- / Cart -->
					<li>
						<a href="#" id="logout-link"class="nav-link">
							Logout
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf						
						</form>
					</li>
					@endguest
					<!-- / Logout -->

				</ul><!-- / .nav .navbar-nav .navbar-right -->
			</div>
		</div>
	</div>
</section><!-- End Top Header Bar -->


<!-- Main Menu Section -->
<section class="menu">
	<nav class="navbar navigation">
		<div class="container">
			

			<!-- Navbar Links -->
			<div id="navbar" class="navbar-collapse collapse text-center">
				<ul class="nav navbar-nav">

					<!-- Home -->
					<li class="dropdown ">
						<a href="{{ url('home') }}">Home</a>
					</li><!-- / Home -->


					<!-- Shop -->
					<li class="dropdown dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false">Shop <span
								class="tf-ion-ios-arrow-down"></span></a>
						<div class="dropdown-menu">
							<div class="row">

								<!-- Basic -->
								<div class="col-lg-11 col-md-11 mb-sm-3">
									<ul>
										<li class="dropdown-header">Pages</li>
										<li role="separator" class="divider"></li>
										<li><a href="{{ route('shop') }}">Product</a></li>
										<li><a href="{{ url('show_cart') }}">Cart</a></li>
										<li><a href="{{ url('orders') }}">Orders</a></li>
									</ul>
								</div>
							</div><!-- / .row -->
						</div><!-- / .dropdown-menu -->
					</li><!-- / Elements -->


					<!-- My Profile -->
					<li class="dropdown dropdown-slide">
						<a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false">My Profile <span
								class="tf-ion-ios-arrow-down"></span></a>
						<div class="dropdown-menu">
							<div class="row">

								<!-- My Profile -->
								<div class="col-lg-11 col-md-11 mb-sm-3">
									<ul>
										<li class="dropdown-header">Pages</li>
										<li role="separator" class="divider"></li>
										<li><a href="{{ url('profile') }}">View Profile</a></li>

									</ul>
								</div>

							</div><!-- / .row -->
						</div><!-- / .dropdown-menu -->
					</li>
					<!-- / My Profile -->

					<!-- Admin -->
					@if(Auth::check() && Auth::user()->role == 'admin')
					<li class="dropdown dropdown-slide">
						<a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false">Admin <span
								class="tf-ion-ios-arrow-down"></span></a>
						<div class="dropdown-menu">
							<div class="row">

								<!-- Contact -->
								<div class="col-lg-11 col-md-11 mb-sm-3">								
									<ul>
										<li class="dropdown-header">Admin Pages</li>
										<li role="separator" class="divider"></li>
										<li><a href="{{ url('dashboard') }}">Dashboard</a></li>
									</ul>									
								</div>

							</div><!-- / .row -->
						</div><!-- / .dropdown-menu -->
					</li>
					@endif
					<!-- / Admin -->

				</ul><!-- / .nav .navbar-nav -->

			</div>
			<!--/.navbar-collapse -->
		</div><!-- / .container -->
	</nav>
</section>

@yield('header')
@yield('home')
@yield('orders')
@yield('content')
@yield('checkout')
@yield('confirmation')
@yield('profile')

{{-- <footer class="footer section text-center">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="social-media">
					
					<li>
						<a href="https://www.instagram.com/themefisher">
							<i class="tf-ion-social-instagram"></i>
						</a>
					</li>
					
				</ul>
				<ul class="footer-menu text-uppercase">
					<li>
						<a href="contact.html">CONTACT</a>
					</li>
					<li>
						<a href="{{ route('shop') }}">SHOP</a>
					</li>
					
					<li>
						<a href="contact.html">PRIVACY POLICY</a>
					</li>
				</ul>
				<p class="copyright-text">Copyright &copy;2021, Designed &amp; Developed by <a href="https://themefisher.com/">Themefisher</a></p>
			</div>
		</div>
	</div>
</footer> --}}

    <!-- 
    Essential Scripts
    =====================================-->
    
    <!-- Main jQuery -->
    <script src="{{ asset('assets2/plugins/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.1 -->
    <script src="{{ asset('assets2/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Bootstrap Touchpin -->
    <script src="{{ asset('assets2/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script>
    <!-- Instagram Feed Js -->
    <script src="{{ asset('assets2/plugins/instafeed/instafeed.min.js') }}"></script>
    <!-- Video Lightbox Plugin -->
    <script src="{{ asset('assets2/plugins/ekko-lightbox/dist/ekko-lightbox.min.js') }}"></script>
    <!-- Count Down Js -->
    <script src="{{ asset('assets2/plugins/syo-timer/build/jquery.syotimer.min.js') }}"></script>

    <!-- slick Carousel -->
    <script src="{{ asset('assets2/plugins/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets2/plugins/slick/slick-animation.min.js') }}"></script>

    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="{{ asset('assets2/plugins/google-map/gmap.js') }}"></script>

    <!-- Main Js File -->
    <script src="{{ asset('assets2/js/script.js') }}"></script>

	<!-- Logout -->
	<script>
		document.getElementById('logout-link').addEventListener('click', function(event) {
			event.preventDefault();
			document.getElementById('logout-form').submit();
		});
	</script>
    


  </body>
  </html>

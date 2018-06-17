<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Buy and Sell in Realtime on Panafri</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

         <!-- Styles -->
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
	
    </head>
<body>

      
	<div id="app" class="container">
			
	 <div  class="header">
	 
	 
			
			<div class="logo">
			
				<a href="http://panafri.com">  <img class="panafri-logo"  width="150px" height="auto" src="{{Storage::url('public/icons/panafri-logo.png')}}" alt="Panafri logo"></a>
			</div>
			
			
			<div id="showmenu" class="menu-bar" @click="showMenu()">
			
			<div class="bar1"></div>
			<div class="bar2"></div>
			<div class="bar3"></div>
			
			</div>
			
			<div id="hidemenu" class="menu-bar hidden" @click="hideMenu()">
			
			<div class="bar1"></div>
			<div class="bar2"></div>
			<div class="bar3"></div>
			
			</div>
			
			
			<div id="hide" class="hidden">
			
			
			
			
			<div  class="navigation-links">
				<li>
				<a id="delivery-link" href="{{ route('login') }}">Extra Money</a>
				</li>
				<li>
				<a id="sell-link" href="{{ route('login') }}">Join Sellers</a>
				</li>
				<li>
				<a id="login-link" href="{{ route('login') }}">Login</a>
				</li>
				<li>
				<a id="register-link" href="{{ route('register') }}">Register</a>
				</li>
			</div>
			
			
			
			
			<center>
			<div  class="welcome-search">
			
			
			<div class="fake-search-input">
			
			<span>Search Anything...Request Everything!</span>
			<img class="search-icon"  width="20px" height="auto" src="{{Storage::url('public/icons/search-icon.png')}}" alt="Search Icon">
			
			</div>
			
			</center>
			
			<!--Close hidden div-->
			</div>
			
			
			
		</div>
		
		
		<div class="content-body">
		<div class="categories">
			<center>
				<h1>Top Products</h1>
			</center>
		</div>
		
		
		<div class="categories">
			<center>
				<h1>Top Services</h1>
			</center>
		</div>
		
		<div class="categories">
			<center>
				<h1>Top Sellers</h1>
			</center>
		</div>
		
		<div class="categories">
			<center>
				<h1>Freelance Delivery</h1>
			</center>
		</div>
		
		<div class="categories">
			<center>
				<h1>How it Works</h1>
			</center>
		</div>
			
		
		</div>
			
	 </div>
		
		
		
		@yield('content')
   
		
	<!-- Scripts -->
	 <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/welcome.js') }}"></script>
</body>
</html>

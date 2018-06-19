<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Buy and Sell in Realtime on Panafri</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

         <!-- Styles -->
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
	
    </head>
<body>

<!--Begin Container class DIV-->
      
	<div id="app" class="container">

	
	<!--Begin header class DIV-->
	
	 <div  class="header">
	 
	 <!--Begin logo class DIV-->
			
			<div class="logo">
			
				<a href="http://panafri.com">  <img class="panafri-logo"  width="150px" height="auto" src="{{Storage::url('public/icons/panafri-logo.png')}}" alt="Panafri logo"></a>
			</div>
			
		 <!--End logo class DIV-->	
		 
		  <!--Creating Menu Icon from scatch with Css-->
		  
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
			
	 <!--End of Creating Menu Icon from scatch with Css-->
			
			
			 <!--Begin hidden class DIV-->
			
			<div id="hide" class="hidden">
			
			 <!--Begin navigation class DIV-->
			<div  class="navigation-links">
				
				
				<li>
				<a id="about-link" >About Us</a>
				</li>
				
				
				<li @click="startSellingModal()">
				<a id="sell-link" >Start Selling</a>
				</li>
				
				<li @click="freeLanceModal()">
				<a id="delivery-link" >Start Freelance Delivery</a>
				</li>
				
				<li @click="welcomeLoginModal()">
				<a id="login-link" >Login</a>
				</li>
				<li @click="welcomeRegisterModal()">
				<a id="register-link" >Register</a>
				</li>
			</div>
			
			
			<!--End of navigation class DIV-->
			
			
			<!--Begin welcome-search class DIV-->
			<center>
			<div  class="welcome-search" @click="showSearchModal()">
			
			
			<div class="fake-search-input">
			
			<span>Search Anything...Request Everything!</span>
			<img class="search-icon"  width="20px" height="auto" src="{{Storage::url('public/icons/search-icon.png')}}" alt="Search Icon">
			
			</div>
			
			</center>
			
			<!--End of welcome-search class DIV-->
			
			
			</div>
			
			<!--End of hidden class div-->
			
			
		</div>
		
		<!--End of header class div-->
		
		
		<!--Begin content-body class div-->
		
		<div class="content-body">
		
		<!--Begin categories class div-->
		
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
			
		<!--End of categories class div-->
		</div>
		
		<!--End of content-body class div-->
		
		
		
		<!--Begin search-page class div-->
		
		<div id="search-page" class="welcome-search-page hidden" @click="hideSearchModal()">
		<div class="close">
		x
		</div>
		<div class="search-message">
		Search for goods and services nearby in realtime...
		</div>
		
		<div class="search-box" @click.stop>
		
		<input type="text" name="search"  placeholder="Search anything... Request Everything" autofocus>
		
		</div>
		
		<img class="main-search-icon"  width="50px" height="auto" src="{{Storage::url('public/icons/search-icon.png')}}" alt="Search Icon" @click.stop />
		
		<img class="panafri-icon"  width="50px" height="auto" src="{{Storage::url('public/icons/panafri-icon.jpg')}}" alt="Panafri Icon" @click.stop />
		
		</div>
		
	<!--End of Search-page class div-->
	 
	 
	 <!--Begin start-selling class div-->

	
	 <div id="start-selling" 
	 class="start-selling {{old('register') ? ' ' : 'hidden' }}" @click="hideStartSellingModal()">
	
	 
	 <!--Begin form-container class div-->	
	  <div class="close">
		x
	 </div>
	 
	 <div class="form-container" @click.stop >
	
	 <div class="logo">
			
		<a href="http://panafri.com">  <img class="panafri-logo"  width="150px" height="auto" src="{{Storage::url('public/icons/panafri-logo.png')}}" alt="Panafri logo"></a>
	 </div>
	 <div class="form-message">
	 Sell to people nearby in realtime, we have freelance delivery personnel around to help you deliver to your customers.
	 </div>
	  <form class="start-selling-form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
	 
	 <table>
	 <tr><td></td><th><h3>Personal Information (<a class="learn-more">Read Data Policy</a>)</h3></th></tr>
	 <tr>
	 <td>First Name</td>
	 <td><input type="text" name="fname"  value="{{ old('fname') }}" required autofocus /></td>
	 </tr>
	 @if ($errors->has('fname'))
     <tr>
       <td><strong>{{ $errors->first('fname') }}</strong></td>
     </tr>
     @endif
	 
	 <tr>
	 <td>Middle Name</td>
	 <td><input type="text" name="mname"  value="{{ old('mname') }}"  /></td>
	 </tr>
	 @if ($errors->has('mname'))
     <tr>
      <td></td> <td><strong>{{ $errors->first('mname') }}</strong></td>
     </tr>
     @endif
	 
	 <tr>
	 <td>Last Name</td>
	 <td><input type="text" name="lname"  value="{{ old('lname') }}" required /></td>
	 </tr>
	 @if ($errors->has('lname'))
     <tr>
       <td></td> <td><strong>{{ $errors->first('lname') }}</strong></td>
     </tr>
     @endif
	 
	 <tr><td></td><th><h3>Private Information (<a class="learn-more">Read Data Policy</a>)</h3></th></tr>
	 <tr>
	 
	 <tr>
	 <td>Email</td>
	 <td><input type="email" name="email"  value="{{ old('email') }}" required /></td>
	 </tr>
	 @if ($errors->has('email'))
     <tr>
        <td></td><td><strong>{{ $errors->first('email') }}</strong></td>
     </tr>
     @endif
	 
	 <tr>
	 <td>Phone Number</td>
	 <td><input type="number" max="9999999999" name="phone"  value="{{ old('phone') }}" required /></td>
	 </tr>
	 @if ($errors->has('phone'))
     <tr>
       <td></td> <td><strong>{{ $errors->first('phone') }}</strong></td>
     </tr>
     @endif
	 
	 <tr><td></td><th><h3>Sensitive Information (<a class="learn-more">Read Data Policy</a>)</h3></th></tr>
	 <tr>
	 
	
	 <tr>
	 <td>Password</td>
	 <td><input  type="password"  name="password"  value="{{ old('password') }}" required /></td>
	 </tr>
	 @if ($errors->has('password'))
     <tr>
        <td></td><td><strong>{{ $errors->first('password') }}</strong></td>
     </tr>
     @endif
	 
	  <tr>
	 <td>Confrirm Password </td>
	 <td><input type="password"  name=" password_confirmation"  value="{{ old('password_confirmation') }}" required /></td>
	 </tr>
	 @if ($errors->has('password_confirmation'))
     <tr>
        <td></td><td><strong>{{ $errors->first('password_confirmation') }}</strong></td>
     </tr>
     @endif
	 
	 <tr>
        <td></td><td><strong>By clicking "Register and Sell" you agree that you are over 13 years of age and you accept our <a class="learn-more">Terms of Service</a> </strong></td>
     </tr>
	 
	 <tr>
	 <td></td>
	 <td><button type="submit">Register and Sell</button></td>
	 </tr>
	 
	 
	 </table>
	 
	  <input type="hidden" name="register" value="register">
	 </form>
	 
	 </div>
	 
	 <!--End of form-container class div-->
	 
	 </div>
	 
	  <!--End of start-selling class div-->
	  
	  
	  <!--Begin register class div-->

	
	 <div id="welcome-register" 
	 class="start-selling {{old('reg') ? ' ' : 'hidden' }}" @click="hideWelcomeRegisterModal()">
	
	 
	 <!--Begin form-container class div-->	
	  <div class="close">
		x
	 </div>
	 
	 <div class="form-container" @click.stop >
	
	 <div class="logo">
			
		<a href="http://panafri.com">  <img class="panafri-logo"  width="150px" height="auto" src="{{Storage::url('public/icons/panafri-logo.png')}}" alt="Panafri logo"></a>
	 </div>
	 <div class="form-message">
	When you register, we give you a dashboard to manage your transactions. You can also earn extra money by working as a freelance distributor.
	 </div>
	  <form class="start-selling-form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
	 
	 <table>
	 <tr><td></td><th><h3>Personal Information (<a class="learn-more">Read Data Policy</a>)</h3></th></tr>
	 <tr>
	 <td>First Name</td>
	 <td><input type="text" name="fname"  value="{{ old('fname') }}" required autofocus /></td>
	 </tr>
	 @if ($errors->has('fname'))
     <tr>
       <td><strong>{{ $errors->first('fname') }}</strong></td>
     </tr>
     @endif
	 
	 <tr>
	 <td>Middle Name</td>
	 <td><input type="text" name="mname"  value="{{ old('mname') }}"  /></td>
	 </tr>
	 @if ($errors->has('mname'))
     <tr>
      <td></td> <td><strong>{{ $errors->first('mname') }}</strong></td>
     </tr>
     @endif
	 
	 <tr>
	 <td>Last Name</td>
	 <td><input type="text" name="lname"  value="{{ old('lname') }}" required /></td>
	 </tr>
	 @if ($errors->has('lname'))
     <tr>
       <td></td> <td><strong>{{ $errors->first('lname') }}</strong></td>
     </tr>
     @endif
	 
	 <tr><td></td><th><h3>Private Information (<a class="learn-more">Read Data Policy</a>)</h3></th></tr>
	 <tr>
	 
	 <tr>
	 <td>Email</td>
	 <td><input type="email" name="email"  value="{{ old('email') }}" required /></td>
	 </tr>
	 @if ($errors->has('email'))
     <tr>
        <td></td><td><strong>{{ $errors->first('email') }}</strong></td>
     </tr>
     @endif
	 
	 <tr>
	 <td>Phone Number</td>
	 <td><input type="number" max="9999999999" name="phone"  value="{{ old('phone') }}" required /></td>
	 </tr>
	 @if ($errors->has('phone'))
     <tr>
       <td></td> <td><strong>{{ $errors->first('phone') }}</strong></td>
     </tr>
     @endif
	 
	 <tr><td></td><th><h3>Sensitive Information (<a class="learn-more">Read Data Policy</a>)</h3></th></tr>
	 <tr>
	 
	
	 <tr>
	 <td>Password</td>
	 <td><input  type="password"  name="password"  value="{{ old('password') }}" required /></td>
	 </tr>
	 @if ($errors->has('password'))
     <tr>
        <td></td><td><strong>{{ $errors->first('password') }}</strong></td>
     </tr>
     @endif
	 
	  <tr>
	 <td>Confrirm Password </td>
	 <td><input type="password"  name=" password_confirmation"  value="{{ old('password_confirmation') }}" required /></td>
	 </tr>
	 @if ($errors->has('password_confirmation'))
     <tr>
        <td></td><td><strong>{{ $errors->first('password_confirmation') }}</strong></td>
     </tr>
     @endif
	 
	 <tr>
        <td></td><td><strong>By clicking "Register" you agree that you are over 13 years of age and you accept our <a class="learn-more">Terms of Service</a> </strong></td>
     </tr>
	 
	 <tr>
	 <td></td>
	 <td><button type="submit">Register</button></td>
	 </tr>
	 
	 
	 </table>
	 
	  <input type="hidden" name="reg" value="register">
	 </form>
	 
	 </div>
	 
	 <!--End of form-container class div-->
	 
	 </div>
	 
	  <!--End of register class div-->
	  
	
	 <!--Begin welcome-login class div-->

	
	 <div id="welcome-login" 
	 class="start-selling {{old('login') ? ' ' : 'hidden' }}" @click="hideWelcomeLoginModal()">
	
	 
	 <!--Begin form-container class div-->	
	  <div class="close">
		x
	 </div>
	 
	 <div class="form-container" @click.stop >
	
	 <div class="logo">
			
		<a href="http://panafri.com">  <img class="panafri-logo"  width="150px" height="auto" src="{{Storage::url('public/icons/panafri-logo.png')}}" alt="Panafri logo"></a>
	 </div>
	 <div class="form-message">
	 When you login, you can buy and sell goods and services with people nearby in realtime right from your dashboard. You can also earn extra money by doing freelance delivery.
	 </div>
	  <form class="welcome-login-form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
	 
	 <table>
	 
	 <tr><td></td><th><h3>Private Information (<a class="learn-more">Read Data Policy</a>)</h3></th></tr>
	 <tr>
	 
	 <tr>
	 <td>Email</td>
	 <td><input type="email" name="email"  value="{{ old('email') }}" required /></td>
	 </tr>
	 @if ($errors->has('email'))
     <tr>
        <td></td><td><strong>{{ $errors->first('email') }}</strong></td>
     </tr>
     @endif

	 <tr><td></td><th><h3>Sensitive Information (<a class="learn-more">Read Data Policy</a>)</h3></th></tr>
	 <tr>
	 
	
	 <tr>
	 <td>Password</td>
	 <td><input  type="password"  name="password"  value="{{ old('password') }}" required /></td>
	 </tr>
	 @if ($errors->has('password'))
     <tr>
        <td></td><td><strong>{{ $errors->first('password') }}</strong></td>
     </tr>
     @endif
	 
	 
	 <tr>
        <td></td><td><strong>By clicking "Login" you agree that you are over 13 years of age and you accept our <a class="learn-more">Terms of Service</a> </strong></td>
     </tr>
	 
	 <tr>
	 <td></td>
	 <td><button type="submit">Login</button></td>
	 </tr>
	 
	 
	 </table>
	 
	  <input type="hidden" name="login" value="login">
	 </form>
	 
	 </div>
	 
	 <!--End of form-container class div-->
	 
	 </div>
	 
	  <!--End of welcome-login class div-->
	  
	  
	   <!--Begin start-freelance class div-->

	
	 <div id="freelance-delivery" 
	 class="start-selling {{old('freelance') ? ' ' : 'hidden' }}" @click="hideFreeLanceModal()">
	
	 
	 <!--Begin form-container class div-->	
	  <div class="close">
		x
	 </div>
	 
	 <div class="form-container" @click.stop >
	
	 <div class="logo">
			
		<a href="http://panafri.com">  <img class="panafri-logo"  width="150px" height="auto" src="{{Storage::url('public/icons/panafri-logo.png')}}" alt="Panafri logo"></a>
	 </div>
	 <div class="form-message">
	 Freelancers earn money by helping sellers transport goods to their customers. To become a freelancer, you need a verified account and a free dashboard to manage your clients.
	 </div>
	  <form class="start-freelancing-form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
	 
	 <table>
	 <tr><td></td><th><h3>Personal Information (<a class="learn-more">Read Data Policy</a>)</h3></th></tr>
	 <tr>
	 <td>First Name</td>
	 <td><input type="text" name="fname"  value="{{ old('fname') }}" required autofocus /></td>
	 </tr>
	 @if ($errors->has('fname'))
     <tr>
       <td><strong>{{ $errors->first('fname') }}</strong></td>
     </tr>
     @endif
	 
	 <tr>
	 <td>Middle Name</td>
	 <td><input type="text" name="mname"  value="{{ old('mname') }}"  /></td>
	 </tr>
	 @if ($errors->has('mname'))
     <tr>
      <td></td> <td><strong>{{ $errors->first('mname') }}</strong></td>
     </tr>
     @endif
	 
	 <tr>
	 <td>Last Name</td>
	 <td><input type="text" name="lname"  value="{{ old('lname') }}" required /></td>
	 </tr>
	 @if ($errors->has('lname'))
     <tr>
       <td></td> <td><strong>{{ $errors->first('lname') }}</strong></td>
     </tr>
     @endif
	 
	 <tr><td></td><th><h3>Private Information (<a class="learn-more">Read Data Policy</a>)</h3></th></tr>
	 <tr>
	 
	 <tr>
	 <td>Email</td>
	 <td><input type="email" name="email"  value="{{ old('email') }}" required /></td>
	 </tr>
	 @if ($errors->has('email'))
     <tr>
        <td></td><td><strong>{{ $errors->first('email') }}</strong></td>
     </tr>
     @endif
	 
	 <tr>
	 <td>Phone Number</td>
	 <td><input type="number" max="9999999999" name="phone"  value="{{ old('phone') }}" required /></td>
	 </tr>
	 @if ($errors->has('phone'))
     <tr>
       <td></td> <td><strong>{{ $errors->first('phone') }}</strong></td>
     </tr>
     @endif
	 
	 <tr><td></td><th><h3>Sensitive Information (<a class="learn-more">Read Data Policy</a>)</h3></th></tr>
	 <tr>
	 
	
	 <tr>
	 <td>Password</td>
	 <td><input  type="password"  name="password"  value="{{ old('password') }}" required /></td>
	 </tr>
	 @if ($errors->has('password'))
     <tr>
        <td></td><td><strong>{{ $errors->first('password') }}</strong></td>
     </tr>
     @endif
	 
	  <tr>
	 <td>Confrirm Password </td>
	 <td><input type="password"  name=" password_confirmation"  value="{{ old('password_confirmation') }}" required /></td>
	 </tr>
	 @if ($errors->has('password_confirmation'))
     <tr>
        <td></td><td><strong>{{ $errors->first('password_confirmation') }}</strong></td>
     </tr>
     @endif
	 
	 <tr>
        <td></td><td><strong>By clicking "Register and Deliver" you agree that you are over 13 years of age and you accept our <a class="learn-more">Terms of Service</a> </strong></td>
     </tr>
	 
	 <tr>
	 <td></td>
	 <td><button type="submit">Register and Deliver</button></td>
	 </tr>
	 
	 
	 </table>
	 
	  <input type="hidden" name="freelance" value="freelance">
	 </form>
	 
	 </div>
	 
	 <!--End of form-container class div-->
	 
	 </div>
	 
	   <!--End of start-freelance class div-->
	  
	  
	  </div>
	  
	 
	 <!--End of container class div-->
	
		
		@yield('content')
   
		
	<!-- Scripts -->
	 <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/welcome.js') }}"></script>
	
</body>
</html>

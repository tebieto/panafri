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
	
	 <!--Begin start-selling class div-->
	 
	 <div id="register-page" 
	 class="start-selling"  >
	
	 
	 <!--Begin form-container class div-->	
	  
	 
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
        <td></td><td><strong>By clicking "Register and Sell" you agree that you are over 13 years of age and you accept our <a class="learn-more">Terms of Service</a> </strong></td>
     </tr>
	 
	 <tr>
	 <td></td>
	 <td><button type="submit">Register and Sell</button></td>
	 </tr>
	 
	 
	 </table>
	 
	
	 </form>
	 
	 </div>
	 
	 <!--End of form-container class div-->
	 
	 </div>
	 
	  <!--End of start-selling class div-->
	
</div>
	 
	 <!--End of container class div-->
		
		
		
		@yield('content')
   
		
	<!-- Scripts -->
	 <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/welcome.js') }}"></script>
</body>
</html>
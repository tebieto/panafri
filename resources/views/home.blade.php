<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{auth::user()->fname}}'s Dashboard</title>

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
				
				@if(auth::user()->role > 0)
				<li @click="displayAdminCategory()">
				<a id="admin-link" >Admin Products</a>
				</li>
				
				
				
				<li @click="displayAdminSeller()">
				<a id="admin-link" >Admin Sellers</a>
				</li>
				@endif
				
				<li @click="freeLanceModal()">
				<a id="delivery-link" >Start Freelance Delivery</a>
				</li>
				
				<li @click="welcomeLoginModal()">
				<a id="login-link" >Login</a>
				</li>
				<li >
				<form method="post" action="/logout">
				{{ csrf_field() }}
				<button style="background: red; color: #fff; border:1px solid #fff; border-radius:10px; font-weight:bold; padding:5px; cursor:pointer" >Logout</button>
				</form>
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
		
		<div class="categories" v-if="this.store.length>0">
			<center>
				<h1>Your Products and Services</h1>
			</center>
			
			<!-- Begin Products Class -->
			
			<div class="products">
			 <div  v-for="item in store">
			
			 <img :src="item.image" height="200px" width="300px"  :alt="item.name" />
			
			 <div class="product-details">
			 <h2> <b> @{{item.name}} </b></h2>
			 @if(auth::user()->status == 5)
			 <button @click="removeProduct(item.id)">Remove</button>
			
			 @endif
			</div>
			
		</div>
		<!-- End Product in products Class -->
		</div>
		<!-- End of your product class-->
		</div>
		<!-- End of Categories class-->
		
		
		<!--Begin categories class div-->
		
		<div class="categories">
			<center>
				<h1>Top Products</h1>
			</center>
			
			<!-- Begin Products Class -->
			
			<div class="products">
			 <div  v-for="product in products" v-if="product.category_id != 3">
			
			 <img :src="product.image" height="200px" width="300px"  :alt="product.name" />
			
			 <div class="product-details" @click="authStore()">
			 <h2> <b> @{{product.name}} </b></h2>
			 @if(auth::user()->status == 5)
			 <sell-button :pid="product.id" :pname="product.name" :cid="product.category_id"></sell-button>
			 @else
			 <button>Buy @{{product.name}} Nearby</button>
			 @endif
			</div>
			
		</div>
		<!-- End Product in products Class -->
		</div>
		<!-- End of product class-->
		</div>
		<!-- End of Categories class-->
		
		
		<!-- Begin Category Class -->
		
		<div class="categories">
			<center>
				<h1>Top Services</h1>
			</center>
			
			<!-- Begin Products Class -->
			
			<div class="products">
			 <div  v-for="product in products" v-if="product.category_id == 3">
			
			 <img :src="product.image" height="200px" width="300px"  :alt="product.name" />
			
			 <div class="product-details" @click="authStore">
			 <h2> <b> @{{product.name}} </b></h2>
			 @if(auth::user()->status == 5)
			<sell-button :pid="product.id" :pname="product.name" :cid="product.category_id"></sell-button>
			 @else
			 <button>Hire @{{product.name}} Nearby</button>
			 @endif
			</div>
			
		</div>
		<!-- End Product Class -->
		</div>
		
		<!-- End Category Class -->
		
		
		<div class="categories">
			<center>
				<h1>Top Sellers</h1>
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
		
		<input type="text" name="search"  placeholder="Search anything... Request Everything" autofocus v-model="query" @keyup="searchProducts">
		
		</div>
		
		<img class="main-search-icon"  width="50px" height="auto" src="{{Storage::url('public/icons/search-icon.png')}}" alt="Search Icon" @click.stop />
		
		<img class="panafri-icon"  width="50px" height="auto" src="{{Storage::url('public/icons/panafri-icon.jpg')}}" alt="Panafri Icon" @click.stop />
		
		<!-- Begin Search Category Class -->
		
		<div class="categories">
			
			
			<!-- Begin Products Class -->
			
			<div class="products">
			 <div  v-for="product in results">
			
			 <img :src="product.image" height="200px" width="300px"  :alt="product.name" />
			
			 <div class="product-details" @click="authStore">
			 <h2> <b> @{{product.name}} </b></h2>
			 @if(auth::user()->status == 5)
			<sell-button :pid="product.id" :pname="product.name" :cid="product.category_id"></sell-button>
			 @else
			 <button>Hire @{{product.name}} Nearby</button>
			 @endif
			</div>
			
		</div>
		<!-- End Product Class -->
		</div>
		</div>
		<!-- End Search Category Class -->
		</div>
		
	<!--End of Search-page class div-->
	 
	 
	 <!--Begin admin-category class div-->

	
	 <div id="admin-category" 
	 class="start-selling {{old('admin') ? ' ' : 'hidden' }}" @click="hideAdminCategory()">
	
	 
	 <!--Begin form-container class div-->	
	  <div class="close">
		x
	 </div>
	 
	 <div class="form-container" @click.stop >
	
	 <div class="logo">
			
		<a href="http://panafri.com">  <img class="panafri-logo"  width="150px" height="auto" src="{{Storage::url('public/icons/panafri-logo.png')}}" alt="Panafri logo"></a>
	 </div>
	 <div class="form-message">
	 Hello Admin, Add Products and Categories
	 </div>
	 
	 <div class="form">
	 <table>
	 
	 <tr><td></td><th><h3>Enter New Products And Categories</h3></th></tr>
	 
	 
	 
	 <tr>
	 <td>Product Name</td>
	 <td><input type="text" name="product" placeholder="Enter product name" v-model="productName" >
	 </td>
	 </tr>
	 
	
	 
	 <tr>
	 <td>Choose Category</td>
	 <td><select name="ocategory" v-model="ocategory" >
	 <option value=''>Choose</option>
	 <option v-for="category in categories" :value="category.id">@{{category.name}}</option>
	 </select>
	 </td>
	 </tr>
	 
	  <tr>
	 <td>Create New Category</td>
	 <td><input type="text" name="ncategory" placeholder="Enter new category" v-model="ncategory" @keyup.enter="sendCategory">
	 </td>
	 </tr>
	 
	 <!-- Begin Adding image upload -->
	 
	 <div  id="uploadedContainer" v-if="productImage.length>0 || uploadDelay.length>0">
				 
				 <div class="showUploaded" v-for="file in productImage">
				 <div class="uploaded_file_container">
				 <img  v-if="file.type=='image'" class="uploadedFile" :src="file.URL" width="100" height="100"  alt="" />
				
				 <video v-if="file.type=='video'" class="uploadedFile" width="100" height="100" controls >
				 <source :src="file.URL" :type="file.mime">
				</video>
				 <div id="uploadInfo" ><span class="uploadDelete" @click="removeUploaded"><b>x</b></span></div>
			     </div>
				 <!-- Add Image Spinner -->
				 
				 <div class="spinner_wrapper" v-for=" file in uploadDelay">
				 <div class="spinner"></div>
				 </div>
	  </div>
				 
	 
	
	
	 <tr>
	 <td>Product Image</td>
	 <td>
	 <input type="file" ref="productimage"  style="display:none;" accept="image/*" v-on:change="imageChange">
				<span @click="showProductImagePicker" class="image-picker" title="Choose file"  ><img  id="" src="/storage/icons/photo_icon.png" width="15px" height="15px"  alt="" /><span class="photo_icon_text"><b> Select</b></span></span>
	 </td>
	 </tr>
	  <!-- End Adding image upload -->
	 <tr>
	 <td></td>
	 <td><button v-if="!show_post_spinner" class="addProductButton post_button" type="submit" @click="submitProduct()" :disabled="pdisabled">Add Product</button>
	<div class="post_spinner_wrapper" v-if="show_post_spinner">
	 <div class="post_spinner"></div>
	</div>
	 
	 
	 
	 </td>
	 </tr>
	 </table>
	
	  <input type="hidden" name="product" value="product">
	 
	  </div>
	  
	  <!--End of form class-->
	  
	 </div>
	 
	 <!--End of form-container class div-->
	 
	 </div>
	 
	 <!--End of admin-category class div-->
	  
	 
	 
	  <!--Begin admin-Seller class div-->

	
	 <div id="admin-seller" 
	 class="start-selling {{old('adminseller') ? ' ' : 'hidden' }}" @click="hideAdminSeller()">
	
	 
	 <!--Begin form-container class div-->	
	  <div class="close">
		x
	 </div>
	 
	 <div class="form-container" @click.stop >
	
	 <div class="logo">
			
		<a href="http://panafri.com">  <img class="panafri-logo"  width="150px" height="auto" src="{{Storage::url('public/icons/panafri-logo.png')}}" alt="Panafri logo"></a>
	 </div>
	 <div class="form-message">
	 Hello Admin, Add a new seller
	 </div>
	 
	 <div class="form">
	 <table>
	 
	 <tr><td></td><th><h3>Enter email of sellers to add them</h3></th></tr>
	 
	 
	 
	 <tr>
	 <td>Seller Email</td>
	 <td><input type="email" name="product" placeholder="Enter seller Email" v-model="sellerEmail" >
	 </td>
	 </tr>
	 
	 <tr>
	 <td>Admin Email</td>
	 <td><input type="email" name="adminemail" placeholder="Enter your email" v-model="adminEmail" >
	 </td>
	 </tr>
	 
	 
	 
	
	 
	 <!-- Begin Adding image upload -->
	 
	 <div  id="uploadedContainer" v-if="sellerImage.length>0 || uploadDelay.length>0">
				 
				 <div class="showUploaded" v-for="file in sellerImage">
				 <div class="uploaded_file_container">
				 <img  v-if="file.type=='image'" class="uploadedFile" :src="file.URL" width="100" height="100"  alt="" />
				
				 <video v-if="file.type=='video'" class="uploadedFile" width="100" height="100" controls >
				 <source :src="file.URL" :type="file.mime">
				</video>
				 <div id="uploadInfo" ><span class="uploadDelete" @click="removeUploaded"><b>x</b></span></div>
			     </div>
				 <!-- Add Image Spinner -->
				 
				 <div class="spinner_wrapper" v-for=" file in uploadDelay">
				 <div class="spinner"></div>
				 </div>
	  </div>
				 
	 
	
	
	 <tr>
	 <td>Seller Photo</td>
	 <td>
	 <input type="file" ref="image"  style="display:none;" accept="image/*" v-on:change="sellerImageChange">
				<span @click="showImagePicker" class="image-picker" title="Choose file"  ><img  id="" src="/storage/icons/photo_icon.png" width="15px" height="15px"  alt="" /><span class="photo_icon_text"><b> Select</b></span></span>
	 </td>
	 </tr>
	  <!-- End Adding image upload -->
	 <tr>
	 <td></td>
	 <td><button v-if="!show_post_spinner" class="addProductButton post_button" type="submit" @click="submitSeller()" :disabled="sdisabled">Add Seller</button>
	<div class="post_spinner_wrapper" v-if="show_post_spinner">
	 <div class="post_spinner"></div>
	</div>
	 
	 
	 
	 </td>
	 </tr>
	 </table>
	
	  <input type="hidden" name="adminseller" value="admin seller">
	 
	  </div>
	  
	  <!--End of form class-->
	  
	 </div>
	 
	 <!--End of form-container class div-->
	 
	 </div>
	 
	 <!--End of admin-sellers class div-->
	  
	  
	   <!--Begin freelance class div-->

	
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
	You can make money by helping other sellers deliver their goods or services, Register to gain access to your personalised dashboard.
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
	 <td><button type="submit">Register and Deliver</button></td>
	 </tr>
	 
	 
	 </table>
	 
	  <input type="hidden" name="freelance" value="freelance">
	 </form>
	 
	 </div>
	 
	 <!--End of form-container class div-->
	 
	 </div>
	 
	  <!--End of freelance class div--> 
	  
	  
	
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
	  
</div>
</div>
	  
	 
	 <!--End of container class div-->
	
		
		@yield('content')
   
		
	<!-- Scripts -->
	 <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/welcome.js') }}"></script>
	
</body>
</html>

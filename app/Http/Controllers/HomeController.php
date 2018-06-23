<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Product;
use App\Referral;
use App\Store;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
	
	
	 public function Categories()
    {
	  $all= array();
      
		
	   $categories = Category::get();
	   
	   foreach ($categories as $category):
	   array_push($all, $category);
	   
	   endforeach;
	   
	   return $all;
    }
	
	 public function Products()
    {
	  $all= array();
      
		
	   $products = Product::get();
	   
	   foreach ($products as $product):
	   array_push($all, $product);
	   
	   endforeach;
	   
	   return $all;
    }
	
	 public function saveCategory($name)
    {
	  $all= array();
	  
      $add = Category::create([
			
			'name' => $name
		]);
		
	  $categories = Category::get();
	   
	   foreach ($categories as $category):
	   array_push($all, $category);
	   
	   endforeach;
	   
	   return $all;
    }
	
	
	 public function sellProduct($cid, $pid)
    {
	  
	  $seller = User::where('id', auth::id())->where('status', 5)->first();
	  
	  if(!$seller) {
		  
		return 0;  
		  
	  }
	  
	   $more = array();
		
	  $others = Product::where('category_id', $cid)->get();
	   
	   foreach ($others as $other):
	   array_push($more, $other);
	   
	   endforeach;
	   
	   
	   
	  
	   $stored = Store::where('seller', auth::id())->where('product', $pid)->first();
	  
	  if(count($stored)) {
		  
		return $more;  
		  
	  }
	  
	  
	  
      $store = Store::create([
			
			'seller' => auth::id(),
			'product' => $pid
		]);
		
		return $more;
		
    }
	
	public function checkStore($pid)
    {
	  
	  $check = Store::where('seller', auth::id())->where('product', $pid)->first();
	  if($check) {
		
		return 1;
		  
	  }
	  
	  else {
		return 0;  
		  
	  }
	  
	}
	
	public function removeProduct($pid)
    {
	$product = Store::where('seller', Auth::id())
		->where('product', $pid)
		->first();
		
		if(!empty($product)) {
		
		$product->delete();
		
		}
		
	}
	
	public function authStore()
    {
	  
	  $stores = Store::where('seller', auth::id())->get();
	  
	  $all = array();
	  
	   foreach ($stores as $store):
	   
	   $product = Product::where('id', $store->product)->first();
	   array_push($all, $product);
	   
	   endforeach;
	   
	   return $all;
    }
	
	
	public function submitProduct(Request $request)
    {

	  $add = Product::create([
			
			'name' => $request->name,
			'category_id' => $request->category,
			'image' => $request->image,
		]);
		
		return $request->image;
		
    }
	
	
	public function submitSeller(Request $request)
    {
	  $user = User::where('email', $request->email)->first()
	  ->update([
			
			'status' => 5,
			'avatar' => $request->image,
		]);
		
	 $referral= Referral::create([
			
			'email' => $request->admin,
			
		]);
		
		return $user;
		
    }
	
	
	public function image(Request $request)
	{
		
		// This class process an uploaded image and returns a valid URL
		
		
		$image= $request->img;
		
		
		
		$ext = $image->extension();
		
		
		if ($ext== 'jpg' || $ext== 'jpeg' || $ext == 'png' || $ext == 'gif') {
			$type = 'image';
			
			//  we save the image in image folder
			
			$link = $image->store('public/images');
		} else {
			
			// If the user mistakenly upload a video instead of an image we save the video in video folder
			$type = 'video';
			$link = $image->store('public/videos');
		}
		
		if ($ext!= 'jpg' && $ext!= 'jpeg' && $ext != 'png' && $ext != 'gif' && $ext != '3gp' && $ext != 'ogg' && $ext != 'mp4' && $ext != 'webm' && $ext != 'avi' && $ext != 'flv' && $ext != 'wmv' && $ext != 'mov' ) {
			// If file format is not acceptable, we delete the file
			
			Storage::delete($link);
			
			// we return false instead of a valid URL
			
			return 0;
			
		}
		
	// If every thing goes well, we return a valid URL.
	
	return response(['URL'=>asset(Storage::url($link)), 'link'=>$link, 'type' => $type, 'ext' => $ext, 'mime' => $type .'/'. $ext]);
		
		
	}
	
	
}

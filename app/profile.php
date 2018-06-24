<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
     protected $fillable = ['location', 'lat', 'lng', 'about', 'user_id'];
	
	public function user()
	{
			return $this->belongsTo('App\User');
		
	}
}

<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
	use Searchable;
    protected $fillable = ['name', 'category_id', 'image'];
}

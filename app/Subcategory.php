<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
  public function categories() 
  {
  	return $this->belongsTo('Category');
  }

	public function products() {
		return $this->hasMany(Product::class, 'subcategory_id');
	}



}

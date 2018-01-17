<?php

namespace App;
//https://laracasts.com/discuss/channels/laravel/relationship-products-and-categories-and-subcategories

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Subcategory;

class Product extends Model
{
  public function categories() 
  {   
  	return $this->belongsTo('Category');
  }

	public function subcategories() 
	{
		return $this->belongsTo('Subcategory');
	}

	public function images() 
	{
		return $this->hasMany(ImagesProduct::class, 'product_id');
	}

	public function get_category_name($id)
	{
		$category = Category::findOrFail($id);
		return $category->name;
	}

	public function get_subcategory_name($id)
	{
		$subcategory = Subcategory::findOrFail($id);
		return $subcategory->name;
	}
}

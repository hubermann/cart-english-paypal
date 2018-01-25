<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use App\Product;
use App\ImagesProduct;
use App\Slider;
use App\Order;
use App\User;

class BackendController extends Controller
{

	public function index()
	{

		$users = \DB::table('users')
            ->join('user_role', 'users.id', '=', 'user_role.user_id')
            ->select('users.*')->where('user_role.role_id', 2)
            ->get();

		$orders 										= Order::orderBy('id', 'desc')->take(10)->get();;
		$categories 								= Category::all();
		$subcategories 								= Subcategory::all();
		$products 								= Product::all();
		$categories_outstandings 		= Category::where('outstanding', 1);
		$products_outstandings 			= Product::where('outstanding', 1)->get();

		return View('backend.dashboard',[
				'orders' 									=> $orders, 
				'users' 									=> $users,
				'categories' 							=> $categories,
				'subcategories' 							=> $subcategories,
				'products' 								=> $products,
				'categories_outstandings' => $categories_outstandings,
				'products_outstandings'  	=> $products_outstandings
				]);
	}
}

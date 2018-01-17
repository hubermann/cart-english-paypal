<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Category;
use App\Subcategory;
use App\Product;
use App\ImagesProduct;
use Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // https://github.com/Crinsane/LaravelShoppingcart#models

	public function cart()
	{
		#if (Auth::user()){ echo Auth::user()->email; }else{ echo "requiere login"; }
		
		#dd(Cart::content());

		#Cart::store('username');
		return View('frontend_common.cart');
	}
}

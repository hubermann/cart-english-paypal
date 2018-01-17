<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use App\Product;
use App\ImagesProduct;

class BackendController extends Controller
{
    //

	public function index()
	{
		return View('layouts.backend');
	}
}

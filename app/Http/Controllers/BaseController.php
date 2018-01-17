<?php  

namespace App\Http\Controllers;

use Request;
use App\Category;
use App\Subcategory;
use App\Product;
use App\ImagesProduct;
use Cart;


class BaseController extends Controller
{
  public function __construct()
  {
    //its just a dummy data object.
    $categories = Categorie::all();

    // Sharing is caring
    View::share('categories', $categories);
  }
}

?>



<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\ImagesProduct;

class ImagesProductsController extends Controller
{
   
	public function destroy($id)
	{
		$image   = ImagesProduct::findOrfail($id);

		if(!empty($image->filename)){
      @unlink('images-products/'.$image->filename);
    }
    //elimino producto
      $image->delete();
    	return Redirect::to('/backend/products/images/'.$image->product_id)->with('success', 'Imagen eliminada ');
	}


}

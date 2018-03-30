<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination\Paginator;
use Session;
use App\Category;
use App\Subcategory;
use App\Product;
use App\ImagesProduct;

class ProductsController extends Controller
{
    public function index()
	{
		$products = Product::paginate(20);
		return View('backend.products.all', ['products' => $products]);
	}
    
    public function newProduct()
    {
    	$data['categories'] = Category::all();
    	return View('backend.products.new', $data);
    }

    public function edit($id)
    {
      $data['categories'] = Category::all();
      $data['subcategories'] = Subcategory::all();
      $data['product'] = Product::findOrfail($id);
      return View('backend.products.edit', $data);
    }

    public function create()
    {
    	$rules = [
        'category_id' => 'required',
        'title' => 'required|unique:products|max:255',
        'description' => 'required',
    	];

	    $validator = Validator::make(Input::all(), $rules);

	    if ($validator->fails())
	    {
	        return redirect('/backend/products/new')->withErrors($validator)->withInput();
	    }

	    $dinamic = [];
	    $propiedades = Input::get('prod_propiedad');
	    $propiedades_valores = Input::get('prod_valor');
	    $count =0;
	    foreach ($propiedades as $propiedad) {
	    	 if(!empty($propiedad)){
	    	 	$dinamic[] = [ "propiedad" => $propiedad,  "valor" => $propiedades_valores[$count] ];
	    	 	$count++;
	    	}
	    }

      if(Input::get('qty') == NULL){ $qty = 0; }else{ $qty = Input::get('qty');}

    	$Product           = New Product();
      $Product->title    = Input::get('title');
      #$Product->qty      = $qty;
      $Product->price      = Input::get('price');
      $Product->category_id    = Input::get('category_id');
      $Product->subcategory_id   = Input::get('subcategory_id');
      $Product->description     = Input::get('description');
      $Product->outstanding     = Input::get('outstanding');
      $Product->dinamic_fields     = json_encode($dinamic);

      $Product->save();

      return Redirect::to('/backend/products')->withInput()->with('success', 'Product added');
    }


    public function update()
    {
      $rules = [
        'category_id' => 'required',
        'title' => 'required|max:255',
        'description' => 'required',
      ];

      $validator = Validator::make(Input::all(), $rules);

      if ($validator->fails())
      {
          return redirect('/backend/products/edit/'.Input::get('id'))->withErrors($validator)->withInput();
      }

      $dinamic = [];
      $propiedades = Input::get('prod_propiedad');
      $propiedades_valores = Input::get('prod_valor');
      $count =0;
      foreach ($propiedades as $propiedad) {
         if(!empty($propiedad)){
          $dinamic[] = [ "propiedad" => $propiedad,  "valor" => $propiedades_valores[$count] ];
          $count++;
        }
      }

      $Product           = Product::findOrfail(Input::get('id'));
      $Product->title    = Input::get('title');
      $Product->qty      = Input::get('qty');
      $Product->price      = Input::get('price');
      $Product->category_id    = Input::get('category_id');
      $Product->subcategory_id   = Input::get('subcategory_id');
      $Product->description     = Input::get('description');
      $Product->outstanding    = Input::get('outstanding');
      $Product->dinamic_fields     = json_encode($dinamic);

      $Product->save();

      return Redirect::to('/backend/products')->withInput()->with('success', 'Producto actualizado');
    }



    public function destroy($id)
    {
      $producto          = Product::findOrfail($id);
      //Elimino imagenes
      $imagenes = $producto->images;
      foreach ($imagenes as $image) {

        if(!empty($image->filename)){
          @unlink('images-products/'.$image->filename);
        }

      }
      //elimino producto
      $producto->delete();
    	return Redirect::to('/backend/products')->with('success', 'Producto eliminado ');
 
    }

    //images

    public function images($id){
      $product = Product::findOrfail($id);
      $images =  $product->images;
      return View('backend.products.images', ['product' => $product, 'images' => $images]);
    }

    public function fileUpload(Request $request) {
    $this->validate($request, [
        'input_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('input_img')) {
        $image = $request->file('input_img');
        $name = time().'-'.str_random(10).'-'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images-products');
        $image->move($destinationPath, $name);

        $image = new ImagesProduct();
        $image->product_id = Input::get('id');
        $image->filename = $name;
        $image->save();

        return back()->with('success','Image Upload successfully');
    }
}
}

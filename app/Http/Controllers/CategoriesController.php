<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Category;
use App\Subcategory;
use App\Product;


class CategoriesController extends Controller
{


   public function index()
	{
		$categories = Category::all();
		return View('backend.categories.all', ['categories' => $categories]);
	}
    
  public function newcategory()
  {
  	return View('backend.categories.new');
  }

  public function edit($id)
  {
    $category = Category::findOrFail($id);
    return View('backend.categories.edit', ['category' => $category]);
  }

  public function update()
  {
    
    $rules = [
      'name' => 'required|max:255',
    ];

    $validator = Validator::make(Input::all(), $rules);

    if ($validator->fails())
    {
        return redirect('/backend/categories/edit/'.Input::get('id'))->withErrors($validator)->withInput();
    }

      $category           = Category::findOrFail(Input::get('id'));
      $category->name     = Input::get('name');
      $category->outstanding     = Input::get('outstanding');

      $category->save();

      return Redirect::to('/backend/categories')->withInput()->with('success', 'Categoria actualizada.');
  }

  public function create()
  {
  	$rules = [
      'name' => 'required|unique:categories|max:255',
  	];

    $validator = Validator::make(Input::all(), $rules);

    if ($validator->fails())
    {
        return redirect('/backend/categories/new')->withErrors($validator)->withInput();
    }

    	$category           = New category();
      $category->name    	= Input::get('name');
      $category->outstanding     = Input::get('outstanding');

      $category->save();

      return Redirect::to('/backend/categories')->withInput()->with('success', 'category added');
  }
  
  public function destroy($id)
  {
    $category       = Category::findOrfail($id);
    $subcategories  = $category->subcategories;
    
    foreach ($subcategories as $subcategory) {

      $productos = $subcategory->products;
      foreach ($productos as $producto) {

        //Elimino imagenes
        $imagenes = $producto->images;
        foreach ($imagenes as $image) {

          if(!empty($image->filename)){
            echo $image->filename;
            @unlink('images-products/'.$image->filename);
          }

        }
        //elimino producto
        $producto->delete();
      }
      //Elimino SubCategoria
      $subcategory->delete();
    }
    //Elimino Categoria
    $category->delete();
    return Redirect::to('/backend/categories')->with('success', 'Categoria eliminada.');

  }
}

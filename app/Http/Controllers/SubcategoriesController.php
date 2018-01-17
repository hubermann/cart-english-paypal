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

class SubcategoriesController extends Controller
{
  public function index()
	{
		$categories = Category::all();
		return View('backend.subcategories.all', ['categories' => $categories]);
	}
    
  public function newsubcategory()
  {
    $categories = Category::all();
  	return View('backend.subcategories.new', ['categories' => $categories]);
  }

  public function edit($id)
  {
    $categories = Category::all();
    $subcategory = Subcategory::findOrFail($id);
    return View('backend.subcategories.edit', ['categories' => $categories, 'subcategory' => $subcategory ]);
  }

  public function create()
  {
  	$rules = [
      'name' => 'required|unique:subcategories|max:255',
  	];

    $validator = Validator::make(Input::all(), $rules);

    if ($validator->fails())
    {
        return redirect('/backend/subcategories/new')->withErrors($validator)->withInput();
    }

    	$subcategory                   = New Subcategory();
      $subcategory->category_id      = Input::get('category_id');
      $subcategory->name    	       = Input::get('name');
      
      $subcategory->save();

      return Redirect::to('/backend/subcategories')->withInput()->with('success', 'subcategory added');
  }

  public function update()
  {
    $rules = [
      //'name' => 'required|unique:subcategories|max:255',
    ];

    $validator = Validator::make(Input::all(), $rules);

    if ($validator->fails())
    {
        return redirect('/backend/subcategories/edit/'.Input::get('id'))->withErrors($validator)->withInput();
    }

      $subcategory                   = Subcategory::findOrFail(Input::get('id'));
      $subcategory->category_id      = Input::get('category_id');
      $subcategory->name             = Input::get('name');
      
      $subcategory->save();

      return Redirect::to('/backend/subcategories')->withInput()->with('success', 'Subcategoria actualizada');
  }

  public function destroy($id)
  {
    $subcategory           = Subcategory::findOrfail($id);

   
    $productos = $subcategory->products()->get();

    foreach ($productos as $producto) {

      echo "<p>'.$producto->title.'";

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

    $subcategory->delete();
    return Redirect::to('/backend/subcategories')->with('success', 'Subcategoria eliminada.');

  }

  public function ajax()
  {
    $category_id = Input::get('category_id');
    $subcategories = Subcategory::where('category_id','=',$category_id)->get();
    return $subcategories;
  }
}

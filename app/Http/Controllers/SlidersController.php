<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Slider;

class SlidersController extends Controller
{
  public function index()
  {
    $sliders = Slider::all();
    return View('backend.sliders.all', ['sliders' => $sliders]);
  }

  public function newslider()
  {
  	return View('backend.sliders.new');
  }

	public function create(Request $request)
  {

  	$this->validate($request, [
        'input_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('input_img')) {
        $slider = $request->file('input_img');
        $name = time().'-'.str_random(10).'-'.$slider->getClientOriginalExtension();
        $destinationPath = public_path('/images-sliders');
        $slider->move($destinationPath, $name);

				$title = (Input::get('title') != "" ) ? Input::get('title') : "";
				$text = (Input::get('text') != "" ) ? Input::get('text') : "";
        $link = (Input::get('link') != "" ) ? Input::get('link') : "";
        $title_button = (Input::get('title_button') != "" ) ? Input::get('title_button') :"#";
        $slider = new Slider();
        $slider->title = $title;
        $slider->text = $text;
        $slider->filename = $name;
        $slider->link = $link;
        $slider->title_button = $title_button;
        $slider->save();

        return Redirect::to('/backend/sliders')->withInput()->with('success', 'Slider added');
    }

  }

  public function destroy($id)
  {
    $slider = Slider::findOrfail($id);


    if(!empty($slider->filename)){

      @unlink('images-sliders/'.$slider->filename);
    }
    //Elimino
    $slider->delete();
    return Redirect::to('/backend/sliders')->with('success', 'Slider deleted.');

  }


}

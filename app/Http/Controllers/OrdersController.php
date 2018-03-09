<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;

use App\Order;
class OrdersController extends Controller
{

	//payment_status 0 = Pendiente
	//payment_status 1 = Cobrado ok
	//payment_status 2 = Rechazado


	public function index()
	{
		$orders = Order::paginate(20);
		return View('backend.orders.all', ['orders' => $orders, 'title_page' => 'All orders']);
	}

	public function declined()
	{
		$orders = Order::where('payment_status', 2)->paginate(20);
		return View('backend.orders.all', ['orders' => $orders, 'title_page' => 'All declined orders']);
	}


	public function pending()
	{
		$orders = Order::where('payment_status', 0)->paginate(20);
		return View('backend.orders.all', ['orders' => $orders, 'title_page' => 'All pending orders']);
	}

	public function successfully()
	{
		$orders = Order::where('payment_status', 1)->paginate(20);
		return View('backend.orders.all', ['orders' => $orders, 'title_page' => 'All successfully orders']);
	}

	public function destroy($id)
  {
    $order = Order::findOrfail($id);
    //destroy order
    $order->delete();
  	return Redirect::to('/backend/orders')->with('success', 'Order deleted. ');

  }

	public function edit($id)
  {
    $order = Order::findOrFail($id);
    return View('backend.orders.edit', ['order' => $order]);
  }

  public function update()
  {

    // $rules = [
    //   #'name' => 'required|max:255',
    // ];
		//
    // $validator = Validator::make(Input::all(), $rules);
		//
    // if ($validator->fails())
    // {
    //     return redirect('/backend/orders/edit/'.Input::get('id'))->withErrors($validator)->withInput();
    // }

      $order           = Order::findOrFail(Input::get('id'));
      $order->payment_status   = Input::get('status');

      $order->save();

      return Redirect::to('/backend/orders')->withInput()->with('success', 'Order actualizada.');
  }

}

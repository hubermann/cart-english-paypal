<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination\Paginator;

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
  
}

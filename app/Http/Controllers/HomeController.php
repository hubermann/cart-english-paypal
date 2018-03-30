<?php

namespace App\Http\Controllers;
use Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Category;
use App\Subcategory;
use App\Product;
use App\Order;
use App\Slider;
use App\ImagesProduct;
use Cart;
use Auth;
use MP;
use Mail;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        #$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sliders'] = Slider::all();
        $data['categories'] = Category::all();
        $data['outstandings'] = Product::where('outstanding', 1)->get();
        $data['products'] = Product::where('outstanding', 0)->take(9)->get();

        return view('frontend_common.home', $data );//return view('home');
    }


    /**
     * Show the application dtempalte.
     *
     * @return \Illuminate\Http\Response
     */
    public function product_detail($id)
    {
        $data['categories'] = Category::all();
        $data['product'] = Product::findOrfail($id);
        $data['outstandings'] = Product::where('outstanding', 1)->get();
        return view('frontend_common.product_detail', $data);
    }

    /**
     * Show the application dtempalte.
     *
     * @return \Illuminate\Http\Response
     */
    public function products_list()
    {
        $data['categories'] = Category::all();
        $data['products'] = Product::paginate(3);
        $data['outstandings'] = Product::where('outstanding', 1)->get();
        return view('frontend_common.products_list', $data);
    }

    /**
     * Show the application dtempalte.
     *
     * @return \Illuminate\Http\Response
     */
    public function outstandings()
    {
        $data['categories'] = Category::all();
        $data['products'] = Product::where('outstanding', 1)->paginate(10);

        return view('frontend_common.products_outstandings', $data);
    }



    /**
     * Show the application dtempalte.
     *
     * @return \Illuminate\Http\Response
     */
    public function by_category($id)
    {
        $data['categories'] = Category::all();
        $data['category'] = Category::find($id);
        $data['products'] = Product::where('category_id', $id)->paginate(3);
        $data['outstandings'] = Product::where('outstanding', 1)->get();
        return view('frontend_common.products_by_category', $data);
    }

    /**
     * Show the application dtempalte.
     *
     * @return \Illuminate\Http\Response
     */
    public function by_subcategory($id)
    {
        $data['categories'] = Category::all();
        $subcategory = Subcategory::find($id);
        $data['category'] = Category::find($subcategory->category_id);
        $data['subcategory'] = $subcategory;
        $data['products'] = Product::where('subcategory_id', $id)->paginate(3);
        $data['outstandings'] = Product::where('outstanding', 1)->get();
        return view('frontend_common.products_by_subcategory', $data);
    }

    public function cart() {

        $categories = Category::all();
        //update/ add new item to cart
        if (Request::isMethod('post')) {
            $product_id = Request::get('product_id');
            $product = Product::find($product_id);
            Cart::add(array('id' => $product_id, 'name' => $product->title, 'qty' => 1, 'price' => $product->price));
            return \App::make('redirect')->back()->with('success', 'Producto agregado al carrito.');
        }

        //increment the quantity
        if (Request::get('product_id') && (Request::get('increment')) == 1) {
            $rowId = Cart::search(function($key, $value) { return $key->id == Request::get('product_id'); });
            $new_quantity = $rowId->first()->qty + 1;
            Cart::update($rowId->first()->rowId, ['qty' => $new_quantity]);
            return \App::make('redirect')->back();
        }

        //decrease the quantity
        if (Request::get('product_id') && (Request::get('decrease')) == 1) {
            $rowId = Cart::search(function($key, $value) { return $key->id == Request::get('product_id'); });
            $new_quantity = $rowId->first()->qty - 1;
            Cart::update($rowId->first()->rowId, ['qty' => $new_quantity]);
            return \App::make('redirect')->back();
        }

        //Remove item
        if (Request::get('product_id') && (Request::get('delete')) == 1) {
            $rowId = Cart::search(function($key, $value) { return $key->id == Request::get('product_id'); });
            Cart::remove($rowId->first()->rowId);
            return \App::make('redirect')->back();
        }

        $cart = Cart::content();

        return view('frontend_common.cart', array('cart' => $cart, 'title' => 'Welcome', 'description' => '', 'page' => 'home', 'categories' => $categories));
    }

    public function contact()
    {
        $data['categories'] = Category::all();
        $data['outstandings'] = Product::where('outstanding', 1)->get();
        $data['products'] = Product::where('outstanding', 0)->take(9)->get();

        return view('frontend_common.contact', $data );//return view('home');
    }

    public function process_contact()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect('/contact'.'#contact')->withErrors($validator)->withInput();
        }


        #ContactUS::create($request->all());
        $name       = Input::get('name');
        $email      = Input::get('email');
        $subject    = Input::get('subject');
        $telephone  = Input::get('telephone');
        $user_message    = Input::get('message');

        Mail::send(

            'email',
             array(
                 'name'       => $name,
                 'email'      => $email,
                 'subject'    => $subject,
                 'telephone'  => $telephone,
                 'user_message'    => $user_message
             ),

            function ($message) {
                $message->from('info@cocinnovation.com');
                $message->to('info@cocinnovation.com', 'Admin')->subject('Website Feedback');
            }

        );

        return redirect('/contact')->with('success', 'Thank you! Your message has been sent successfully.');
    }

    public static function get_product_images($id)
    {
        return ImagesProduct::where('product_id', $id)->get();
    }

    public static function get_categories_outstandings()
    {
        return Category::where('outstanding', 1)->get();
    }

    public static function get_categories()
    {
        return Category::All();
    }

    public function checkout()
    {
        if( !Auth::user() ){ return redirect('login')->with('warning', 'Por favor identifiquese.');}
        if( Cart::total() == 0.00 ){ return redirect('/')->with('warning', 'No hay productos en su orden.');}

        return view('frontend_common.checkout');
    }



    public function process_new_order()
    {
        $rules = [
            'name' => 'required|max:80',
            'lastname' => 'required|max:80',
            'area_code' => 'required|max:50',
            'telephone' => 'required|max:20',
            'street_name' => 'required|max:20',
            'street_number' => 'required|max:20',
            'city' => 'required|max:20',
            'state' => 'required|max:20',
        ];

      $validator = Validator::make(Input::all(), $rules);

      if ($validator->fails())
      {
          return redirect('/checkout')->withErrors($validator)->withInput();

      }

            $items = [];
            foreach(Cart::content() as $row)
            {
                array_push($items, ["id" => $row->id, "title" => $row->name, "quantity" => $row->qty, "currency_id" => "ARS", "unit_price" => $row->price ]);
            }

            $order                      = New Order();
            $order->name                = Input::get('name');
            $order->surname             = Input::get('lastname');
            $order->area_code           = Input::get('area_code');
            $order->telephone           = Input::get('telephone');
            $order->street_name         = Input::get('street_name');
            $order->street_number       = Input::get('street_number');
            $order->city                = Input::get('city');
            $order->zip_code            = '--';
            $order->idempotency_key     = '--';
            $order->state               = Input::get('state');
            $order->user_id             = Auth::user()->id;
            $order->email               = Auth::user()->email;
            $order->order_description   = serialize($items);
            $order->payment_status      = Order::PENDING;
            $order->amount              = Cart::total();

            $order->save();
            Cart::destroy();

            // https://docs.connect.squareup.com/articles/using-sandbox?q=test%20card

            return redirect()->route('frontend.payment',['id'=> $order->id]);
    }

    public function payment($id)
    {
      return view('frontend_common.pay_with_square', ['order_id' => $id])->with('warning', 'Please login.');
    }



    public function process_payment()
    {
      // echo Input::get('nonce');
      // echo Input::get('id_order');
      //return view('frontend_common.pay_with_square', ['order_id' => $id]);

      $access_token ='sandbox-sq0atb-Sn5Ql17GF8O8NV8QW1YV-w';
      # setup authorization
      \SquareConnect\Configuration::getDefaultConfiguration()->setAccessToken($access_token);
      # create an instance of the Transaction API class
      $transactions_api = new \SquareConnect\Api\TransactionsApi();
      $location_id = 'CBASEOivDxdrG0koHVPyqK15C28gAQ';
      $nonce = Input::get('nonce');


      $order = Order::find(Input::get('id_order'));

      if($order->status == 1)
      {
        $error_string = "Esa orden ya se encuentra con estado CAPTURED";
        return view('frontend_common.payment_error', ['order_id' => $order->id, 'errors' => $error_string]);
      }

      // SQUARE_APPLICATION_ID=sandbox-sq0idp-iUgSsqpN-zSBe7DZMqMk0w
      // SQUARE_TOKEN=sandbox-sq0atb-Sn5Ql17GF8O8NV8QW1YV-w
      $total_amount = round($order->amount * 100);

      $idempotency_key = uniqid();
      $request_body = array (
          "card_nonce" => $nonce,
          # Monetary amounts are specified in the smallest unit of the applicable currency.
          # This amount is in cents. It's also hard-coded for $1.00, which isn't very useful.
          "amount_money" => array (
              "amount" => $total_amount,
              "currency" => "USD"
          ),
          # Every payment you process with the SDK must have a unique idempotency key.
          # If you're unsure whether a particular payment succeeded, you can reattempt
          # it with the same idempotency key without worrying about double charging
          # the buyer.
          "idempotency_key" => $idempotency_key
      );

      Order::whereId($order->id)->update(['idempotency_key' => $idempotency_key]);

      try {
          $result = $transactions_api->charge($location_id,  $request_body);

          $feedback = serialize($result);
          Order::whereId($order->id)->update(['feedback_sq' => $feedback]);

          //dd($result);
          $transaction_id = $result->getTransaction()->getId();
          #echo "Status:". $result['transaction']->getTransaction()->getStatus();
          if($result['transaction']["tenders"][0]['card_details']["status"] == "CAPTURED")
          {
            Order::whereId($order->id)->update(['payment_status' => 1]);
          }
          //OK
          return view('frontend_common.payment_ok', ['order_id' => $order->id, 'transaction_id' => $transaction_id]);

      } catch (\SquareConnect\ApiException $e) {
          #echo "Exception when calling TransactionApi->charge:";
          #var_dump($e->getResponseBody());

          $response = $e->getResponseBody();
          $error_string = "";
          foreach($response->errors as &$error) {
             $error_string .= $error->detail . "|";
          }
          #vista de error al pagar
          return view('frontend_common.payment_error', ['order_id' => $order->id, 'errors' => $error_string]);
      }
    }




    public function payment_success(Request $request)
    {

        $params   = $request::all();
        // $id_order = strip_tags($params['operationid']);
        //
        // $TP             = new TodoPagoWrap;
        // $feedback_key= strip_tags($params['Answer']);
        // $TP->answer_key = $feedback_key;
        // if ($TP->payment_success()) //comprobamos el estado del pago
        // { // aca tenemos que hacer el procesamiento correspondiente a una orden pagada
        //   $order = Order::find($id_order);
        //   $order->feedback_mp = $feedback_key;
        //   $order->payment_success();
        //
        //     //update stock
        //     foreach (Cart::content() as $item) {
        //         $product = Product::findOrfail($item->id);
        //         $product->qty = $product->qty - $item->qty;
        //         $product->save();
        //     }


//         SUCCESS
// transaction_subject=
// txn_type=web_accept
// payment_date=09%3A15%3A01+Nov+29%2C+2013+PST
// last_name=OpenAlfa
// residence_country=ES
// pending_reason=multi_currency
// item_name=Professional+Subscription
// payment_gross=
// mc_currency=EUR
// business=openalfa-facilitator%40openalfa.com
// payment_type=instant
// protection_eligibility=Ineligible
// payer_status=verified
// tax=0.00
// payer_email=comprador%40openalfa.com
// txn_id=1XA11350TU8279492
// quantity=1
// receiver_email=openalfa-facilitator%40openalfa.com
// first_name=Compradorconvisa
// payer_id=SBWU6QRGHTUY2
// receiver_id=DQ56QJ7NG9FFS
// item_number=
// handling_amount=0.00
// payment_status=Pending
// shipping=0.00
// mc_gross=10.00
// custom=
// charset=windows-1252


        echo "Payment Success desde paypal :";
    }

    public function payment_error(Request $request)
    {
        $params   = $request::all();
        // $id_order = strip_tags($params['operationid']);
        //
        // $order = Order::find($id_order)->payment_rejected();
        // return view('frontend_common.checkout_result', ['status' => 2, 'order_id' => $id_order]);
        echo "Payment error desde paypal";
        var_dump($params);
    }


    public function user_orders()
    {
        if( !Auth::user() ){ return redirect('login')->with('warning', 'Please login.');}
        $data['categories'] = Category::all();
        $data['orders'] = Order::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();

        return view('frontend_common.user_orders', $data);
    }


    public function help()
    {
        return view('frontend_common.help');
    }




}

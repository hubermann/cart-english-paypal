@extends('layouts.frontend')

@section('content')

<div class="container ">


  <div class="g-max-width-645 text-center mx-auto ">
    <br>
    <h4 class="h1 mb-3">Order created!</h4>
    <p class="g-font-size-17 mb-0">Your order with the ID #{{$order_id}} as been created. Proceed with the payment process.</p>
    <br>
  </div>


https://www.sandbox.paypal.com/webapps/shoppingcart/error?flowlogging_id=e7371050d382&code=BAD_INPUT_ERROR



        <div class="row justify-content-center">

          <div class="col-md-12">
            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="business" value="Christianc2303-facilitator@gmail.com">
                <input type="hidden" name="item_name" value="COC-Innovation-order-{{$order_id}}">
                <input type="hidden" name="currency_code" value="USD">
                <input type="hidden" name="amount" value="{{$order_amount}}">
                <input type="hidden" name="return" value="http://localhost:8000/payment_success">
                <input type="hidden" name="cancel_return" value="http://localhost:8000/payment_error">
                <input type="hidden" name="invoice" id="invoice" value="order-{{$order_id}}" >
                <input type="hidden" name="notify_url" id="notify_url" value="http://localhost:8888/order_notify"/>
                <input type="image" src="http://www.paypal.com/us_XC/i/btn/x-click-but01.gif" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
            </form>
          </div>

        </div>






</div><!-- End container -->


@endsection

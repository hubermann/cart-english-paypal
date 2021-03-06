@extends('layouts.frontend')

@section('content')


<div class="container ">

  <div class="g-max-width-645 text-center mx-auto ">
    <br>
    <h4 class="h1 mb-3">Payment chargued for order  #{{$order_id}}.</h4>
    <!-- <p>Transaction ID: {{$transaction_id}}</p> -->
    <p class="g-font-size-17 mb-0">You can see your orders and their status in the following link.
    <a href="{{ route('frontend.user_orders') }}" class="d-block g-color-black g-color-primary--hover g-text-underline--none--hover g-font-weight-400 g-py-5 g-px-20">My orders</a>
  </p>
    <br>

  </div>

</div><!-- End container -->


@endsection

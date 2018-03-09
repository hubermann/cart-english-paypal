@extends('layouts.frontend')

@section('content')


<div class="container ">

  <div class="g-max-width-645 text-center mx-auto ">
    <br>
    <h4 class="h1 mb-3">Errors on Payment process for order  #{{$order_id}}.</h4>
    <p class="g-font-size-17 mb-0">Hubo algunos inconvenientes al con el proceso el pago (traducir o ver que texto se pone).</p>
    <br>

    <p>{{$errors}}</p>

    <p><a href="{{ route('frontend.payment', ['id' => $order_id]) }}" class="btn btn-primary">Retry payment</a></p>

  </div>

</div><!-- End container -->


@endsection

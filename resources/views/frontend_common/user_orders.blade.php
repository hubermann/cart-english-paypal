@extends('layouts.frontend')

@section('content')

<div class="container">
	<section>
		<h2>Historial de ordenes</h2>
	@unless($orders->count())
		<p>No items.</p>
	@else

		@foreach($orders as $order)

		<div class="card">
			<div class="card-header">
				Order ID: {{ $order->id}}  -

				<span class="text"> Status:
				@if ( $order->payment_status == 0)
				Pending
				@elseif ( $order->payment_status == 1)
				Successfully
				@elseif ( $order->payment_status == 2)
				Declined
				@endif</span>

			</div>

			<div class="card-body">
				<p>Date: <span class="font-italic"> {{ $order->created_at->diffForHumans() }} </span></p>

			@foreach($order->unserialize_detail($order->id) as $item)
				<h5 class="card-title">{{ $item['title'] }}</h5>
				<p class="card-text"> {{$item['quantity']}} x  ${{$item['unit_price']}}  </p>
				@if ( $order->payment_status == 0 || $order->payment_status == 2)
					<a href="{{ route('frontend.payment', ['id' => $order->id]) }}" class="btn btn-primary">Retry payment</a>
				@endif

			@endforeach

			</div>
		</div>
		<br>

		@endforeach
	@endunless
	</section>
</div>


@endsection

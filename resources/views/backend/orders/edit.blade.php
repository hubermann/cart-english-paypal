
@extends('layouts.backend')

@section('content')

<!--row -->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<h3 class="box-name">Orders</h3>

				<form action="{{ route('backend.orders.update') }}" method="post">
				{{ csrf_field() }}
				<fieldset>
				<input type="hidden" name="id" id="id" value="{{$order->id}}">
				<div class="form-group">
					<label for="name">ID: {{$order->id}} | Email: {{$order->email }} | Amount: {{$order->amount }}</label>

				</div>

				<div class="form-group">
					<label for="title">Status</label>
					<select name="status">
						<option value="0" @if ($order->payment_status == 0)
									selected
								@endif
								>Pending - Captured</option>
						<option value="1"
						@if ($order->payment_status == 1)
									selected
								@endif
								>Accepted</option>
						<option value="2"
						@if ($order->payment_status == 2)
									selected
								@endif
								>Rejected</option>
					</select>
				</div>



				<div class="form-group">
					<button class="btn btn-primary" type="submit">Crear</button>
				</div>

				</fieldset>
				</form>


			</div>
	</div>
</div>
<!-- /.row -->

@endsection

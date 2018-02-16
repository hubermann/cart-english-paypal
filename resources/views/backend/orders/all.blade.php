@extends('layouts.backend')

@section('content')

<!--row -->
<div class="row">
	<div class="col-sm-12">


		<div class="white-box">


				<nav class="navbar navbar-light bg-faded">
				<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				  <div class="navbar-nav">
				    <a class="nav-item nav-link btn " href="{{route('backend.orders')}}">All <span class="sr-only">(current)</span></a>
				    <a class="nav-item nav-link btn" href="{{route('backend.orders_successfully')}}">Successfully</a>
				    <a class="nav-item nav-link btn" href="{{route('backend.orders_declined')}}">Declined</a>
				    <a class="nav-item nav-link btn" href="{{route('backend.orders_pending')}}">Pending</a>
				  </div>
				</div>
				</nav>
				<h3 class="box-title">{{ $title_page }}</h3>

				<div class="col-md-2 col-sm-4 col-xs-12 pull-right text-right">

					<!-- btn -->

				</div>

			<div class="table-responsive">
				<table class="table ">

					@unless($orders->count())
					    <p>No items.</p>
					@else
						<thead>

								<th class="text-left">ID</th>
								<th class="text-left">Email comprador</th>
								<th class="text-left"> Nombre y apellido</th>
								<th class="text-left"> Status</th>
								<th class="text-right"> Opciones</th>

							</thead>
							<tbody>
								@foreach($orders as $order)
									<tr>
										<td>{{ $order->id }}</td>
										<td>{{ $order->email }}</td>
										<td>{{ $order->name}}{{ $order->surname}}</td>
										<td>
											@if ( $order->payment_status == 0)
												Pending
											@elseif ( $order->payment_status == 1)
											 Successfully
											@elseif ( $order->payment_status == 2)
												Declined
											@endif
										</td>
										<td>
											<div class="btn-group pull-right">

											<a href="{{ route('backend.orders.destroy', ['id' => $order->id])}}" class="delete btn btn-small" data-confirm="Confirma eliminar ésta order de manera definitiva."><i class="fa fa-trash-o"></i></a>
											</div>
										</td>

									</tr>

								@endforeach

								<tr>

								</tr>
							</tbody>

					@endunless


				</table>

				<div class="row">
							{{ $orders->links() }}
							</div>
			</div>

				<div class="table-responsive">
					<ul class="pagination pagination-small pagination-centered">

					</ul>
				</div>
		</div>

	</div>
</div>
<!-- /.row -->

@endsection

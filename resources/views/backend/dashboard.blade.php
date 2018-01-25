@extends('layouts.backend')

@section('content')

<section>
	<div class="row">
        <!--col -->
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="white-box">
                <div class="col-in row">
                    <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="linea-icon linea-basic"></i>
                        <a href="{{ route('backend.users.view') }}"><h5 class="text-muted vb">Usuarios</h5> </a></div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <h3 class="counter text-right m-t-15 text-danger"> {{ count($users) }}</h3> </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="{{ count($users) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ count($users) }}%"> <span class="sr-only">{{ count($users) }}% Complete (success)</span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->
        <!--col -->
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="white-box">
                <div class="col-in row">
                    <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon=""></i>
                        <a href="{{ route('backend.products') }}"><h5 class="text-muted vb">Productos</h5></a> </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <h3 class="counter text-right m-t-15 text-megna">{{ count($products) }}</h3> </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="progress">
                            <div class="progress-bar progress-bar-megna" role="progressbar" aria-valuenow="{{ count($products) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ count($products) }}%"> <span class="sr-only">{{ count($products) }}% Complete (success)</span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->
        <!--col -->
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="white-box">
                <div class="col-in row">
                    <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon=""></i>
                        <a href="{{ route('backend.categories') }}"><h5 class="text-muted vb">Categorias</h5></a> </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <h3 class="counter text-right m-t-15 text-primary"> {{ count($categories)}} </h3> </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="progress">
                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="{{ count($categories)}}" aria-valuemin="0" aria-valuemax="100" style="width: {{ count($categories)}}%"> <span class="sr-only">{{ count($categories)}}% Complete (success)</span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->
        <!--col -->
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="white-box">
                <div class="col-in row">
                    <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon=""></i>
                        <a href="{{ route('backend.subcategories') }}"><h5 class="text-muted vb">Subcategorias</h5></a> </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <h3 class="counter text-right m-t-15 text-primary"> {{ count($subcategories)}} </h3> </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="progress">
                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="{{ count($categories)}}" aria-valuemin="0" aria-valuemax="100" style="width: {{ count($categories)}}%"> <span class="sr-only">{{ count($categories)}}% Complete (success)</span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->
</div>




<!-- Categorias destacadas -->

                <div class="row">
                <div class="col-sm-12">
                <div class="white-box">
                <h3 class="box-title">Recent 10 sales
                <div class="col-md-2 col-sm-4 col-xs-12 pull-right">
                    <!-- <select class="form-control pull-right row b-none">
                        <option>March 2016</option>
                        <option>April 2016</option>
                        <option>May 2016</option>
                        <option>June 2016</option>
                        <option>July 2016</option>
                    </select> -->
                </div>
                </h3>
                <div class="table-responsive">
                <table class="table ">
                    <thead>
                        <tr>
                            <th>NAME</th>
                            <th>STATUS</th>
                            <th>DATE</th>
                            <th>PRICE</th>
                        </tr>
                    </thead>
                    <tbody>

					@unless($orders->count())
						<p>No items.</p>
					@else

					@foreach($orders as $order)
						<tr>
						<td class="txt-oflo" title="{{ $order->name}}{{ $order->surname}}">{{ $order->email }}</td>
						
						<td>
							@if ( $order->payment_status == 0)
								Pending
							@elseif ( $order->payment_status == 1)
								Successfully
							@elseif ( $order->payment_status == 2)
								Declined
							@endif
						</td>
						<td class="txt-oflo">{{ $order->created_at }}</td>
						<td><span class="text-success">${{$order->amount}}</span></td>
						</tr>	

					@endforeach

						<tr>

					</tr>
					</tbody>

					@endunless


                </table> <a href="{{url('backend/orders')}}">Check all the sales</a> </div>
        </div>
    </div>
</div>

</section>


@endsection
@extends('layouts.backend')

@section('content')


<!--row -->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<h3 class="box-title">products
				<div class="col-md-2 col-sm-4 col-xs-12 pull-right text-right">
					<!-- <select class="form-control pull-right row b-none">
						<option>March 2016</option>
						<option>April 2016</option>
						<option>May 2016</option>
						<option>June 2016</option>
						<option>July 2016</option>
					</select> -->
					<a class="btn btn-primary btn-block btn-rounded waves-effect waves-light" href="{{ route('backend.products.new') }}"> + Producto</a>
				</div>
			</h3>
			<div class="table-responsive">
				<table class="table ">

					@unless($products->count())
					    <p>No items.</p>
					@else
						<thead>
							<thead>
								<th>nombre</th>
								<th class="text-right">Opciones</th>
							</thead>
							<tbody>
								@foreach($products as $product)
									<tr>
										<td>{{ $product->title }}</td>
										<td>{{ $product->description }}</td>
										<td>
											<div class="btn-group pull-right">
											<a class="btn btn-small" href="{{ route('backend.products.edit', ['id' => $product->id])}}"><i class="fa fa-edit"></i></a>
											<a class="btn btn-small" data-toggle="modal" data-target="#modalProducto{{$product->id}}" ><i class="fa fa-eye"></i></a>
											<a class="btn btn-small" href="{{ route('backend.products.images', ['id' => $product->id])}}" ><i class="fa fa-camera-retro"></i></a>
											<a href="{{ route('backend.products.destroy', ['id' => $product->id]) }}" class="delete btn btn-small" data-confirm="Comfirma eliminar definitivamente este producto?"><i class="fa fa-trash-o"></i></a>	
											</div>
										</td>
									</tr>

									<!-- Modal -->
									<div class="modal fade" id="modalProducto{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="modalProducto{{$product->id}}Label">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title" id="modalProducto{{$product->id}}Label">{{ $product->title }}</h4>
									      </div>
														
														<div class="modal-body">
														<p>Cantidad en stock: <strong>{{ $product->qty }}</strong></p>
														<p>{{ $product->description }}</p>
															@foreach(json_decode($product->dinamic_fields, true) as $key => $value)
															<div class="row">
																<hr>
																<div class="col-md-4">{{ $value['propiedad'] }}</div>
																<div class="col-md-8">{{ $value['valor'] }}</div>
															</div>


															@endforeach
														</div>
							
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									      </div>
									    </div>
									  </div>
									</div>
									<!-- End Modal -->

								@endforeach
							</tbody>

					

				</table>
				<div class="row">
					{{ $products->links() }}
				</div>
				@endunless
				 
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

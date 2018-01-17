@extends('layouts.backend')

@section('content')

<!--row -->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<h3 class="box-title">Categories
				<div class="col-md-2 col-sm-4 col-xs-12 pull-right text-right">
					<!-- <select class="form-control pull-right row b-none">
						<option>March 2016</option>
						<option>April 2016</option>
						<option>May 2016</option>
						<option>June 2016</option>
						<option>July 2016</option>
					</select> -->
					<a class="btn btn-primary btn-block btn-rounded waves-effect waves-light" href="{{ route('backend.categories.new') }}"> + Categoria </a>
				</div>
			</h3>
			<div class="table-responsive">
				<table class="table ">

					@unless($categories->count())
					    <p>No items.</p>
					@else
						<thead>
							<thead>
								<th>Nombre</th>
								<th class="text-right">Opciones</th>
							</thead>
							<tbody>
								@foreach($categories as $category)
									<tr>
										<td>{{ $category->name }}</td>
										<td>
											<div class="btn-group pull-right">
											<a class="btn btn-small" href="{{ route('backend.categories.edit', ['id' => $category->id])}}"><i class="fa fa-edit"></i></a>
											<a href="{{ route('backend.categories.destroy', ['id' => $category->id])}}" class="delete btn btn-small" data-confirm="Confirma eliminar ésta categoria? - Todas las Subcategorias y sus productos dependientes tambien serán eliminados de manera definitiva."><i class="fa fa-trash-o"></i></a>
											</div>
										</td>
									</tr>
								@endforeach
							</tbody>

					@endunless
				

				</table> 
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

@extends('layouts.backend')

@section('content')

<!--row -->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<h3 class="box-title">Notes
				<div class="col-md-2 col-sm-4 col-xs-12 pull-right text-right">
					<!-- <select class="form-control pull-right row b-none">
						<option>March 2016</option>
						<option>April 2016</option>
						<option>May 2016</option>
						<option>June 2016</option>
						<option>July 2016</option>
					</select> -->
					<a class="btn btn-primary btn-block btn-rounded waves-effect waves-light" href="{{ route('backend.notes.new') }}">New note</a>
				</div>
			</h3>
			<div class="table-responsive">
				<table class="table ">

					@unless($notes->count())
					    <p>No items.</p>
					@else
						<thead>
							<thead>
								<th>title</th>
								<th>description</th>
								<th class="text-right">Opciones</th>
							</thead>
							<tbody>
								@foreach($notes as $note)
									<tr>
										<td>{{ $note->title }}</td>
										<td>{{ $note->description }}</td>
										<td>
											<div class="btn-group pull-right">
											<a class="btn btn-small" href="'.base_url('control/notas/editar/'.$row->id.'').'"><i class="fa fa-edit"></i></a>
											<a class="btn btn-small" href="'.base_url('control/notas/imagenes/'.$row->id.'').'"><i class="fa fa-camera-retro"></i></a>
											<a href="'.base_url('control/notas/destroy/'.$row->id.'').'" class="delete btn btn-small" data-confirm="Are you sure to delete this item?"><i class="fa fa-trash-o"></i></a>	
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

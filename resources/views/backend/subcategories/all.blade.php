@extends('layouts.backend')

@section('content')


<style>
	.border{border:1px solid #e2e2e2; border-radius: .3em; padding: .3em .8em; margin-bottom: 2px; float: left; width: 100%}
</style>
<!--row -->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<h3 class="box-title">Subcategorias
				<div class="col-md-2 col-sm-4 col-xs-12 pull-right text-right">
					
					<a class="btn btn-primary btn-block btn-rounded waves-effect waves-light" href="{{ route('backend.subcategories.new') }}"> + SubCategoria </a>
				</div>
			</h3>
			<div class="table-responsive">


					@unless($categories->count())
					    <p>No items.</p>
					@else
						
								@foreach($categories as $category)

								<div id="accordion" >
									<div class="card">
								    <div class="card-header border" role="tab" id="heading{{$category->id}}">
								      <h4>
								        <a data-toggle="collapse" href="#collapse{{$category->id}}" aria-expanded="true" aria-controls="collapse{{$category->id}}">
								          {{ $category->name }}
								        </a>
								      </h4>
								    </div>

								    <div id="collapse{{$category->id}}" class="collapse" role="tabpanel" aria-labelledby="heading{{$category->id}}" data-parent="#accordion">
								      <div class="card-body">

												<div class="subcategoria">
								        	@unless($category->subcategories->count())
						    						<p>No items.</p>
													@else
									        @foreach($category->subcategories as $subcategory )
														
														<div class="col-md-9">
															<p>{{ $subcategory->name }}</p>
														</div>
														<div class="col-md-3">
															<div class="btn-group pull-right">
															<a class="btn btn-small" href="{{ route('backend.subcategories.edit', ['id' => $subcategory->id])}}"><i class="fa fa-edit"></i></a>
															<a href="{{ route('backend.subcategories.destroy', ['id' => $subcategory->id])}}" class="delete btn btn-small" data-confirm="Confirma eliminar ésta Subcategoria? - Todos sus productos dependientes tambien serán eliminados de manera definitiva."><i class="fa fa-trash-o"></i></a>	
															</div>
														</div>
		
									        @endforeach
								        @endunless
								        </div>

								      </div>
								    </div>
								  </div>


								</div>


								@endforeach


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

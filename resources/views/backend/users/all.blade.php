@extends('layouts.backend')

@section('content')





<style>
	.border{border:1px solid #e2e2e2; border-radius: .3em; padding: .3em .8em; margin-bottom: 2px; float: left; width: 100%}
</style>
<!--row -->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<h3 class="box-title">Usuarios
				<div class="col-md-2 col-sm-4 col-xs-12 pull-right text-right">
					
					<!-- <a class="btn btn-primary btn-block btn-rounded waves-effect waves-light" href="{{ route('backend.subcategories.new') }}"> + SubCategoria </a> -->
				</div>
			</h3>
			<div class="table-responsive">


				@foreach ($users as $user)

				<div class="card">
					<div class="card-block">
						<h4 class="card-title">{{ $user->email }} | {{ $user->name }}</h4>
						<h6 class="card-subtitle mb-2 text-muted"> Registrado: {{ $user->created_at }} </h6>
						<!-- <p class="card-text"></p> -->
						<hr>
						<!-- <a href="#" class="card-link">Ver compras</a>
						<a href="#" class="card-link">Another link</a> -->
					</div>
				</div>
				@endforeach


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
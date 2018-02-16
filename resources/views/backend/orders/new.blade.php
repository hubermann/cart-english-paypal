
@extends('layouts.backend')

@section('content')

<!--row -->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<h3 class="box-name">Categorias</h3>

	
			

				<form action="{{ route('backend.categories.create') }}" method="post">
				{{ csrf_field() }}
				<fieldset>

				<div class="form-group">
					<label for="name">Nombre</label>
					<input type="text" name="name" class="form-control" value="{{ old('name') }}">
					@if ($errors->has('name'))
              <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
          @endif
				</div>


				<div class="form-group">
					<label for="title">Destacada? (aparece en menu principal)</label>
					<select name="outstanding">
						<option value="0">Sin destacar</option>
						<option value="1">Destacada</option>
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





@extends('layouts.backend')

@section('content')

<!--row -->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<h3 class="box-name">Categorias</h3>

				<form action="{{ route('backend.subcategories.create') }}" method="post">
				{{ csrf_field() }}
				<fieldset>

				<div class="form-group">
					<label for="title">Categoria</label>
						<select name="category_id" id="category" class="form-control" selected="{{ old('category') }}">
							@foreach($categories as $category)
						     <option value="{{ $category->id }}">{{ $category->name }}</option>
						  @endforeach
						</select>
					
				
					@if ($errors->has('title'))
              <span class="help-block">
                  <strong>{{ $errors->first('category') }}</strong>
              </span>
          @endif
          </div>

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
					<button class="btn btn-primary" type="submit">Crear</button>
				</div>

				</fieldset>
				</form>


			</div>
	</div>
</div>
<!-- /.row -->

@endsection




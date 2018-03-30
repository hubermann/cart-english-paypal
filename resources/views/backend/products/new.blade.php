
@extends('layouts.backend')

@section('content')

<style>
	#field {
    margin-bottom:20px;
}
</style>
<!--row -->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<h3 class="box-title">products</h3>

	
			

				<form action="{{ route('backend.products.create') }}" method="post">
				{{ csrf_field() }}
				<fieldset>

				<div class="form-group">
					<label for="title">Categoria</label>
						<select name="category_id" id="category_id" class="form-control" selected="{{ old('category_id') }}">
						<option value="">Seleccione Categoria</option>
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
					<label for="title">Subcategoria</label>
						<select name="subcategory_id" id="subcategory_id" class="form-control" selected="{{ old('subcategory_id') }}">
							<!-- ajax subcategories -->
						</select>
					
				
					@if ($errors->has('title'))
              <span class="help-block">
                  <strong>{{ $errors->first('category') }}</strong>
              </span>
          @endif
				</div>

				<div class="form-group">
					<label for="title">Titulo</label>
					<input type="text" name="title" class="form-control" value="{{ old('title') }}">
					@if ($errors->has('title'))
              <span class="help-block">
                  <strong>{{ $errors->first('title') }}</strong>
              </span>
          @endif
				</div>

				<div class="row">
					<!-- <div class="col-md-4">
						<div class="form-group">
							<label for="title">Cantidad en stock</label>
							<input type="text" name="qty" class="form-control" value="{{ old('qty') }}">
							@if ($errors->has('qty'))
								<span class="help-block">
									<strong>{{ $errors->first('qty') }}</strong>
								</span>
							@endif
						</div>
					</div> -->

					<div class="col-md-4">
						<div class="form-group">
							<label for="title">Producto destacado?</label>
							<select name="outstanding">
								<option value="0" >Sin destacar</option>
								<option value="1">Destacado</option>
							</select>
						</div>
					</div>


				<div class="col-md-4">
						<div class="form-group">
							<label for="title">Precio</label>
							<input type="text" name="price" class="form-control" value="{{ old('price') }}">
							@if ($errors->has('price'))
		              <span class="help-block">
		                  <strong>{{ $errors->first('price') }}</strong>
		              </span>
		          @endif
						</div>
					</div>

				</div>

				<div class="row">

				<div class="col-md-12">
					<table class="field_wrapper table">
						<tr>
							<p><cite>Aqui se puede agregar campos de descripcion tipo propiedad:valor. Por ejemplo "Marca": "Intel", "Procesador": "1.4 Mghz"...etc. </cite></p>
						</tr>
						<tr>
							<td class="td"><input type="text" class="form-control" name="prod_propiedad[]" value="" placeholder="Propiedad" /></td>
							<td class="td"><input type="text" class="form-control" name="prod_valor[]" value="" placeholder="Valor"/></td>
						</tr>

					</table>
				</div>

				<div class="row">
					<div class="col-md-12">
						
						<a href="javascript:void(0);" class="btn btn-info add_button" title="Add field">+Agregar</a>
					</div>
					<br>
					<br>
				</div>

				<div class="form-group">
					<label for="title">Description</label>
					<textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
					@if ($errors->has('description'))
              <span class="help-block">
                  <strong>{{ $errors->first('description') }}</strong>
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





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

				<form action="{{ route('backend.products.update') }}" method="post">
				{{ csrf_field() }}
				<fieldset>

				<input type="hidden" name="id" id="id" value="{{$product->id}}">

				<div class="form-group">
					<label for="title">Categoria</label>
						<select name="category_id" id="category_id" class="form-control">
						<option value="">Seleccione Categoria</option>
							@foreach($categories as $category)
						     <option value="{{ $category->id }}"
						     @if ($category->id == $product->category_id)
									selected
								@endif
								>{{ $category->name }}</option>
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
						<select name="subcategory_id" id="subcategory_id" class="form-control">
							@foreach($subcategories as $subcategory)
						     <option value="{{ $subcategory->id }}"
						     @if ($subcategory->id == $product->subcategory_id)
									selected
								@endif
								>{{ $subcategory->name }}</option>
						  @endforeach
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
					<input type="text" name="title" class="form-control" value="{{$product->title}}">
					@if ($errors->has('title'))
              <span class="help-block">
                  <strong>{{ $errors->first('title') }}</strong>
              </span>
          @endif
				</div>


				

				
				<div class="row">
					
					<div class="col-md-4">
						<div class="form-group">
							<label for="title">Cantidad en Stock</label>
							<input type="text" name="qty" class="form-control" value="{{$product->qty}}">
							@if ($errors->has('qty'))
		              <span class="help-block">
		                  <strong>{{ $errors->first('qty') }}</strong>
		              </span>
		          @endif
						</div>
					</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="title">Destacado?</label>
						<select name="outstanding">
							<option value="0" @if ($product->outstanding == 0)
										selected
									@endif
									>Sin destacar</option>
							<option value="1"
							@if ($product->outstanding == 1)
										selected
									@endif
									>Destacado</option>
						</select>
					</div>
				</div>

					<div class="col-md-4">
						<div class="form-group">
							<label for="title">Price</label>
							<input type="text" name="price" class="form-control" value="{{$product->price}}">
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

						<tr id="dinamic0">
						<?php $counter = 0 ?>
							@foreach(json_decode($product->dinamic_fields, true) as $key => $value)
								<td class="td"><input type="text" class="form-control" name="prod_propiedad[]" value="{{ $value['propiedad'] }}" /></td>
								<td class="td"><input type="text" class="form-control" name="prod_valor[]" value="{{ $value['valor'] }}" /></td>	
								<td><p onclick="delete_dinamic('<?php echo $counter; ?>')">Delete</p></td>
								</tr><tr <?php  $counter++; echo 'id="dinamic'.$counter.'"'; ?>> 

							@endforeach
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
					<textarea name="description" id="description" cols="30" rows="10" class="form-control"> {{$product->description}} </textarea>
					@if ($errors->has('description'))
              <span class="help-block">
                  <strong>{{ $errors->first('description') }}</strong>
              </span>
          @endif
				</div>

				<div class="form-group">
					<button class="btn btn-primary" type="submit">Actualizar</button>
				</div>

				</fieldset>
				</form>


			</div>
	</div>
</div>
<!-- /.row -->

@endsection




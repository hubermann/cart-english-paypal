
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
			<h3 class="box-title">Agregar una imagen</h3>
			<p>Producto: {{ $product->title }}</p>
			<hr>
				<form action="{{ route('backend.products.upload_image') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<fieldset>

				<input type="hidden" name="id" id="id" value="{{$product->id}}">

				<div class="form-group">
					<label for="title">Seleccione una imagen para asociar al producto:</label>
						<input type="file" name="input_img" id="input_img">
				
				</div>


				<div class="form-group">
					<button class="btn btn-primary" type="submit">Asociar imagen</button>
				</div>

				</fieldset>
				</form>


			</div>
	</div>
</div>
<!-- /.row -->
<!--row -->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<h3 class="box-title">Images products</h3>

				<div class="row">
						<?php $counter = 0 ?>
  					@foreach($images as $image)
					  <div class="col-md-4">
					    <div class="thumbnail">
					        <img src="{{'/images-products/'.$image->filename}}" alt="image" style="width:100%">
					        <div class="caption">
					        <a href="{{ route('backend.images.destroy', ['id' => $image->id]) }}" class="delete btn btn-small btn btn-danger" data-confirm="Comfirma eliminar definitivamente ésta imagen?">Remover  <i class="fa fa-trash-o"></i></a>
					         
					        </div>
					    </div>
					  </div>
					  <?php  $counter++; if($counter==3){ echo "</div><div class=\"row\">"; $counter=0;} ?>
					  @endforeach
				</div>


			</div>
	</div>
</div>
<!-- /.row -->
@endsection




@extends('layouts.backend')

@section('content')

<!--row -->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<h3 class="box-name">Categorias</h3>




				<form action="{{ route('backend.sliders.create') }}" method="post" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<fieldset>

				<div class="form-group">
					<label for="name">Title</label>
					<input type="text" name="title" class="form-control" value="{{ old('title') }}">
					@if ($errors->has('name'))
              <span class="help-block">
                  <strong>{{ $errors->first('title') }}</strong>
              </span>
          @endif
				</div>

				<div class="form-group">
					<label for="name">text</label>
					<input type="text" name="text" class="form-control" value="{{ old('text') }}">
					@if ($errors->has('text'))
              <span class="help-block">
                  <strong>{{ $errors->first('text') }}</strong>
              </span>
          @endif
				</div>

				<div class="form-group">
					<label for="name">Link</label>
					<input type="text" name="link" class="form-control" value="{{ old('link') }}">
					@if ($errors->has('link'))
              <span class="help-block">
                  <strong>{{ $errors->first('link') }}</strong>
              </span>
          @endif
				</div>

				<div class="form-group">
					<label for="name">Title button</label>
					<input type="text" name="title_button" class="form-control" value="{{ old('title_button') }}">
					@if ($errors->has('title_button'))
              <span class="help-block">
                  <strong>{{ $errors->first('title_button') }}</strong>
              </span>
          @endif
				</div>


				<div class="form-group">
					<label for="title">Seleccione una imagen:</label>
						<input type="file" name="input_img" id="input_img">

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

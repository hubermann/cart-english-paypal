
@extends('layouts.backend')

@section('content')

<!--row -->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<h3 class="box-title">Notes</h3>

	
			

				<form action="{{ route('backend.notes.create') }}" method="post">
				{{ csrf_field() }}
				<fieldset>

				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" class="form-control" value="{{ old('title') }}">
					@if ($errors->has('title'))
              <span class="help-block">
                  <strong>{{ $errors->first('title') }}</strong>
              </span>
          @endif
				</div>

				<div class="form-group">
					<label for="title">Description</label>
					<textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
					@if ($errors->has('body'))
              <span class="help-block">
                  <strong>{{ $errors->first('body') }}</strong>
              </span>
          @endif
				</div>

				<div class="form-group">
					<button class="btn btn-primary" type="submit">Create</button>
				</div>

				</fieldset>
				</form>


			</div>
	</div>
</div>
<!-- /.row -->

@endsection





@extends('layouts.backend')

@section('content')

<div class="container-fluid">
	@foreach ($users as $user)
		<div class="row">

			<form action="{{ route('backend.users.update') }}" method="post">
				{{ csrf_field() }}
						
				<div class="col-md-3">
					<div class="form-group">
				    <label for="exampleInputEmail1">Email address</label>
				    <input type="hidden" name="email" value="{{ $user->email }}">
				    {{ $user->email }} {{ $user->name }}  
				    <small id="emailHelp" class="form-text text-muted">{{ $user->role}}.</small>
				  </div>
				</div>
				
				<div class="col-md-3">
					<div class="form-group">
				    <label for="exampleInputPassword1">Superadmin</label>
				    <input type="checkbox" <?= $user->hasRole('Superadmin') ? "checked" : "" ?> name="role_superadmin" />
				  </div>
				</div>
				
				<div class="col-md-3">
					<div class="form-group">
				    <label for="exampleInputPassword1">Frontend</label>
				    <input type="checkbox" <?= $user->hasRole('Frontend') ? "checked" : "" ?> name="role_frontend">
				  </div>
				</div>
				
				<div class="col-md-3">
					<div class="form-group">
				    <button type="submit" class="btn btn-primary">Submit</button>
				  </div>
				</div>
				
			</form>

		</div>
	@endforeach
</div>

@endsection
@extends('layouts.frontend')

@section('content') 

<div class="container">
	<div class="col-md-12">
		<div class="row">
			<h2>Proceed to pay.</h2>



				<a class="btn u-btn-primary g-font-size-12 text-uppercase g-py-10 g-px-20" href="<?php echo $preference['response']['init_point']; ?>">Pay</a>


		</div>
	</div>
</div>
@endsection
@extends('layouts.backend')

@section('content')

<!--row -->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<h3 class="box-title">sliders
				<div class="col-md-2 col-sm-4 col-xs-12 pull-right text-right">
					<!-- <select class="form-control pull-right row b-none">
						<option>March 2016</option>
						<option>April 2016</option>
						<option>May 2016</option>
						<option>June 2016</option>
						<option>July 2016</option>
					</select> -->
					<a class="btn btn-primary btn-block btn-rounded waves-effect waves-light" href="{{ route('backend.sliders.new') }}"> + Slider </a>
				</div>
			</h3>
			<div class="table-responsive">


					@unless($sliders->count())
					    <p>No items.</p>
					@else


					

								@foreach($sliders as $slider)
									<div class="card col-md-4" style="width: 20rem;">
									  <img class="card-img-top" src="{{'/images-sliders/'.$slider->filename}}" alt="Card image cap" width="100%">

									  <div class="card-block">
									    <h4 class="card-title">{{ $slider->title }}</h4>
									    <p class="card-text">{{ $slider->text }}</p>
									    <p class="card-text"> {{ $slider->title_button }} - {{ $slider->link }}</p>

									    <a href="{{ route('backend.sliders.destroy', ['id' => $slider->id])}}" class="delete  btn btn-primary" data-confirm="Confirm destroy this slider?">Delete <i class="fa fa-trash-o"></i></a>


									  </div>
									</div>
								@endforeach


					@endunless
				


			</div>

		</div>

	</div>
</div>
<!-- /.row -->

@endsection

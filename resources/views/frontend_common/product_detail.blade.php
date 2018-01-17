@extends('layouts.frontend')

@section('content')

<section>
  

<!-- Breadcrumbs -->
<section class="g-brd-bottom g-brd-gray-light-v4 g-py-30">
  <div class="container">
    <ul class="u-list-inline">
      <li class="list-inline-item g-mr-5">
        <a class="u-link-v5 g-color-text" href="{{ URL::to('/') }}">Home</a>
        <i class="g-color-gray-light-v2 g-ml-5 fa fa-angle-right"></i>
      </li>
      <li class="list-inline-item g-mr-5">
        <a class="u-link-v5 g-color-text" href="{{ URL::to('/products') }}">Products</a>
        <i class="g-color-gray-light-v2 g-ml-5 fa fa-angle-right"></i>
      </li>
      <li class="list-inline-item g-color-primary">
        <span>{{ $product->title}}</span>
      </li>
    </ul>
  </div>
</section>
<!-- End Breadcrumbs -->

      <!-- Product Description -->
      <div class="container g-py-50">
        <div class="row">
          

          <div class="col-lg-7 ">
          


          @if($product->images->count())
            <!-- carousel -->
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                @foreach( $product->images as $key => $image )
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="{{ $key == 0 ? ' active' : '' }}"></li>
                @endforeach
              </ol>
              <div class="carousel-inner">
                
              @foreach( $product->images as $key => $image )
                  <div class="carousel-item {{ $key == 0 ? ' active' : '' }}" >
                      <img class="d-block w-100" src="{{'/images-products/'.$image->filename }}" alt="{{ $product->title }}">
                  </div>
              @endforeach
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            <!-- end carousel  -->
            @else
              
              <div class="col-md-12">
                <img class="w-100" src="{{ URL::to('/') }}/images/no-image-available.jpg" alt="{{ $product->title }}">
              </div>

            @endif
          
          </div>

          <div class="col-lg-5">
            <div class="g-px-40--lg g-pt-70">
              <!-- Product Info -->
              <div class="g-mb-30">
                <h1 class="g-font-weight-300 mb-4">{{ $product->title }}</h1>
                <p>{{ $product->description }}</p>
              </div>
              <!-- End Product Info -->

              <!-- Price -->
              <div class="g-mb-30">
                <h2 class="g-color-gray-dark-v5 g-font-weight-400 g-font-size-12 text-uppercase mb-2">Precio</h2>
                <span class="g-color-black g-font-weight-500 g-font-size-30 mr-2">$ {{ number_format($product->price, 2) }}</span>
              </div>
              <!-- End Price -->

               <hr>

              @foreach(json_decode($product->dinamic_fields, true) as $key => $value)
                <div class="row ">
                  <div class="col-md-6 g-font-weight-400 g-font-size-default mb-0 g-color-gray-dark-v5 ">{{ $value['propiedad'] }}</div>
                  <div class="col-md-6 g-font-weight-400 g-font-size-default mb-0 g-color-gray-dark-v5 text-right">{{ $value['valor'] }}</div>
                </div>
                <hr>
              @endforeach

              <!-- Accordion -->
              

              <!-- Buttons -->
              <div class="row g-mx-minus-5 g-mb-20">
                <div class="col g-px-5 g-mb-10">
                 
                  <form method="POST" action="{{url('cart')}}">
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button class="btn btn-block u-btn-primary g-font-size-12 text-uppercase g-py-15 g-px-25" type="submit">
                      Add to Cart <i class="align-middle ml-2 icon-finance-100 u-line-icon-pro"></i>
                    </button>
                  </form>

                </div>
                <div class="col g-px-5 g-mb-10">
                 
                </div>
              </div>
              <!-- End Buttons -->

            </div>
          </div>
        </div>
      </div>
      <!-- End Product Description -->   

</section>

@endsection
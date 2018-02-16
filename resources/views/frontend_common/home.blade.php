@extends('layouts.frontend')

@section('content')

<style>
.carousel-caption{ bottom: 180px;}
.carousel-caption h3{font-size: 4em;}
</style>

@if($sliders->count())
<!-- carousel -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    @foreach( $sliders as $key => $slider )
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="{{ $key == 0 ? ' active' : '' }}"></li>
    @endforeach
  </ol>
  <div class="carousel-inner">

  @foreach( $sliders as $key => $slider )
      <div class="carousel-item {{ $key == 0 ? ' active' : '' }}" >
          <img class="d-block w-100" src="{{'/images-sliders/'.$slider->filename }}" alt="{{ $slider->title }}">

      <div class="carousel-caption">
          @if ($slider->title)
            <h3> {{$slider->title}}</h3>
          @endif
          @if ($slider->text)
            <h5> {{$slider->text}}</h5>
          @endif

          @if ($slider->link)
            <a href="{{$slider->link}}" class="btn btn-primary" >{{$slider->title_button}}</a>
          @endif
      </div>




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
@endif


<!--   PRODUCTOS DESTACADOS  -->

@if(count($outstandings))

<div class="container g-pt-100 g-pb-70">
  <div class="text-center mx-auto g-max-width-600 g-mb-50">
    <h2 class="g-color-black mb-4">New Arrivals</h2>
    <p class="lead">We want to create a range of beautiful, practical and modern outerwear that doesn't cost the earth – but let's you still live life in style.</p>
  </div>


  <div class="row g-mx-minus-10">


    @foreach($outstandings as $outstanding)
      <div class="col-sm-6 col-md-4 g-px-10 g-mb-30">
      <!-- Blog Background Overlay Blocks -->
      <article class="u-block-hover">
        <div class="g-bg-cover g-bg-white-gradient-opacity-v1--after">
          @if ( count($outstanding->images))
              <img class="d-flex align-items-end u-block-hover__main--mover-down" src="{{'/images-products/'.$outstanding->images[0]->filename }}" alt="{{ $outstanding->title }}">
          @else
              <img class="d-flex align-items-end u-block-hover__main--mover-down" src="{{ URL::to('/') }}/images/no-image-available.jpg" alt="{{ $outstanding->title }}">
          @endif

        </div>
        <div class="u-block-hover__additional--partially-slide-up text-center g-z-index-1 mt-auto">
          <div class="u-block-hover__visible g-pa-25">
            <!-- <span class="d-block g-color-white-opacity-0_7 g-font-size-13 mb-2">design</span> -->
            <h2 class="h4 g-color-white g-font-weight-400 mb-3">
              <a class="u-link-v5 g-color-white g-color-primary--hover g-cursor-pointer" href="{{ route('frontend.product_detail', ['id' => $outstanding->id]) }}">{{ $outstanding->title }}</a>
            </h2>
            <h4 class="d-inline-block g-color-white-opacity-0_7 g-font-size-11 mb-0">
              <a class="g-color-white-opacity-0_7 text-uppercase" href="{{ route('frontend.by_category', ['id' => $outstanding->category_id]) }}">{{ $outstanding->get_category_name($outstanding->category_id) }}</a>
              -
              <a class="g-color-white-opacity-0_7 text-uppercase" href="{{ route('frontend.by_subcategory', ['id' => $outstanding->subcategory_id]) }}">{{$outstanding->get_subcategory_name($outstanding->subcategory_id) }}</a>


            </h4>
            <div class="mb-4"></span>
          </div>

          <a class="d-inline-block g-brd-bottom g-brd-white g-color-white g-font-weight-500 g-font-size-12 text-uppercase g-text-underline--none--hover g-mb-30" href="{{ route('frontend.product_detail', ['id' => $outstanding->id]) }}">Ver más</a>
        </div>

      </article>
      <!-- End Blog Background Overlay Blocks -->
    </div>
    @endforeach

  </div>
</div>


@endif


<!--  PRODUCTOS BOXES  -->

<section class="container g-py-100">

  <div class="row g-mx-minus-10 g-mb-50">



    <style>
    .border-none{border: none;}
    .background-none{background: none;}
    </style>

@if($products->count())

  @foreach($products as $product)

    <div class="col-md-6 col-lg-4 g-px-10">
      <!-- Article -->
      <article class="media g-brd-around g-brd-gray-light-v4 g-bg-white rounded g-pa-10 g-mb-20">
        <!-- Article Image -->
        <div class="g-max-width-100 g-mr-15">


        @if ( count($product->images))
            <img class="d-flex w-100" src="{{'/images-products/'.$product->images[0]->filename }}" alt="Image Description">
        @else
            <img class="d-flex w-100" src="{{ URL::to('/') }}/images/no-image-available.jpg" alt="Image Description">
        @endif


        </div>
        <!-- End Article Image -->

        <!-- Article Info -->
        <div class="media-body align-self-center">
          <h4 class="h5 g-mb-7">

            <a class="g-color-black g-color-primary--hover g-text-underline--none--hover" href="{{ route('frontend.product_detail', ['id' => $product->id]) }}">{{ $product->title }}</a>
          </h4>
          <p class="g-color-gray-dark-v5">
          <a class="d-inline-block g-color-gray-dark-v5 g-font-size-13 g-mb-10" href="{{ route('frontend.by_category', ['id' => $product->category_id]) }}">{{$product->get_category_name($product->category_id) }}</a> / <a class="d-inline-block g-color-gray-dark-v5 g-font-size-13 g-mb-10" href="{{ route('frontend.by_subcategory', ['id' => $product->subcategory_id]) }}">{{$product->get_subcategory_name($product->subcategory_id) }}</a>
          </p>
          <!-- End Article Info -->

          <!-- Article Footer -->
          <footer class="d-flex justify-content-between g-font-size-16">
            <span class="g-color-black g-line-height-1">${{ number_format($product->price, 2) }}</span>
            <ul class="list-inline g-color-gray-light-v2 g-font-size-14 g-line-height-1">
              <li class="list-inline-item align-middle g-brd-gray-light-v3 g-pr-10 g-mr-6">
                <form method="POST" action="{{url('cart')}}">
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit" class="g-color-gray-dark-v5 g-color-primary--hover border-none background-none g-text-underline--none--hover" href="#" title="" data-toggle="tooltip" data-placement="top" data-original-title="Add to Cart">
                    <i class="icon-finance-100 u-line-icon-pro"></i>
                  </button>
                </form>
              </li>

            </ul>
          </footer>
          <!-- End Article Footer -->
        </div>
      </article>
      <!-- End Article -->
    </div>

  @endforeach

@endif

  </div>

  <div class="text-center">
    <a class="btn u-btn-primary g-font-size-12 text-uppercase g-py-12 g-px-25" href="{{ route('frontend.products') }}">All Products</a>
  </div>
</section>



@endsection

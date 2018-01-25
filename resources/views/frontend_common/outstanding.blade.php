
@if(count($outstandings))

<div class="container g-pt-100 g-pb-70">
  <div class="text-center mx-auto g-max-width-600 g-mb-50">
    <h2 class="g-color-black mb-4">Outstandings</h2>
    <!-- <p class="lead">Keep in touch with the latest blogs &amp; news.</p> -->
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
              <a class="u-link-v5 g-color-white g-color-primary--hover g-cursor-pointer" href="#">{{ $outstanding->title }}</a>
            </h2>
            <h4 class="d-inline-block g-color-white-opacity-0_7 g-font-size-11 mb-0">
              <a class="g-color-white-opacity-0_7 text-uppercase" href="#">{{ $outstanding->get_category_name($outstanding->category_id) }}</a>
              -
              <a class="g-color-white-opacity-0_7 text-uppercase" href="#">{{$outstanding->get_subcategory_name($outstanding->subcategory_id) }}</a>

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

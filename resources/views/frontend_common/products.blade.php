@extends('layouts.frontend')

@section('content')
<!-- Products -->
<div class="container">
<div class="row">
<!-- Content -->
<div class="col-md-9 order-md-2">
<div class="g-pl-15--lg">


<?php  
// <!-- Filters -->
// <div class="d-flex justify-content-end align-items-center g-brd-bottom g-brd-gray-light-v4 g-pt-40 g-pb-20">
//   <!-- Show -->
//   <div class="g-mr-60">
//     <h2 class="h6 align-middle d-inline-block g-font-weight-400 text-uppercase g-pos-rel g-top-1 mb-0">Show:</h2>

//     <!-- Secondary Button -->
//     <div class="d-inline-block btn-group g-line-height-1_2">
//       <button type="button" class="btn btn-secondary dropdown-toggle h6 align-middle g-brd-none g-color-gray-dark-v5 g-color-black--hover g-bg-transparent text-uppercase g-font-weight-300 g-font-size-12 g-pa-0 g-pl-10 g-ma-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
//         9
//       </button>
//       <div class="dropdown-menu rounded-0">
//         <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#">All</a>
//         <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#">5</a>
//         <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#">15</a>
//         <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#">20</a>
//         <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#">25</a>
//       </div>
//     </div>
//     <!-- End Secondary Button -->
//   </div>
//   <!-- End Show -->

//   <!-- Sort By -->
//   <div class="g-mr-60">
//     <h2 class="h6 align-middle d-inline-block g-font-weight-400 text-uppercase g-pos-rel g-top-1 mb-0">Sort by:</h2>

//     <!-- Secondary Button -->
//     <div class="d-inline-block btn-group g-line-height-1_2">
//       <button type="button" class="btn btn-secondary dropdown-toggle h6 align-middle g-brd-none g-color-gray-dark-v5 g-color-black--hover g-bg-transparent text-uppercase g-font-weight-300 g-font-size-12 g-pa-0 g-pl-10 g-ma-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
//         Bestseller
//       </button>
//       <div class="dropdown-menu rounded-0">
//         <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#">Bestseller</a>
//         <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#">Trending</a>
//         <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#">Price low to high</a>
//         <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#">price high to low</a>
//       </div>
//     </div>
//     <!-- End Secondary Button -->
//   </div>
//   <!-- End Sort By -->

//   <!-- Sort By -->
//   <ul class="list-inline mb-0">
//     <li class="list-inline-item">
//       <a class="u-icon-v2 u-icon-size--xs g-brd-gray-light-v3 g-brd-black--hover g-color-gray-dark-v5 g-color-black--hover" href="page-list-filter-left-sidebar-1.html">
//         <i class="icon-list"></i>
//       </a>
//     </li>
//     <li class="list-inline-item">
//       <a class="u-icon-v2 u-icon-size--xs g-brd-primary g-color-primary" href="page-grid-filter-left-sidebar-1.html">
//         <i class="icon-grid"></i>
//       </a>
//     </li>
//   </ul>
//   <!-- End Sort By -->
// </div>
// <!-- End Filters -->
?>





 

@unless($products->count())
    <li>No products.</li>
@else
  @foreach($products as $product)
      <div class="col-6 col-lg-4 g-mb-30">
        <!-- Product -->
        <figure class="g-pos-rel g-mb-20">
          <img class="img-fluid" src="{{ URL::to('/') }}/images/no-image-available.jpg" alt="Image Description">

          <figcaption class="w-100 g-bg-lightred text-center g-pos-abs g-bottom-0 g-transition-0_2 g-py-5">
            <span class="g-color-white g-font-size-11 text-uppercase g-letter-spacing-1">Sold Out
          </span></figcaption>
        </figure>

        <div class="media">
          <!-- Product Info -->
          <div class="d-flex flex-column">
            <h4 class="h6 g-color-black mb-1">
              <a class="u-link-v5 g-color-black g-color-primary--hover" href="{{ route('frontend.product_detail', ['id' => $product->id]) }}">
                {{$product->title}} 
              </a>
            </h4>
            <a class="d-inline-block g-color-gray-dark-v5 g-font-size-13" href="#">{{$product->category}} / {{$product->subcategory}}</a>
            <span class="d-block g-color-black g-font-size-17">{{ number_format($product->price, 2) }}</span>
          </div>
          <!-- End Product Info -->

          <!-- Products Icons -->
          <ul class="list-inline media-body text-right">
            <li class="list-inline-item align-middle mx-0">
              <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover g-font-size-15 rounded-circle" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Cart">
                <i class="icon-finance-100 u-line-icon-pro"></i>
              </a>
            </li>
            <li class="list-inline-item align-middle mx-0">
              <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover g-font-size-15 rounded-circle" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wishlist">
                <i class="icon-medical-022 u-line-icon-pro"></i>
              </a>
            </li>
          </ul>
          <!-- End Products Icons -->
        </div>
        <!-- End Product -->
      </div>
  @endforeach
@endunless





<hr class="g-mb-60">

        <!-- Pagination -->
        <nav class="g-mb-100" aria-label="Page Navigation">
          <ul class="list-inline mb-0">
            <li class="list-inline-item hidden-down">
              <a class="active u-pagination-v1__item g-width-30 g-height-30 g-brd-gray-light-v3 g-brd-primary--active g-color-white g-bg-primary--active g-font-size-12 rounded-circle g-pa-5" href="#">1</a>
            </li>
            <li class="list-inline-item hidden-down">
              <a class="u-pagination-v1__item g-width-30 g-height-30 g-color-gray-dark-v5 g-color-primary--hover g-font-size-12 rounded-circle g-pa-5" href="#">2</a>
            </li>
            <li class="list-inline-item g-hidden-xs-down">
              <a class="u-pagination-v1__item g-width-30 g-height-30 g-color-gray-dark-v5 g-color-primary--hover g-font-size-12 rounded-circle g-pa-5" href="#">3</a>
            </li>
            <li class="list-inline-item hidden-down">
              <span class="g-width-30 g-height-30 g-color-gray-dark-v5 g-font-size-12 rounded-circle g-pa-5">...</span>
            </li>
            <li class="list-inline-item g-hidden-xs-down">
              <a class="u-pagination-v1__item g-width-30 g-height-30 g-color-gray-dark-v5 g-color-primary--hover g-font-size-12 rounded-circle g-pa-5" href="#">15</a>
            </li>
            <li class="list-inline-item">
              <a class="u-pagination-v1__item g-width-30 g-height-30 g-brd-gray-light-v3 g-brd-primary--hover g-color-gray-dark-v5 g-color-primary--hover g-font-size-12 rounded-circle g-pa-5 g-ml-15" href="#" aria-label="Next">
                <span aria-hidden="true">
                  <i class="fa fa-angle-right"></i>
                </span>
                <span class="sr-only">Next</span>
              </a>
            </li>
            <li class="list-inline-item float-right">
              <span class="u-pagination-v1__item-info g-color-gray-dark-v4 g-font-size-12 g-pa-5">Page 1 of 15</span>
            </li>
          </ul>
        </nav>
        <!-- End Pagination -->
      </div>
    </div>
    <!-- End Content -->

    <!-- Filters -->
    <div class="col-md-3 order-md-1 g-brd-right--lg g-brd-gray-light-v4 g-pt-40">
      <div class="g-pr-15--lg g-pt-60">
        <!-- Categories -->
        <div class="g-mb-30">
          <h3 class="h5 mb-3">Categories</h3>

          <ul class="list-unstyled">

          @unless($categories->count())
              <li>No items.</li>
          @else
            @foreach($categories as $category)
                <li class="my-3">
                  <a class="d-block u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#">{{ $category->name }}
                    <span class="float-right g-font-size-12">#</span></a>
                </li>
            @endforeach
          @endunless

          </ul>
        </div>
        <!-- End Categories -->

        <hr>

        <!-- Pricing -->
        <div class="g-mb-30">
          <h3 class="h5 mb-3">Pricing</h3>

          <div class="text-center">
            <span class="d-block g-color-primary mb-4">$(<span id="rangeSliderAmount3">0</span>)</span>
            <div id="rangeSlider1" class="u-slider-v1-3"
                 data-result-container="rangeSliderAmount3"
                 data-range="true"
                 data-default="180, 320"
                 data-min="0"
                 data-max="500"></div>
          </div>
        </div>
        <!-- End Pricing -->

        <hr>

        <!-- Brand -->
        <div class="g-mb-30">
          <h3 class="h5 mb-3">Brand</h3>

          <ul class="list-unstyled">
            <li class="my-2">
              <label class="form-check-inline u-check d-block u-link-v5 g-color-gray-dark-v4 g-color-primary--hover g-pl-30">
                <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox">
                <span class="d-block u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                  <i class="fa" data-check-icon="&#xf00c"></i>
                </span>
                Mango <span class="float-right g-font-size-13">24</span>
              </label>
            </li>
            <li class="my-2">
              <label class="form-check-inline u-check d-block u-link-v5 g-color-gray-dark-v4 g-color-primary--hover g-pl-30">
                <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" checked>
                <span class="d-block u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                  <i class="fa" data-check-icon="&#xf00c"></i>
                </span>
                Gucci <span class="float-right g-font-size-13">334</span>
              </label>
            </li>
            <li class="my-2">
              <label class="form-check-inline u-check d-block u-link-v5 g-color-gray-dark-v4 g-color-primary--hover g-pl-30">
                <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox">
                <span class="d-block u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                  <i class="fa" data-check-icon="&#xf00c"></i>
                </span>
                Adidas <span class="float-right g-font-size-13">18</span>
              </label>
            </li>
            <li class="my-2">
              <label class="form-check-inline u-check d-block u-link-v5 g-color-gray-dark-v4 g-color-primary--hover g-pl-30">
                <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" checked>
                <span class="d-block u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                  <i class="fa" data-check-icon="&#xf00c"></i>
                </span>
                Nike <span class="float-right g-font-size-13">6</span>
              </label>
            </li>
            <li class="my-2">
              <label class="form-check-inline u-check d-block u-link-v5 g-color-gray-dark-v4 g-color-primary--hover g-pl-30">
                <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox">
                <span class="d-block u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                  <i class="fa" data-check-icon="&#xf00c"></i>
                </span>
                Puma <span class="float-right g-font-size-13">71</span>
              </label>
            </li>
            <li class="my-2">
              <label class="form-check-inline u-check d-block u-link-v5 g-color-gray-dark-v4 g-color-primary--hover g-pl-30">
                <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox">
                <span class="d-block u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                  <i class="fa" data-check-icon="&#xf00c"></i>
                </span>
                Zara <span class="float-right g-font-size-13">9</span>
              </label>
            </li>
          </ul>
        </div>
        <!-- End Brand -->

        <hr>

        <!-- Size -->
        <div class="g-mb-30">
          <h3 class="h5 mb-3">Size</h3>

          <ul class="list-unstyled">
            <li class="my-2">
              <label class="form-check-inline u-check d-block u-link-v5 g-color-gray-dark-v4 g-color-primary--hover g-pl-30">
                <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox">
                <span class="d-block u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                  <i class="fa" data-check-icon="&#xf00c"></i>
                </span>
                S <span class="float-right g-font-size-13">24</span>
              </label>
            </li>
            <li class="my-2">
              <label class="form-check-inline u-check d-block u-link-v5 g-color-gray-dark-v4 g-color-primary--hover g-pl-30">
                <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" checked>
                <span class="d-block u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                  <i class="fa" data-check-icon="&#xf00c"></i>
                </span>
                M <span class="float-right g-font-size-13">334</span>
              </label>
            </li>
            <li class="my-2">
              <label class="form-check-inline u-check d-block u-link-v5 g-color-gray-dark-v4 g-color-primary--hover g-pl-30">
                <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox">
                <span class="d-block u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                  <i class="fa" data-check-icon="&#xf00c"></i>
                </span>
                L <span class="float-right g-font-size-13">18</span>
              </label>
            </li>
            <li class="my-2">
              <label class="form-check-inline u-check d-block u-link-v5 g-color-gray-dark-v4 g-color-primary--hover g-pl-30">
                <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox">
                <span class="d-block u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                  <i class="fa" data-check-icon="&#xf00c"></i>
                </span>
                XL <span class="float-right g-font-size-13">6</span>
              </label>
            </li>
            <li class="my-2">
              <label class="form-check-inline u-check d-block u-link-v5 g-color-gray-dark-v4 g-color-primary--hover g-pl-30">
                <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox">
                <span class="d-block u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                  <i class="fa" data-check-icon="&#xf00c"></i>
                </span>
                XXL <span class="float-right g-font-size-13">71</span>
              </label>
            </li>
          </ul>
        </div>
        <!-- End Size -->

        <hr>

        <!-- Color -->
        <div class="g-mb-30">
          <h3 class="h5 mb-3">Color</h3>

          <!-- Checkbox -->
          <ul class="list-inline mb-0">
            <li class="list-inline-item g-mr-10">
              <label class="form-check-inline u-check">
                <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radInline1_1" type="radio">
                <span class="d-block u-check-icon-checkbox-v4 g-brd-transparent g-brd-gray-dark-v4--checked rounded-circle g-absolute-centered--y g-left-0 g-mt-3">
                  <i class="d-block g-absolute-centered g-width-16 g-height-16 g-bg-primary rounded-circle"></i>
                </span>
              </label>
            </li>
            <li class="list-inline-item g-mx-10">
              <label class="form-check-inline u-check">
                <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radInline1_1" type="radio">
                <span class="d-block u-check-icon-checkbox-v4 g-brd-transparent g-brd-gray-dark-v4--checked rounded-circle g-absolute-centered--y g-left-0 g-mt-3">
                  <i class="d-block g-absolute-centered g-width-16 g-height-16 g-bg-beige rounded-circle"></i>
                </span>
              </label>
            </li>
            <li class="list-inline-item g-mx-10">
              <label class="form-check-inline u-check">
                <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radInline1_1" type="radio">
                <span class="d-block u-check-icon-checkbox-v4 g-brd-transparent g-brd-gray-dark-v4--checked rounded-circle g-absolute-centered--y g-left-0 g-mt-3">
                  <i class="d-block g-absolute-centered g-width-16 g-height-16 g-bg-black rounded-circle"></i>
                </span>
              </label>
            </li>
            <li class="list-inline-item g-mx-10">
              <label class="form-check-inline u-check">
                <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radInline1_1" type="radio">
                <span class="d-block u-check-icon-checkbox-v4 g-brd-transparent g-brd-gray-dark-v4--checked rounded-circle g-absolute-centered--y g-left-0 g-mt-3">
                  <i class="d-block g-absolute-centered g-width-16 g-height-16 g-bg-yellow rounded-circle"></i>
                </span>
              </label>
            </li>
            <li class="list-inline-item g-mx-10">
              <label class="form-check-inline u-check">
                <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radInline1_1" type="radio">
                <span class="d-block u-check-icon-checkbox-v4 g-brd-transparent g-brd-gray-dark-v4--checked rounded-circle g-absolute-centered--y g-left-0 g-mt-3">
                  <i class="d-block g-absolute-centered g-width-16 g-height-16 g-bg-blue rounded-circle"></i>
                </span>
              </label>
            </li>
            <li class="list-inline-item g-mx-10">
              <label class="form-check-inline u-check">
                <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radInline1_1" type="radio">
                <span class="d-block u-check-icon-checkbox-v4 g-brd-transparent g-brd-gray-dark-v4--checked rounded-circle g-absolute-centered--y g-left-0 g-mt-3">
                  <i class="d-block g-absolute-centered g-width-16 g-height-16 g-bg-purple rounded-circle"></i>
                </span>
              </label>
            </li>
            <li class="list-inline-item g-mx-10">
              <label class="form-check-inline u-check">
                <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radInline1_1" type="radio">
                <span class="d-block u-check-icon-checkbox-v4 g-brd-transparent g-brd-gray-dark-v4--checked rounded-circle g-absolute-centered--y g-left-0 g-mt-3">
                  <i class="d-block g-absolute-centered g-width-16 g-height-16 g-bg-brown rounded-circle"></i>
                </span>
              </label>
            </li>
            <li class="list-inline-item g-ml-10">
              <label class="form-check-inline u-check">
                <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radInline1_1" type="radio">
                <span class="d-block u-check-icon-checkbox-v4 g-brd-transparent g-brd-gray-dark-v4--checked rounded-circle g-absolute-centered--y g-left-0 g-mt-3">
                  <i class="d-block g-absolute-centered g-width-16 g-height-16 g-bg-gray-dark-v4 rounded-circle"></i>
                </span>
              </label>
            </li>
          </ul>
          <!-- End Checkbox -->
        </div>
        <!-- End Color -->

        <hr>

        <!-- Rating -->
        <div class="g-mb-30">
          <h3 class="h5 mb-3">Rating</h3>

          <ul class="js-rating u-rating-v1 g-font-size-20 g-color-gray-light-v3 mb-0" data-hover-classes="g-color-primary">
            <li class="g-color-primary click">
              <i class="fa fa-star"></i>
            </li>
            <li class="g-color-primary click">
              <i class="fa fa-star"></i>
            </li>
            <li class="g-color-primary click">
              <i class="fa fa-star"></i>
            </li>
            <li class="g-color-primary click">
              <i class="fa fa-star"></i>
            </li>
            <li>
              <i class="fa fa-star"></i>
            </li>
          </ul>
        </div>
        <!-- End Rating -->

        <hr>

        <button class="btn btn-block u-btn-black g-font-size-12 text-uppercase g-py-12 g-px-25" type="button">Reset</button>
      </div>
    </div>
    <!-- End Filters -->
  </div>
</div>
<!-- End Products -->
@endsection
      
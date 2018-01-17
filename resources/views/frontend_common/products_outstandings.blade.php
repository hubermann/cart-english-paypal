@extends('layouts.frontend')

@section('content')


<!-- Breadcrumbs -->
<section class="g-brd-bottom g-brd-gray-light-v4 g-py-30">
  <div class="container">
    <ul class="u-list-inline">
      <li class="list-inline-item g-mr-5">
        <a class="u-link-v5 g-color-text" href="{{ URL::to('/') }}">Home</a>
        <i class="g-color-gray-light-v2 g-ml-5 fa fa-angle-right"></i>
      </li>
      <li class="list-inline-item g-mr-5">
        <a class="u-link-v5 g-color-text" href="{{ URL::to('/products') }}">Productos</a>
        <i class="g-color-gray-light-v2 g-ml-5 fa fa-angle-right"></i>
      </li>
      <li class="list-inline-item g-color-primary">
        <span>Destacados</span>
      </li>
    </ul>
  </div>
</section>
<!-- End Breadcrumbs -->



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
              //       <a class="u-icon-v2 u-icon-size--xs g-brd-primary g-color-primary" href="page-list-filter-left-sidebar-1.html">
              //         <i class="icon-list"></i>
              //       </a>
              //     </li>
              //     <li class="list-inline-item">
              //       <a class="u-icon-v2 u-icon-size--xs g-brd-gray-light-v3 g-brd-black--hover g-color-gray-dark-v5 g-color-black--hover" href="page-grid-filter-left-sidebar-1.html">
              //         <i class="icon-grid"></i>
              //       </a>
              //     </li>
              //   </ul>
              //   <!-- End Sort By -->
              // </div>
              // <!-- End Filters -->

              ?>
              

     
              @unless($products->count())
                  <div class="text-center">
                    <br>
                    <h2 class="g-mb-30">No hay productos</h2>
                    <p>Esta categoria no tiene productos aún.</p>
                  </div>
              @else
                @foreach($products as $product)         
              <!-- Products -->
              <div class="g-brd-bottom g-brd-gray-light-v4">
                <div class="row g-pt-30">
                  <figure class="col-6 col-sm-5 col-lg-4 g-mb-30">

                    @if ( count($product->images))
                        <img class="img-fluid" src="{{'/images-products/'.$product->images[0]->filename }}" alt="Image Description">
                    @else
                        <img class="img-fluid" src="{{ URL::to('/') }}/images/no-image-available.jpg" alt="Image Description">
                    @endif

                  </figure>

                  <div class="col-6 col-sm-7 col-lg-8 g-mb-15">
                    <!-- Product Info -->
                    <div class="g-mb-30">
                      <h4 class="h5 g-color-black mb-0 mt-1">
                        <a class="u-link-v5 g-color-black g-color-primary--hover" href="{{ route('frontend.product_detail', ['id' => $product->id]) }}">
                          {{$product->title}}
                        </a>
                      </h4>
                      <a class="d-inline-block g-color-gray-dark-v5 g-font-size-13 mb-2" href="{{ route('frontend.by_category', ['id' => $product->category_id]) }}">{{ $product->get_category_name($product->category_id) }}</a> / <a class="d-inline-block g-color-gray-dark-v5 g-font-size-13 mb-2" href="{{ route('frontend.by_subcategory', ['id' => $product->subcategory_id]) }}"> {{$product->get_subcategory_name($product->subcategory_id) }}</a>
                      <div class="mb-4">
                        <span class="g-color-black g-font-size-20 mr-2">${{ number_format($product->price, 2) }}</span>

                      </div>
                      <p>{{ str_limit($product->description, 140) }}</p>
                    </div>
                    <!-- End Product Info -->

                    <!-- Products Icons -->
                    <!-- <ul class="list-inline g-mb-30">
                      <li class="list-inline-item align-middle g-brd-right g-brd-gray-light-v4 g-pr-20 g-mr-20">
                        <a class="d-inline-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover rounded-circle" href="#">
                          <i class="align-middle mr-1 icon-medical-022 u-line-icon-pro"></i>
                          Add to Wishlist
                        </a>
                      </li>
                      <li class="list-inline-item align-middle">
                        <a class="d-inline-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover rounded-circle" href="#">
                          <i class="align-middle mr-1 icon-finance-149 u-line-icon-pro"></i>
                          Add to Compare
                        </a>
                      </li>
                    </ul> -->
                    <!-- End Products Icons -->
                  <form method="POST" action="{{url('cart')}}">
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button class="btn u-btn-primary g-font-size-12 text-uppercase g-py-10 g-px-20" type="submit">
                      Add to Cart <i class="align-middle ml-2 icon-finance-100 u-line-icon-pro"></i>
                    </button>
                  </form>

                  </div>
                </div>
              </div>
              <!-- End Products -->
  @endforeach
@endunless

<!-- custom_pagination -->
<div class="row" id="custom-pagination">
  {{ $products->links() }}
</div>
<!-- End custom_pagination -->          

             
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
                          <a class="d-block u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="{{ route('frontend.by_category', ['id' => $category->id]) }}">{{ $category->name }}
                            <span class="float-right g-font-size-12">{{ $category->products_by_category->count() }}</span></a>
                        </li>
                    @endforeach
                  @endunless
                </ul>
              </div>
              <!-- End Categories -->

              <hr>

              <!-- Pricing -->
              <!-- <div class="g-mb-30">
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
              </div> -->
              <!-- End Pricing -->

             <!--  <hr> -->

              <!-- Brand -->
              <!-- <div class="g-mb-30">
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
              </div> -->
              <!-- End Brand -->

            
             


            </div>
          </div>
          <!-- End Filters -->
        </div>
      </div>
      <!-- End Products -->
@endsection
      
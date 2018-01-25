<!-- Footer -->
<footer class="g-bg-main-light-v1">
  <!-- Content -->
  <div class="g-brd-bottom g-brd-secondary-light-v1">
    <div class="container g-pt-100">
      <div class="row justify-content-start g-mb-30 g-mb-0--md">
        <div class="col-md-5 g-mb-30">
          <h2 class="h5 g-color-gray-light-v3 mb-4">Products</h2>

          <div class="row">


           @if( count( App\Http\Controllers\HomeController::get_categories() ))
            @foreach( App\Http\Controllers\HomeController::get_categories()->chunk(3) as $categories)
            <div class="col-4 g-mb-20">
              <ul class="list-unstyled g-font-size-13 mb-0">
                @foreach($categories as $category)

                        <li class="g-my-10">
                          <a class="u-link-v5 g-color-gray-dark-v5 g-color-primary--hover" href="#">{{ $category->name }}</a>
                        </li>

                @endforeach
                </ul>
            </div>
            @endforeach
          @endif

          </div>
        </div>

        <div class="col-sm-6 col-md-3 g-mb-30 g-mb-0--sm">
          <h2 class="h5 g-color-gray-light-v3 mb-4">Follow Us:</h2>

          <div class="row">
            <!-- Social Icons -->
          <ul class="list-inline mb-50">
            <li class="list-inline-item g-mr-2">
              <a class="u-icon-v1 u-icon-slide-up--hover g-color-gray-dark-v4 g-color-white--hover g-bg-facebook--hover rounded" href="#">
                <i class="g-font-size-18 g-line-height-1 u-icon__elem-regular fa fa-facebook"></i>
                <i class="g-color-white g-font-size-18 g-line-height-0_8 u-icon__elem-hover fa fa-facebook"></i>
              </a>
            </li>
            <li class="list-inline-item g-mx-2">
              <a class="u-icon-v1 u-icon-slide-up--hover g-color-gray-dark-v4 g-color-white--hover g-bg-twitter--hover rounded" href="#">
                <i class="g-font-size-18 g-line-height-1 u-icon__elem-regular fa fa-twitter"></i>
                <i class="g-color-white g-font-size-18 g-line-height-0_8 u-icon__elem-hover fa fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item g-mx-2">
              <a class="u-icon-v1 u-icon-slide-up--hover g-color-gray-dark-v4 g-color-white--hover g-bg-instagram--hover rounded" href="#">
                <i class="g-font-size-18 g-line-height-1 u-icon__elem-regular fa fa-instagram"></i>
                <i class="g-color-white g-font-size-18 g-line-height-0_8 u-icon__elem-hover fa fa-instagram"></i>
              </a>
            </li>
            <li class="list-inline-item g-mx-2">
              <a class="u-icon-v1 u-icon-slide-up--hover g-color-gray-dark-v4 g-color-white--hover g-bg-google-plus--hover rounded" href="#">
                <i class="g-font-size-18 g-line-height-1 u-icon__elem-regular fa fa-google-plus"></i>
                <i class="g-color-white g-font-size-18 g-line-height-0_8 u-icon__elem-hover fa fa-google-plus"></i>
              </a>
            </li>
            <li class="list-inline-item g-mx-2">
              <a class="u-icon-v1 u-icon-slide-up--hover g-color-gray-dark-v4 g-color-white--hover g-bg-linkedin--hover rounded" href="#">
                <i class="g-font-size-18 g-line-height-1 u-icon__elem-regular fa fa-linkedin"></i>
                <i class="g-color-white g-font-size-18 g-line-height-0_8 u-icon__elem-hover fa fa-linkedin"></i>
              </a>
            </li>
          </ul>
          <!-- End Social Icons -->
          </div>
        </div>

        <div class="col-sm-5 col-md-3 ml-auto g-mb-30 g-mb-0--sm">
          <h2 class="h5 g-color-gray-light-v3 mb-4">Contacts</h2>

          <!-- Links -->
          <ul class="list-unstyled g-color-gray-dark-v5 g-font-size-13">
            <li class="media my-3">
              <i class="d-flex mt-1 mr-3 icon-hotel-restaurant-235 u-line-icon-pro"></i>
              <div class="media-body">
                Unit 25 Suite 3, 925 Prospect<br>PI New York Avenue
              </div>
            </li>
            <li class="media my-3">
              <i class="d-flex mt-1 mr-3 icon-communication-062 u-line-icon-pro"></i>
              <div class="media-body">
                htmlstream@support.com
              </div>
            </li>
            <li class="media my-3">
              <i class="d-flex mt-1 mr-3 icon-communication-033 u-line-icon-pro"></i>
              <div class="media-body">
                +32 333 444 555
              </div>
            </li>
          </ul>
          <!-- End Links -->
        </div>
      </div>


    </div>
  </div>
  <!-- End Content -->

  <!-- Copyright -->
  <div class="container g-pt-30 g-pb-10">
    <div class="row justify-content-between align-items-center">
      <div class="col-md-6 g-mb-20">
        <p class="g-font-size-13 mb-0">2017 © <a href="http://www.hubermann.com">Hubermann.com</a>. All Rights Reserved.</p>
      </div>

      <div class="col-md-6 text-md-right g-mb-20">
        <ul class="list-inline g-color-gray-dark-v5 g-font-size-25 mb-0">
          <li class="list-inline-item g-cursor-pointer mr-1">
            <i class="fa fa-cc-visa" title="Visa"
               data-toggle="tooltip"
               data-placement="top"></i>
          </li>
          <li class="list-inline-item g-cursor-pointer mx-1">
            <i class="fa fa-cc-paypal" title="Paypal"
               data-toggle="tooltip"
               data-placement="top"></i>
          </li>
          <li class="list-inline-item g-cursor-pointer mx-1">
            <i class="fa fa-cc-mastercard" title="Master Card"
               data-toggle="tooltip"
               data-placement="top"></i>
          </li>
          <li class="list-inline-item g-cursor-pointer ml-1">
            <i class="fa fa-cc-stripe" title="Stripe"
               data-toggle="tooltip"
               data-placement="top"></i>
          </li>
          <li class="list-inline-item g-cursor-pointer ml-1">
            <i class="fa fa-cc-discover" title="Discover"
               data-toggle="tooltip"
               data-placement="top"></i>
          </li>
          <li class="list-inline-item g-cursor-pointer ml-1">
            <i class="fa fa-cc-jcb" title="JCB"
               data-toggle="tooltip"
               data-placement="top"></i>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- End Copyright -->
</footer>
<!-- End Footer -->

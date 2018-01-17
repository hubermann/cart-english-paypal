
<!-- Header -->
<header id="js-header" class="u-header u-header--static u-shadow-v19">
  <!-- Top Bar -->
  <div class="u-header__section g-brd-bottom g-brd-gray-light-v4 g-bg-black g-transition-0_3">
    <div class="container">
      <div class="row justify-content-between align-items-center g-mx-0--lg">
        <div class="col-auto g-hidden-sm-down">
          <!-- Social Icons -->
          <ul class="list-inline g-py-14 mb-0">
            <li class="list-inline-item">
              <a class="g-color-white-opacity-0_8 g-color-primary--hover g-pa-3" href="#"><i class="fa fa-facebook"></i></a>
            </li>
            <li class="list-inline-item">
              <a class="g-color-white-opacity-0_8 g-color-primary--hover g-pa-3" href="#"><i class="fa fa-twitter"></i></a>
            </li>
            <li class="list-inline-item">
              <a class="g-color-white-opacity-0_8 g-color-primary--hover g-pa-3" href="#"><i class="fa fa-tumblr"></i></a>
            </li>
            <li class="list-inline-item">
              <a class="g-color-white-opacity-0_8 g-color-primary--hover g-pa-3" href="#"><i class="fa fa-pinterest-p"></i></a>
            </li>
            <li class="list-inline-item">
              <a class="g-color-white-opacity-0_8 g-color-primary--hover g-pa-3" href="#"><i class="fa fa-google"></i></a>
            </li>
          </ul>
          <!-- End Social Icons -->
        </div>

        <div class="col-auto g-hidden-xs-down g-color-white-opacity-0_6 g-font-weight-400 g-pl-15 g-pl-0--sm g-py-14">
          <i class="icon-communication-163 u-line-icon-pro g-font-size-18 g-valign-middle g-color-white-opacity-0_8 g-mr-10 g-mt-minus-2"></i>
          8 800 1234 4321
        </div>

        <div class="col-auto g-pos-rel g-py-14">

          <!-- List -->
          <!-- <ul class="list-inline g-overflow-hidden g-pt-1 mb-0">

          @//include('frontend_common.header_currency')

          <li class="list-inline-item g-color-white-opacity-0_3 g-mx-4">|</li>

          @//include('frontend_common.header_languaje')

          </ul>  -->
          <!-- End List -->
        </div>

        <div class="col-auto g-pos-rel g-py-14">
          <!-- List -->
          <ul class="list-inline g-overflow-hidden g-pt-1 g-mx-minus-4 mb-0">

            <!-- <li class="list-inline-item g-mx-4">
              <a class="g-color-white-opacity-0_6 g-color-primary--hover g-font-weight-400 g-text-underline--none--hover" href="page-our-stores-1.html">Our Stores</a>
            </li> 
            <li class="list-inline-item g-color-white-opacity-0_3 g-mx-4">|</li> -->

            <li class="list-inline-item g-mx-4">
              <a class="g-color-white-opacity-0_6 g-color-primary--hover g-font-weight-400 g-text-underline--none--hover" href="page-help-1.html">Ayuda</a>
            </li>

            <li class="list-inline-item g-color-white-opacity-0_3 g-mx-4">|</li>
            <!-- Account -->
            <li class="list-inline-item">
              <a id="account-dropdown-invoker-2" class="g-color-white-opacity-0_6 g-color-primary--hover g-font-weight-400 g-text-underline--none--hover" href="#"
                 aria-controls="account-dropdown-2"
                 aria-haspopup="true"
                 aria-expanded="false"
                 data-dropdown-event="hover"
                 data-dropdown-target="#account-dropdown-2"
                 data-dropdown-type="css-animation"
                 data-dropdown-duration="300"
                 data-dropdown-hide-on-scroll="false"
                 data-dropdown-animation-in="fadeIn"
                 data-dropdown-animation-out="fadeOut">
                Mi cuenta
      
              </a>
              <ul id="account-dropdown-2" class="list-unstyled u-shadow-v29 g-pos-abs g-bg-white g-width-160 g-pb-5 g-mt-19 g-z-index-2"
                  aria-labelledby="account-dropdown-invoker-2">
                @if( Auth::user() )
                  <li>
                   
                      <a class="d-block g-color-black g-color-primary--hover g-text-underline--none--hover g-font-weight-400 g-py-5 g-px-20" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                          Salir
                      </a>
                  
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </li>
                  <li>
                      @if (Auth::user()->hasRole('Superadmin'))
                          <a class="d-block g-color-black g-color-primary--hover g-text-underline--none--hover g-font-weight-400 g-py-5 g-px-20" href="{{ route('backend.root') }}">Administrador</a>
                      @endif
                  </li>
                  @else
                  <li>
                    <a class="d-block g-color-black g-color-primary--hover g-text-underline--none--hover g-font-weight-400 g-py-5 g-px-20" href="{{ route('login') }}">
                      Ingresar
                    </a>
                  </li>
                  <li>
                    <a class="d-block g-color-black g-color-primary--hover g-text-underline--none--hover g-font-weight-400 g-py-5 g-px-20" href="{{ route('register') }}">
                      Crear cuenta
                    </a>
                  </li>
                @endif
              </ul>
            </li>
            <!-- End Account -->
          </ul>
          <!-- End List -->
        </div>

        <div class="col-auto g-pr-15 g-pr-0--sm ">
          <!-- Basket -->
          <div class="u-basket d-inline-block g-z-index-3">
            <div class="g-py-10 g-px-6">
              <a href="#" id="basket-bar-invoker" class="u-icon-v1 g-color-white-opacity-0_8 g-color-primary--hover g-font-size-17 g-text-underline--none--hover"
                 aria-controls="basket-bar"
                 aria-haspopup="true"
                 aria-expanded="false"
                 data-dropdown-event="hover"
                 data-dropdown-target="#basket-bar"
                 data-dropdown-type="css-animation"
                 data-dropdown-duration="300"
                 data-dropdown-hide-on-scroll="false"
                 data-dropdown-animation-in="fadeIn"
                 data-dropdown-animation-out="fadeOut">
                <span class="u-badge-v1--sm g-color-white g-bg-primary g-font-size-11 g-line-height-1_4 g-rounded-50x g-pa-4" style="top: 7px !important; right: 3px !important;"><?php echo Cart::count(); ?></span>
                <i class="icon-hotel-restaurant-105 u-line-icon-pro"></i>
              </a>
            </div>

            <div id="basket-bar" class="u-basket__bar u-dropdown--css-animation u-dropdown--hidden g-text-transform-none g-bg-white g-brd-around g-brd-gray-light-v4"
                 aria-labelledby="basket-bar-invoker">
              <?php if( count(Cart::content()) ) {?>
              <div class="g-brd-bottom g-brd-gray-light-v4 g-pa-15 g-mb-10">
                <span class="d-block h6 text-center text-uppercase mb-0">Shopping Cart</span>
              </div>
              <div class="js-scrollbar g-height-200">


                
                  <?php foreach(Cart::content() as $row) :?>

                  <!-- Product -->
                  <div class="u-basket__product g-brd-none g-px-20">
                    <div class="row no-gutters g-pb-5">
                      <div class="col-4 pr-3">
                        <a class="u-basket__product-img" href="#">
                        <?php $images_product = App\Http\Controllers\HomeController::get_product_images($row->id);  ?>
                            @if ( count($images_product))
                              <img class="img-fluid" src="{{'/images-products/'.$images_product[0]->filename }}" alt="{{$row->title}}">
                            @else
                              <img class="img-fluid" src="{{ URL::to('/') }}/images/no-image-available.jpg" alt="{{$row->title}}">
                            @endif
                          
                        </a>
                      </div>

                      <div class="col-8">
                        <h6 class="g-font-weight-400 g-font-size-default">
                          <a class="g-color-black g-color-primary--hover g-text-underline--none--hover" href="#"><?php echo $row->name; ?></a>
                        </h6>
                        <small class="g-color-primary g-font-size-12"><?php echo $row->qty; ?> x ${{ number_format($row->price, 2) }}  =  ${{ number_format($row->subtotal, 2) }}</small>
                      </div>
                    </div>
                    <a class="u-basket__product-remove" href="{{url("cart?product_id=$row->id&delete=1")}}" onclick="return confirm('Are you sure?')"><i class="fa fa-times"></i></a>
                  </div>
                  <!-- End Product -->

                  <?php endforeach;?>

                  
                
              </div>

              <div class="clearfix g-px-15">
                <div class="row align-items-center text-center g-brd-y g-brd-gray-light-v4 g-font-size-default">
                  <div class="col g-brd-right g-brd-gray-light-v4">
                    <strong class="d-block g-py-10 text-uppercase g-color-main g-font-weight-500 g-py-10">Total</strong>
                  </div>
                  <div class="col">
                    <strong class="d-block g-py-10 g-color-main g-font-weight-500 g-py-10">$<?php echo Cart::total(); ?></strong>
                  </div>
                </div>
              </div>

              <div class="g-pa-20">
                <div class="text-center g-mb-15">
                  <a class="text-uppercase g-color-primary g-color-main--hover g-font-weight-400 g-font-size-13 g-text-underline--none--hover" href="{{url('cart')}}">
                    View Cart
                    <i class="ml-2 icon-finance-100 u-line-icon-pro"></i>
                  </a>
                </div>
                <a class="btn btn-block u-btn-black g-brd-primary--hover g-bg-primary--hover g-font-size-12 text-uppercase rounded g-py-10" href="{{url('checkout')}}">Proceed to Checkout</a>
              </div>
              <?php }else{ ?>
                <div class="text-center g-mb-15">
                  <h6> <br>No hay productos aún en su orden.</h6>
                  <a class="btn btn-block u-btn-black g-brd-primary--hover g-bg-primary--hover g-font-size-12 text-uppercase rounded g-py-10" href="{{url('products')}}">Comenzar a comprar</a>
                </div>
              <?php } ?>
            </div>

          </div>
          <!-- End Basket -->






          <!-- Search -->
          <div class="d-inline-block g-valign-middle">
            <div class="g-py-10 g-pl-15">
              <a href="#" class="g-color-white-opacity-0_8 g-color-primary--hover g-font-size-17 g-text-underline--none--hover"
                 aria-haspopup="true"
                 aria-expanded="false"
                 data-dropdown-event="hover"
                 aria-controls="searchform-1"
                 data-dropdown-target="#searchform-1"
                 data-dropdown-type="css-animation"
                 data-dropdown-duration="300"
                 data-dropdown-animation-in="fadeInUp"
                 data-dropdown-animation-out="fadeOutDown">
                <i class="g-pos-rel g-top-3 icon-education-045 u-line-icon-pro"></i>
              </a>
            </div>

            <!-- Search Form -->
            <form id="searchform-1" class="u-searchform-v1 u-dropdown--css-animation u-dropdown--hidden u-shadow-v20 g-brd-around g-brd-gray-light-v4 g-bg-white rounded g-pa-10 1g-mt-8">
              <div class="input-group">
                <input class="form-control g-font-size-13 w-100" type="search" placeholder="Search Here...">
                <div class="input-group-btn p-0">
                  <button class="btn u-btn-primary g-font-size-12 text-uppercase g-py-13 g-px-15" type="submit">Go</button>
                </div>
              </div>
            </form>
            <!-- End Search Form -->
          </div>
          <!-- End Search -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Top Bar -->

  <div class="u-header__section u-header__section--light g-bg-white g-transition-0_3 g-py-10">
    <nav class="js-mega-menu navbar navbar-expand-lg">
      <div class="container">
        <!-- Responsive Toggle Button -->
        <button class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-top-3 g-right-0" type="button"
                aria-label="Toggle navigation"
                aria-expanded="false"
                aria-controls="navBar"
                data-toggle="collapse"
                data-target="#navBar">
          <span class="hamburger hamburger--slider g-pr-0">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
          </span>
        </button>
        <!-- End Responsive Toggle Button -->

        <!-- Logo -->
        <a class="navbar-brand" href="/">
          
        <img src="{{ URL::to('/') }}/images/logo.png" alt="logo">
        </a>
        <!-- End Logo -->

        <!-- Navigation -->
        <div id="navBar" class="collapse navbar-collapse align-items-center flex-sm-row g-pt-15 g-pt-0--lg">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item g-ml-10--lg">
              <a class="nav-link text-uppercase g-color-primary--hover g-pl-5 g-pr-0 g-py-20" href="/">Inicio</a>
            </li>

            <li class="nav-item g-ml-10--lg">
              <a class="nav-link text-uppercase g-color-primary--hover g-pl-5 g-pr-0 g-py-20" href="{{ route('frontend.products') }}">Productos</a>
            </li>
            <!-- End Home - Submenu -->

            

            @if( count( App\Http\Controllers\HomeController::get_categories_outstandings() ))

              @foreach( App\Http\Controllers\HomeController::get_categories_outstandings() as $outstanding_category )
              <li class="nav-item g-ml-10--lg">
                <a class="nav-link text-uppercase g-color-primary--hover g-pl-5 g-pr-0 g-py-20" href="{{ route('frontend.by_category', ['id' => $outstanding_category->id ])}}">{{ $outstanding_category->name }}</a>
              </li>
              @endforeach
            @endif
           

         


            <li class="nav-item g-ml-10--lg">
              <a class="nav-link text-uppercase g-color-primary--hover g-pl-5 g-pr-0 g-py-20" href="{{ route('frontend.outstandings')}}">Destacados</a>
            </li>
            <li class="nav-item g-ml-10--lg">
              <a class="nav-link text-uppercase g-color-primary--hover g-pl-5 g-pr-0 g-py-20" href="{{ route('frontend.contact')}}">Contacto</a>
            </li>
          </ul>

        </div>
        <!-- End Navigation -->
      </div>
    </nav>
  </div>
</header>
<!-- End Header -->



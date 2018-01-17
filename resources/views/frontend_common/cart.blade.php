@extends('layouts.frontend')

@section('content')       


<section>
    <div class="container g-pt-100 g-pb-70">
        <form class="js-validate js-step-form" data-progress-id="#stepFormProgress" data-steps-id="#stepFormSteps" novalidate="novalidate">
          <div class="g-mb-100">

          @if(count($cart))
            <!-- Step Titles -->
            <ul id="stepFormProgress" class="js-step-progress row justify-content-center list-inline text-center g-font-size-17 mb-0">
              <li class="col-3 list-inline-item g-mb-20 g-mb-0--sm active">
                <span class="d-block u-icon-v2 u-icon-size--sm g-rounded-50x g-brd-primary g-color-primary g-color-white--active g-bg-primary--active g-color-white--checked g-bg-primary--checked mx-auto mb-3">
                  <i class="g-font-style-normal g-font-weight-700 g-hide-check">1</i>
                  <i class="fa fa-check g-show-check"></i>
                </span>
                <h4 class="g-font-size-16 text-uppercase mb-0">Shopping Cart</h4>
              </li>

              <li class="col-3 list-inline-item g-mb-20 g-mb-0--sm">
                <span class="d-block u-icon-v2 u-icon-size--sm g-rounded-50x g-brd-gray-light-v2 g-color-gray-dark-v5 g-brd-primary--active g-color-white--active g-bg-primary--active g-color-white--checked g-bg-primary--checked mx-auto mb-3">
                  <i class="g-font-style-normal g-font-weight-700 g-hide-check">2</i>
                  <i class="fa fa-check g-show-check"></i>
                </span>
                <h4 class="g-font-size-16 text-uppercase mb-0">Shipping</h4>
              </li>

              <li class="col-3 list-inline-item">
                <span class="d-block u-icon-v2 u-icon-size--sm g-rounded-50x g-brd-gray-light-v2 g-color-gray-dark-v5 g-brd-primary--active g-color-white--active g-bg-primary--active g-color-white--checked g-bg-primary--checked mx-auto mb-3">
                  <i class="g-font-style-normal g-font-weight-700 g-hide-check">3</i>
                  <i class="fa fa-check g-show-check"></i>
                </span>
                <h4 class="g-font-size-16 text-uppercase mb-0">Payment &amp; Review</h4>
              </li>
            </ul>
            <!-- End Step Titles -->
          </div>

          <div id="stepFormSteps">
            <!-- Shopping Cart -->
            <div id="step1" class="active">
              <div class="row">
                <div class="col-md-8 g-mb-30">
                  <!-- Products Block -->
                  <div class="g-overflow-x-scroll g-overflow-x-visible--lg">


                  

                    <table class="text-center w-100">
                      <thead class="h6 g-brd-bottom g-brd-gray-light-v3 g-color-black text-uppercase">
                        <tr>
                          <th class="g-font-weight-400 text-left g-pb-20">Product</th>
                          <th class="g-font-weight-400 g-width-130 g-pb-20">Price</th>
                          <th class="g-font-weight-400 g-width-50 g-pb-20">Qty</th>
                          <th class="g-font-weight-400 g-width-130 g-pb-20">Total</th>
                          <th></th>
                        </tr>
                      </thead>

                      <tbody>

                        @foreach($cart as $item)

                        <!-- Item-->
                        <tr class="g-brd-bottom g-brd-gray-light-v3">
                          <td class="text-left g-py-25">
                            <?php $images_product = App\Http\Controllers\HomeController::get_product_images($item->id);  ?>
                            @if ( count($images_product))
                                <img class="d-inline-block g-width-100 mr-4" src="{{'/images-products/'.$images_product[0]->filename }}" alt="Image Description">
                            @else
                                <img class="d-inline-block g-width-100 mr-4" src="{{ URL::to('/') }}/images/no-image-available.jpg" alt="Image Description">
                            @endif

                            <div class="d-inline-block align-middle">
                              <h4 class="h6 g-color-black">    <a href="{{ route('frontend.product_detail', ['id' => $item->id]) }}" title="{{ $item->name }}">{{ str_limit($item->name, 16) }} </a></h4>
                              <ul class="list-unstyled g-color-gray-dark-v4 g-font-size-12 g-line-height-1_6 mb-0">
                                <!-- <li>Color: Black</li>
                                <li>Size: MD</li> -->
                              </ul>
                            </div>
                          </td>
                          <td class="g-color-gray-dark-v2 g-font-size-13">$ {{ number_format($item->price, 2) }}</td>
                          <td>
                            <div class="js-quantity input-group u-quantity-v1 g-width-80 g-brd-primary--focus">
                              <input class="js-result form-control text-center g-font-size-13 rounded-0 g-pa-0" type="text" value="{{$item->qty}}" readonly="">

                              <div class="input-group-addon d-flex align-items-center g-width-30 g-brd-gray-light-v2 g-bg-white g-font-size-18 rounded-0 g-px-5 g-py-6">
                                
                                <a class=" g-color-gray g-color-primary--hover " href="{{url("cart?product_id=$item->id&decrease=1")}}"> <i class="js-minus g-color-gray g-color-primary--hover fa fa-angle-down"></i> </a>
                                &nbsp;
                                <a class=" g-color-gray g-color-primary--hover" href="{{url("cart?product_id=$item->id&increment=1")}}"> <i class="js-plus g-color-gray g-color-primary--hover fa fa-angle-up"></i> </a>
                              </div>
                            </div>
                          </td>
                          <td class="text-right g-color-black">
                            <span class="g-color-gray-dark-v2 g-font-size-13 mr-4">${{$item->subtotal}}</span>
                            <span class="g-color-gray-dark-v4 g-color-black--hover g-cursor-pointer">
                              
                              <a class="cart_quantity_delete" href="{{url("cart?product_id=$item->id&delete=1")}}" onclick="return confirm('Are you sure?')"><i class="mt-auto fa fa-trash"></i></a>
                            </span>
                          </td>
                        </tr>
                        <!-- End Item-->

                        @endforeach
                        
                      </tbody>
                    </table>

                     


                  </div>
                  <!-- End Products Block -->
                </div>

                <div class="col-md-4 g-mb-30">
                  <!-- Summary -->
                  <div class="g-bg-gray-light-v5 g-pa-20 g-pb-50 mb-4">
                    <h4 class="h6 text-uppercase mb-3">Summary</h4>

                    <!-- Accordion -->
                    <?php 
                    // <div id="accordion-01" class="mb-4" role="tablist" aria-multiselectable="true">
                    //   <div id="accordion-01-heading-01" class="g-brd-y g-brd-gray-light-v2 py-3" role="tab">
                    //     <h5 class="g-font-weight-400 g-font-size-default mb-0">
                    //       <a class="g-color-gray-dark-v4 g-text-underline--none--hover" href="#accordion-01-body-01" data-toggle="collapse" data-parent="#accordion-01" aria-expanded="false" aria-controls="accordion-01-body-01">Estimate shipping
                    //         <span class="ml-3 fa fa-angle-down"></span></a>
                    //     </h5>
                    //   </div>
                    //   <div id="accordion-01-body-01" class="collapse" role="tabpanel" aria-labelledby="accordion-01-heading-01">
                    //     <div class="g-py-10">
                    //       <div class="mb-3">
                    //         <label class="d-block g-color-gray-dark-v2 g-font-size-13">Country</label>
                    //         <input id="inputGroup1" class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15" name="country" type="text" placeholder="United Kingdom" required="" aria-required="true">
                    //       </div>
                    //       <div class="mb-3">
                    //         <label class="d-block g-color-gray-dark-v2 g-font-size-13">State/Province</label>
                    //         <input id="inputGroup2" class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15" name="stateProvince" type="text" placeholder="London" required="" aria-required="true">
                    //       </div>
                    //       <label class="d-block g-color-gray-dark-v2 g-font-size-13">ZIP/Postal Code</label>
                    //       <input id="inputGroup3" class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15" name="zip" type="text" placeholder="e.g. AB123" required="" aria-required="true">
                    //     </div>
                    //   </div>
                    // </div>
                     ?>
                    <!-- End Accordion -->

                    <div class="d-flex justify-content-between mb-2">
                      <!-- <span class="g-color-black">Subtotal</span>
                      <span class="g-color-black g-font-weight-300">$454.00</span> -->
                    </div>
                    <div class="d-flex justify-content-between">
                      <span class="g-color-black">Order Total</span>
                      <span class="g-color-black g-font-weight-300">${{Cart::total()}}</span>
                    </div>
                  </div>
                  <!-- End Summary -->

                  <!-- <button class="btn btn-block u-btn-outline-black g-brd-gray-light-v1 g-bg-black--hover g-font-size-13 text-uppercase g-py-15 mb-4" type="button">Update Shopping Cart</button> -->
                  <a href="{{ url('checkout') }}" class="btn btn-block u-btn-primary g-font-size-13 text-uppercase g-py-15 mb-4" data-next-step="#step2">Proceed to Checkout</a>

                  

                  <!-- Accordion -->
                  <div id="accordion-02" role="tablist" aria-multiselectable="true">
                    <div id="accordion-02-heading-02" role="tab">
                      <h5 class="g-font-weight-400 g-font-size-default mb-0">
                        <a class="g-color-black g-text-underline--none--hover" href="#accordion-02-body-02" data-toggle="collapse" data-parent="#accordion-02" aria-expanded="false" aria-controls="accordion-02-body-02"><i class="mr-2 fa fa-info-circle"></i>Delivery
                          <span class="ml-3 fa fa-angle-down"></span></a>
                      </h5>
                    </div>
                    <div id="accordion-02-body-02" class="collapse" role="tabpanel" aria-labelledby="accordion-02-heading-02">
                      
                      <br>
                      <h6>information </h6>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati porro aperiam, similique iste hic sed atque incidunt rerum commodi, ad iusto, ullam omnis. Tempora quaerat libero quam pariatur reprehenderit tenetur!</p>


                    </div>
                  </div>
                  <!-- End Accordion -->
                </div>
              </div>
            </div>
            <!-- End Shopping Cart -->


          </div>

      </div>


      @else
              
              <!--  empty cart  -->

        <div class="container text-center">
        <div class="mb-5">
          <span class="d-block g-color-gray-light-v1 g-font-size-70 g-font-size-90--md mb-4">
            <i class="icon-hotel-restaurant-105 u-line-icon-pro"></i>
          </span>
          <h2 class="g-mb-30">Your Cart is Currently Empty</h2>
          <p>Before proceed to checkout you must add some products to your shopping cart.<br>You will find a lot of interesting products on our "Shop" page.</p>
        </div>
        <a class="btn u-btn-primary g-font-size-12 text-uppercase g-py-12 g-px-25" href="{{ url('products') }}">Start Shopping</a>
        </div>



@endif


</section>




@endsection
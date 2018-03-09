@extends('layouts.frontend')

@section('content')
<style media="screen">
  .sq-input {
  border: 1px solid rgb(223, 223, 223);
  outline-offset: -2px;
  margin-bottom: 5px;
  display: inline-block;
  }

  /* Define how SqPaymentForm iframes should look when they have focus */
  .sq-input--focus {
  outline: 5px auto rgb(59, 153, 252);
  }

  /* Define how SqPaymentForm iframes should look when they contain invalid values */
  .sq-input--error {
  outline: 5px auto rgb(255, 97, 97);
  }

  /* Customize the "Pay with Credit Card" button */
  .button-credit-card {
  min-width: 200px;
  min-height: 20px;
  padding: 0;
  margin: 5px;
  line-height: 20px;
  box-shadow: 2px 2px 1px rgb(200, 200, 200);
  background: rgb(255, 255, 255);
  border-radius: 5px;
  border: 1px solid rgb(200, 200, 200);
  font-weight: bold;
  cursor:pointer;
  }


  /* Customize the "{Wallet} not enabled" message */
  .wallet-not-enabled {
  min-width: 200px;
  min-height: 40px;
  max-height: 64px;
  padding: 0;
  margin: 10px;
  line-height: 40px;
  background: #eee;
  border-radius: 5px;
  font-weight: lighter;
  font-style: italic;
  font-family: inherit;
  display: block;
  }

  /* Customize the Apple Pay on the Web button */
  .button-apple-pay {
  min-width: 200px;
  min-height: 40px;
  max-height: 64px;
  padding: 0;
  margin: 10px;
  background-image: -webkit-named-image(apple-pay-logo-white);
  background-color: black;
  background-size: 100% 60%;
  background-repeat: no-repeat;
  background-position: 50% 50%;
  border-radius: 5px;
  cursor:pointer;
  display: none;
  }

  /* Customize the Masterpass button */
  .button-masterpass {
  min-width: 200px;
  min-height: 40px;
  max-height: 40px;
  padding: 0;
  margin: 10px;
  background-image: url(https://static.masterpass.com/dyn/img/btn/global/mp_chk_btn_147x034px.svg);
  background-color: black;
  background-size: 100% 100%;
  background-repeat: no-repeat;
  background-position: 50% 50%;
  border-radius: 5px;
  border-color: rgb(255, 255, 255);
  cursor:pointer;
  display: none;
  }

  #sq-walletbox {
  float:left;
  margin:5px;
  padding:10px;
  text-align: center;
  vertical-align: top;
  font-weight: bold;
  }

  #sq-ccbox {
  float:left;
  margin:5px;
  padding:10px;
  text-align: center;
  vertical-align: top;
  font-weight: bold;
  }

  .errores{color:red;}
</style>

<div class="container ">

  <div class="g-max-width-645 text-center mx-auto ">
    <br>
    <h4 class="h1 mb-3">Proceed with the payment for order # {{$order_id}}.</h4>
    <p class="g-font-size-17 mb-0">Proceed with the payment process for order ID: #{{$order_id}}.</p>
    <br>
    <div id="errors_card" class="card errores"></div>

  </div>


  <!-- link to the SqPaymentForm library -->
  <script type="text/javascript" src="https://js.squareup.com/v2/paymentform">
  </script>

  <!-- link to the local SqPaymentForm initialization -->
  <script src="{{ asset('js/sqpay.js') }}"></script>

        <div class="row justify-content-center">

          <div class="col-md-12">

            <div id="sq-ccbox">
              <!--
                You should replace the action attribute of the form with the path of
                the URL you want to POST the nonce to (for example, "/process-card")
              -->
              <p>4532759734545858</p>
              <form id="nonce-form" novalidate action="{{url('process_payment')}}" method="post">
                Pay with a Credit Card

                {{ csrf_field() }}
                <input type="hidden" name="id_order" value="{{$order_id}}">

                <table>
                <tbody>
                  <tr>
                    <td>Card Number:</td>
                    <td><div id="sq-card-number"></div></td>
                  </tr>
                  <tr>
                    <td>CVV:</td>
                    <td><div id="sq-cvv"></div></td>
                  </tr>
                  <tr>
                    <td>Expiration Date: </td>
                    <td><div id="sq-expiration-date"></div></td>
                  </tr>
                  <tr>
                    <td>Postal Code:</td>
                    <td><div id="sq-postal-code"></div></td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <button id="sq-creditcard" class="button-credit-card" onclick="requestCardNonce(event)">
                        Pay with card
                      </button>
                    </td>
                  </tr>
                </tbody>
                </table>

                <!--
                  After a nonce is generated it will be assigned to this hidden input field.
                -->
                <input type="hidden" id="card-nonce" name="nonce">
              </form>

            </div>

            <div id="sq-walletbox">
              Pay with a Digital Wallet
              <div id="sq-apple-pay-label" class="wallet-not-enabled">Apple Pay for Web not enabled</div>
              <!-- Placeholder for Apple Pay for Web button -->
              <button id="sq-apple-pay" class="button-apple-pay"></button>

              <div id="sq-masterpass-label" class="wallet-not-enabled">Masterpass not enabled</div>
              <!-- Placeholder for Masterpass button -->
              <button id="sq-masterpass" class="button-masterpass"></button>
            </div>


          </div>

        </div>



</div><!-- End container -->


@endsection

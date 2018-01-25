<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Title -->
    <title> Protecno </title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../favicon.ico">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto%3A300%2C400%2C500%2C700%7CPlayfair+Display%7CRaleway%7CSpectral%7CRubik">

    <!-- CSS Global Compulsory -->
    <link href="{{ asset('template/assets/vendor/bootstrap/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('template/assets/vendor/icon-line/css/simple-line-icons.css') }}">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/icon-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/icon-line-pro/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/icon-hs/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/dzsparallaxer/dzsparallaxer.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/dzsparallaxer/dzsscroller/scroller.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/dzsparallaxer/advancedscroller/plugin.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/hs-megamenu/src/hs.megamenu.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/slick-carousel/slick/slick.css') }}">

    <script src="{{ asset('template/assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('template/assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.min.css') }}">

    <!-- CSS Unify Theme -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/styles.e-commerce.css') }}">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/custom.css') }}">

  </head>

  <body>
  	<main>

  		@include('frontend_common.header')

      <div class="container">
        <section id="notifications">
          <div class="col-md-12">
              @if(Session::has('error'))
                <div class="alert alert-danger">
                    <a class="close" data-dismiss="alert">×</a>
                     {!!Session::get('error')!!}
                </div>
              @endif
              @if(Session::has('warning'))
                <div class="alert alert-warning">
                    <a class="close" data-dismiss="alert">×</a>
                     {!!Session::get('warning')!!}
                </div>
              @endif
              @if(Session::has('success'))
                <div class="alert alert-success">
                    <a class="close" data-dismiss="alert">×</a>
                     {!!Session::get('success')!!}
                </div>
              @endif

          </div>
        </section>
      </div>

      @yield('content')

      @include('frontend_common.call_to_action')

			@include('frontend_common.footer')

      <a class="js-go-to u-go-to-v2" href="#"
         data-type="fixed"
         data-position='{
           "bottom": 15,
           "right": 15
         }'
         data-offset-top="400"
         data-compensation="#js-header"
         data-show-effect="zoomIn">
        <i class="hs-icon hs-icon-arrow-top"></i>
      </a>
    </main>

    <div class="u-outer-spaces-helper"></div>

    <!-- JS Global Compulsory -->
    <script src="{{ asset('template/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/jquery-migrate/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/bootstrap/bootstrap.min.js') }}"></script>

    <!-- JS Implementing Plugins -->
    <script src="{{ asset('template/assets/vendor/jquery-ui/ui/widget.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/jquery-ui/ui/widgets/menu.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/jquery-ui/ui/widgets/mouse.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/jquery-ui/ui/widgets/slider.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/dzsparallaxer/dzsparallaxer.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/dzsparallaxer/dzsscroller/scroller.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/dzsparallaxer/advancedscroller/plugin.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/hs-megamenu/src/hs.megamenu.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
   <!-- JS Unify -->
    <script src="{{ asset('template/assets/js/hs.core.js') }}"></script>
    <script src="{{ asset('template/assets/js/components/hs.header.js') }}"></script>
    <script src="{{ asset('template/assets/js/helpers/hs.hamburgers.js') }}"></script>
    <script src="{{ asset('template/assets/js/components/hs.dropdown.js') }}"></script>
    <script src="{{ asset('template/assets/js/components/hs.scrollbar.js') }}"></script>
    <script src="{{ asset('template/assets/js/helpers/hs.rating.js') }}"></script>
    <script src="{{ asset('template/assets/js/components/hs.slider.js') }}"></script>
    <script src="{{ asset('template/assets/js/components/hs.go-to.js') }}"></script>

    <!-- JS Customization -->
    <script src="{{ asset('template/assets/js/custom.js') }}"></script>

    <!-- JS Plugins Init. -->
    <script>
      $(document).on('ready', function () {
        // initialization of header
        $.HSCore.components.HSHeader.init($('#js-header'));
        $.HSCore.helpers.HSHamburgers.init('.hamburger');

        // initialization of HSMegaMenu component
        $('.js-mega-menu').HSMegaMenu({
          event: 'hover',
          pageContainer: $('.container'),
          breakpoint: 991
        });

        // initialization of HSDropdown component
        $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {
          afterOpen: function () {
            $(this).find('input[type="search"]').focus();
          }
        });

        // initialization of HSScrollBar component
        $.HSCore.components.HSScrollBar.init($('.js-scrollbar'));

        // initialization of go to
        $.HSCore.components.HSGoTo.init('.js-go-to');

        // initialization of rating
        $.HSCore.helpers.HSRating.init();

        // initialization of range slider
        $.HSCore.components.HSSlider.init('#rangeSlider1');
      });
    </script>

   

  </body>
</html>
@extends('layouts.frontend')

@section('content')
<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


############ -->

<section class="container g-pt-100 g-pb-20">
<div class="row justify-content-between">
  <div class="col-md-6 col-lg-5 order-lg-2 g-mb-80">
    <div class="g-brd-around g-brd-gray-light-v3 g-bg-white rounded g-px-30 g-py-50 mb-4">
      <header class="text-center mb-4">
        <h1 class="h4 g-color-black g-font-weight-400">Create New Account</h1>
      </header>

      <!-- Form -->
      <form class="g-py-15"  method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}

        <div class="mb-4">
          <div class="input-group g-rounded-left-3">
            <span class="input-group-addon g-width-45 g-brd-gray-light-v3 g-color-gray-dark-v5">
              <i class="icon-finance-067 u-line-icon-pro"></i>
            </span>
            <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-rounded-left-0 g-rounded-right-3 g-py-15 g-px-15" name="name" value="{{ old('name') }}" type="name" placeholder="Name" required autofocus>

          </div>
            <p class="form-error">
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </p>
        </div>

        <div class="mb-4">
          <div class="input-group g-rounded-left-3">
            <span class="input-group-addon g-width-45 g-brd-gray-light-v3 g-color-gray-dark-v5">
              <i class="icon-finance-067 u-line-icon-pro"></i>
            </span>
            <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-rounded-left-0 g-rounded-right-3 g-py-15 g-px-15" name="email" type="email" placeholder="Email Address" required>

          </div>
            <p class="form-error">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </p>
        </div>

        <div class="mb-4">
          <div class="input-group g-rounded-left-3 mb-4">
            <span class="input-group-addon g-width-45 g-brd-gray-light-v3 g-color-gray-dark-v5">
              <i class="icon-media-094 u-line-icon-pro"></i>
            </span>
            <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-rounded-left-0 g-rounded-right-3 g-py-15 g-px-15" name="password" type="password" placeholder="Password" required>

          </div>
            <p class="form-error">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </p>
        </div>

        <div class="mb-4">
          <div class="input-group g-rounded-left-3 mb-4">
            <span class="input-group-addon g-width-45 g-brd-gray-light-v3 g-color-gray-dark-v5">
              <i class="icon-media-094 u-line-icon-pro"></i>
            </span>
            <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-rounded-left-0 g-rounded-right-3 g-py-15 g-px-15" name="password_confirmation" type="password" placeholder="Confirm Password" required>

          </div>
            <p class="form-error">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </p>
        </div>

        <div class="row justify-content-between mb-5">
          <div class="col align-self-center">
            <label class="form-check-inline u-check g-color-gray-dark-v5 g-font-size-13 g-pl-25 mb-0">
              <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox">
              <span class="d-block u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                <i class="fa" data-check-icon="&#xf00c"></i>
              </span>
              Keep signed in
            </label>
          </div>
          <div class="col align-self-center text-right">
            <a class="g-font-size-13" href="{{ route('password.request') }}">Forgot password?</a>
          </div>
        </div>

        <div class="mb-5">
          <button class="btn btn-block u-btn-primary g-font-size-12 text-uppercase g-py-12 g-px-25" type="submit">Signup</button>
        </div>

        <div class="d-flex justify-content-center text-center g-mb-30">
          <div class="d-inline-block align-self-center g-width-50 g-height-1 g-bg-gray-light-v1"></div>
          <span class="align-self-center g-color-gray-dark-v5 mx-4"> O </span>
          <div class="d-inline-block align-self-center g-width-50 g-height-1 g-bg-gray-light-v1"></div>
        </div>

        <div class="text-center">
          <p class="g-color-gray-dark-v5 mb-0">Already have an account??
            <a class="g-font-weight-600" href="{{ route('login')}}"> login</a></p>
        </div>


      </form>
      <!-- End Form -->
    </div>


  </div>

  <div class="col-md-6 order-lg-1 g-mb-80">
    <div class="mb-5">
      <h2 class="h1 g-font-weight-400 mb-3">Welcome to CocInnovation</h2>
      <p class="g-color-gray-dark-v4">The time has come to bring those ideas and plans to life. This is where we really begin to visualize your napkin sketches and make them into beautiful pixels.</p>
    </div>

    <div class="row">
      <div class="col-lg-9">
        <!-- Icon Blocks -->
        <div class="media mb-5">
          <div class="d-flex mr-3">
            <span class="align-self-center u-icon-v1 u-icon-size--lg g-color-primary">
              <i class="icon-finance-168 u-line-icon-pro"></i>
            </span>
          </div>
          <div class="media-body align-self-center">
            <h3 class="h5 g-font-weight-400">Reliable contracts</h3>
            <p class="g-color-gray-dark-v5 mb-0">Reliable contracts, multifanctionality &amp; best usage of Unify template</p>
          </div>
        </div>
        <!-- End Icon Blocks -->

        <!-- Icon Blocks -->
        <div class="media mb-5">
          <div class="d-flex mr-3">
            <span class="align-self-center u-icon-v1 u-icon-size--lg g-color-primary">
              <i class="icon-finance-193 u-line-icon-pro"></i>
            </span>
          </div>
          <div class="media-body align-self-center">
            <h3 class="h5 g-font-weight-400">Security</h3>
            <p class="g-color-gray-dark-v5 mb-0">Secure &amp; integrated options to create individual &amp; business websites</p>
          </div>
        </div>
        <!-- End Icon Blocks -->

        <!-- Icon Blocks -->
        <div class="media">
          <div class="d-flex mr-3">
            <span class="align-self-center u-icon-v1 u-icon-size--lg g-color-primary">
              <i class="icon-finance-122 u-line-icon-pro"></i>
            </span>
          </div>
          <div class="media-body align-self-center">
            <h3 class="h5 g-font-weight-400">Maintain</h3>
            <p class="g-color-gray-dark-v5 mb-0">We get it, you're busy and it's important that someone keeps up with marketing</p>
          </div>
        </div>
        <!-- End Icon Blocks -->
      </div>
    </div>
  </div>
</div>
</section>



@endsection

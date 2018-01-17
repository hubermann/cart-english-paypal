<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>
    <!-- Styles -->
    <link href="{{ asset('css/backend.css') }}" rel="stylesheet">



    <style>
    .list-group.panel > .list-group-item {
  border-bottom-right-radius: 0px;
  border-bottom-left-radius: 0px
}
.list-group-submenu {
  margin-left:10px;
}

/*------------------------------------
  Default Styles
------------------------------------*/
html {
  font-size: 14px;
  overflow-x: hidden; }

body {
  font-weight: 400;
  font-size: 1rem;
  font-family: "Open Sans", Helvetica, Arial, sans-serif;
  line-height: 1.6;
  color: #555;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  -moz-font-feature-settings: "liga", "kern";
  text-rendering: optimizelegibility;
  background-color: #fff; }

a {
  color: #72c02c;
  outline: none; }

a:focus,
a:hover {
  color: #66ab27; }

.nav-link {
  color: #555; }

.nav-link:focus,
.nav-link:hover {
  color: #555; }

figure {
  margin-bottom: 0; }

/*------------------------------------
  Headings
------------------------------------*/
.h1, .h2, .h3, .h4, .h5, .h6, .h7,
h1, h2, h3, h4, h5, h6 {
  line-height: 1.4; }




</style>
</head>
<body>


<body>
    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      
      <ul class="nav navbar-nav">
        <li><a class="navbar-brand" href="#">Dashboard</a> </li>
      </ul>
        
        <!-- Authentication Links -->
        @guest
          <div style="float: right">
            <ul class="nav">
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                   
                    
                      <ul class="dropdown-menu text-center">
                          <li>
                              <a href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                  Logout
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                          </li>
                      </ul>
                    
                </li>
              </ul>
          </div>
        @endguest
          


    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
          
<div class="list-group">
    <a href="#demo5" class="list-group-item" data-toggle="collapse" data-parent="#MainMenu">notes</a>
    <div class="collapse" id="demo5">
        <a href="{{ route('backend.notes') }}" class="list-group-item">View notes</a>
        <a href="{{ route('backend.notes.new') }}" class="list-group-item">New note</a>
    </div>
</div>





        </nav>


        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
          
            <div class="row">
                @yield('content')
            </div>
        </main>
      </div>
    </div>



<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</body>
</html>


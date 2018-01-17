<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
	<title>Admin Dashboard </title>

	<link href="{{ asset('pixeladmin-lite/html/bootstrap/dist/css/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('pixeladmin-lite/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
	<link href="{{ asset('pixeladmin-lite/plugins/bower_components/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
	<link href="{{ asset('pixeladmin-lite/plugins/bower_components/morrisjs/morris.css') }}" rel="stylesheet">
	<link href="{{ asset('pixeladmin-lite/html/css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('pixeladmin-lite/html/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('pixeladmin-lite/html/css/colors/megna-dark.css') }}" rel="stylesheet">
	

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<!-- Preloader -->
	<!-- <div class="preloader">
		<div class="cssload-speeding-wheel"></div>
	</div> -->
	<div id="wrapper">
		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top m-b-0">
			<div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></a>
				<div class="top-left-part">
				<a class="logo" href="{{ route('backend.root') }}"><b><img src="{{ asset('pixeladmin-lite//plugins/images/pixeladmin-logo.png') }}" alt="home" />
				</b><span class="hidden-xs"><img src="{{ asset('pixeladmin-lite/plugins/images/pixeladmin-text.png') }}" alt="home" /></span></a></div>
				<ul class="nav navbar-top-links navbar-left m-l-20 hidden-xs">
					<li class="in">
						<form role="search" class="app-search hidden-xs">
							<input type="text" placeholder="Search..." class="form-control"> <a href="" class="active"><i class="fa fa-search"></i></a>
						</form>
					</li>
				</ul>
				<ul class="nav navbar-top-links navbar-right pull-right">

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

					
				</ul>
			</div>
			<!-- /.navbar-header -->
			<!-- /.navbar-top-links -->
			<!-- /.navbar-static-side -->
		</nav>
		<!-- Left navbar-header -->
		<div class="navbar-default sidebar" role="navigation">
			<div class="sidebar-nav navbar-collapse slimscrollsidebar">

				<ul class="nav" id="side-menu">
					<li style="padding: 10px 0 0;">
						<a href="{{ route('backend.root') }}" ><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Backend</span></a>
					</li>
					<li>
						<a href="{{ route('backend.users.view') }}" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i><span class="hide-menu">Users</span></a>
					</li>
					
					<li>
						<a href="{{ route('backend.categories') }}" class="waves-effect"><i class="fa fa-font fa-fw" aria-hidden="true"></i><span class="hide-menu">Categorias</span></a>
					</li>

					<li>
						<a href="{{ route('backend.subcategories') }}" class="waves-effect"><i class="fa fa-font fa-fw" aria-hidden="true"></i><span class="hide-menu">Subcategorias</span></a>
					</li>

					<li>
						<a href="{{ route('backend.products') }}" class="waves-effect"><i class="fa fa-font fa-fw" aria-hidden="true"></i><span class="hide-menu">Productos</span></a>
					</li>
					
				</ul>
				<div class="center p-20">

				</div>
			</div>
		</div>
		<!-- Left navbar-header end -->
		<!-- Page Content -->
		<div id="page-wrapper">
			<div class="container-fluid">
				<div class="row">
					<br>
				</div>
			
				<!-- row-->
				<div class="row">

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
			             {!!Session::get('error')!!}
			        </div>
				    @endif
				    @if(Session::has('success'))
			        <div class="alert alert-success">
			            <a class="close" data-dismiss="alert">×</a>
			             {!!Session::get('success')!!}
			        </div>
				    @endif


						@if (count($errors) > 0)
						    <div class="alert alert-danger">
						        <ul>
						            @foreach ($errors->all() as $error)
						                <li>{{ $error }}</li>
						            @endforeach
						        </ul>
						    </div>
						@endif



						@yield('content')
					</div>
				</div>
				<!-- /.row -->


			</div>
			<!-- /.container-fluid -->
			<footer class="footer text-center"> 2017 &copy; </footer>
		</div>
		<!-- /#page-wrapper -->
	</div>
	<!-- /#wrapper -->

	<!-- jQuery -->
	<script src="{{ asset('pixeladmin-lite/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
	
	<!-- Bootstrap Core JavaScript -->
	<script src="{{ asset('pixeladmin-lite/html/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	
	<!-- Menu Plugin JavaScript -->
	<script src="{{ asset('pixeladmin-lite/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>

	<!--slimscroll JavaScript -->
	<script src="{{ asset('pixeladmin-lite/html/js/jquery.slimscroll.js') }}"></script>
	
	<!--Wave Effects -->
	<script src="{{ asset('pixeladmin-lite/html/js/waves.js') }}"></script>

	<!--Counter js -->
	<script src="{{ asset('pixeladmin-lite/plugins/bower_components/waypoints/lib/jquery.waypoints.js') }}"></script>
	<script src="{{ asset('pixeladmin-lite/plugins/bower_components/counterup/jquery.counterup.min.js') }}"></script>

	<!--Morris JavaScript -->
	<script src="{{ asset('pixeladmin-lite/plugins/bower_components/raphael/raphael-min.js') }}"></script>
	<script src="{{ asset('pixeladmin-lite/plugins/bower_components/morrisjs/morris.js') }}"></script>

	<!-- Custom Theme JavaScript -->
	<script src="{{ asset('pixeladmin-lite/html/js/custom.min.js') }}"></script>

	<script src="{{ asset('pixeladmin-lite/html/js/dashboard1.js') }}"></script>

	<script src="{{ asset('pixeladmin-lite/plugins/bower_components/toast-master/js/jquery.toast.js') }}"></script>



<script type="text/javascript">
	$('.delete').on("click", function (e) {
		e.preventDefault();
		var choice = confirm($(this).attr('data-confirm'));
		if (choice) {window.location.href = $(this).attr('href'}
	});
</script>



<!-- ajax for forms -->
<script>
	 $('#category_id').on('change', function(e){
        console.log(e);
        var category_id = e.target.value;

        $.get('{{ url('backend') }}/ajax/subcategories?category_id=' + category_id, function(data) {
            console.log(data);
            $('#subcategory_id').empty();
            $.each(data, function(index,subCatObj){
                $('#subcategory_id').append('<option value="'+subCatObj.id+'">'+subCatObj.name+'</option>');
            });
        });
    });
</script>

<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var x = 1; //Initial field counter is 1
    var fieldHTML = '<tr><td class="td"><input type="text" class="form-control" name="prod_propiedad[]" value="" placeholder="Propiedad" /></td><td class="td"><input type="text" class="form-control" name="prod_valor[]" value="" placeholder="Valor"/></td></tr>'; //New input field html 
    
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
         //getElementById("wrap"+$(this).val())
        x--; //Decrement field counter
    });
});
</script>

<script type="text/javascript">
	$('.delete').on("click", function (e) {
		e.preventDefault();
		var choice = confirm($(this).attr('data-confirm'));
		if (choice) {
			window.location.href = $(this).attr('href');
		}
	});


	function delete_dinamic(id)
	{
		$('#dinamic'+id).remove();
	}


</script>


</body>

</html>

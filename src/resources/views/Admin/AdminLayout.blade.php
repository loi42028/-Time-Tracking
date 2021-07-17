<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Time Tracking</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{Url('/')}}/assets/img/icon.png" />
	<!-- Fonts and icons -->
	<script src="{{Url('/')}}/assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['{{Url('/')}}/assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{Url('/')}}/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{Url('/')}}/assets/css/azzara.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{Url('/')}}/assets/css/demo.css">
</head>
<body>
	<div class="wrapper">
		<!--
			Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" >
			<!-- Logo Header -->
			<div class="logo-header" style="background: #fca3cd;">
				
				<a href="{{URL::to('/admin/')}}" class="logo">
					<img src="{{Url('/')}}/assets/img/logo.png" alt="navbar brand" class="navbar-brand" style="width: 20%;">
					<span style="color:white;font-weight: 700;">Time Tracking</span>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" style="background: #fca3cde0;">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
					
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="https://s3-acheckin.s3.kstorage.vn/7RBZqHCG2gRvCGw6.jpeg" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
							<?php
								use App\Models\User;
								$userid = auth()->user()->id;
								$dataadmin = User::leftJoin('profile','users.id','=','profile.userId')->where('users.id',$userid)->first();
							?>
								<li>
									<div class="user-box">
										<div class="avatar-lg"><img src="https://s3-acheckin.s3.kstorage.vn/7RBZqHCG2gRvCGw6.jpeg" alt="image profile" class="avatar-img rounded"></div>
										<div class="u-text">
											<h4>{{$dataadmin->name}}</h4>
											<p class="text-muted">{{$dataadmin->email}}</p><a href="{{URL::to('/admin/users/edit-user/'.$userid)}}" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="{{URL::to('/admin/logout-admin')}}">Logout</a>
								</li>
							</ul>
						</li>
						
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar">
			
			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<ul class="nav mt-1">
						<!-- <li class="nav-item">
							<a data-toggle="collapse" href="#submenu">
								<i class="fas fa-address-book"></i>
								<p>Personnel Manager</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="submenu">
								<ul class="nav nav-collapse">								
									
								</ul>
							</div>
						</li> -->
						<li class="nav-item">
							<a href="{{URL::to('/admin/users/')}}">
								<i class="fas fa-user-alt"></i>
								<span class="sub-item">Users</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{URL::to('/admin/groups/')}}">
								<i class="fas fa-users"></i>
								<span class="sub-item">Groups</span>
							</a>
						</li>
						<li class="nav-item">							
							<a href="{{URL::to('/admin/roles/')}}">
								<i class="fas fa-user-lock"></i>
								<span class="sub-item">Roles</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
        @yield('admincontent')		
	</div>
</div>
<!--   Core JS Files   -->
<script src="{{Url('/')}}/assets/js/core/jquery.3.2.1.min.js"></script>
<script src="{{Url('/')}}/assets/js/core/popper.min.js"></script>
<script src="{{Url('/')}}/assets/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="{{Url('/')}}/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="{{Url('/')}}/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="{{Url('/')}}/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- Moment JS -->
<script src="{{Url('/')}}/assets/js/plugin/moment/moment.min.js"></script>

<!-- Chart JS -->
<script src="{{Url('/')}}/assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="{{Url('/')}}/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="{{Url('/')}}/assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="{{Url('/')}}/assets/js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="{{Url('/')}}/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- Bootstrap Toggle -->
<script src="{{Url('/')}}/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="{{Url('/')}}/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="{{Url('/')}}/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>


<!-- Sweet Alert -->
<script src="{{Url('/')}}/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Azzara JS -->
<script src="{{Url('/')}}/assets/js/ready.min.js"></script>

<!-- Azzara DEMO methods, don't include it in your project! -->
<script src="{{Url('/')}}/assets/js/setting-demo.js"></script>
<script src="{{Url('/')}}/assets/js/demo.js"></script>

<script src="{{Url('/')}}/assets/js/search.js"></script>

</body>
</html>
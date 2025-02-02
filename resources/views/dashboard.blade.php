@extends('template')

@section('header')
<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/linearicons/style.css')}}">
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
		<div class="navbar-btn navbar-btn-right">
			<a class="btn btn-info update-pro" href="{{url('/trash')}}"><i class="lnr lnr-trash"></i><span>TRASH</span></a>
			<a class="btn btn-info update-pro" href="{{url('/logout')}}"
				onclick="return confirm('Apakah Anda Yakin Ingin Logout ?')"><i class="lnr lnr-exit"></i>
				<span>LOGOUT</span></a>
			<a class="btn btn-success update-pro" href="{{url('/createkost')}}" title=""><i class="fa fa-rocket"></i>
				<span>TAMBAH</span></a>
		</div>

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
				<li><a href="index.html" class="active"><i class="lnr lnr-home"></i> <span>Kost</span></a></li>

				<li><a href="elements.html" class=""><i class="lnr lnr-phone"></i> <span>Fasilitas</span></a></li>

				

			</ul>
		</nav>
	</div>
</div>
@endsection
@section('overview')
@if(\Session::has('error'))
<div class="alert alert-danger">
	<div>{{Session::get('error')}}</div>
</div>
@endif
@if(\Session::has('success'))
<div class="alert alert-success">
	<div>{{Session::get('success')}}</div>
</div>
@endif
<div class="panel panel-headline">
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">No</th>
				<th scope="col">Nama Kost</th>
				<th scope="col">Alamat</th>
				<th scope="col">Harga</th>
				<th scope="col">Fasilitas</th>
				{{-- <th scope="col">Nama Costumer</th> --}}
				<th scope="col">Aksi</th>
			</tr>
		</thead>
		<tbody>
			@if ($read->count() > 0)
			<?php
						$no = 1;
						foreach ($read as $rd) :
						?>
			<tr>
				<th scope="row"><?php echo  $no++?></th>
				<td><?php echo  $rd->nama_kost?></td>
				<td><?php echo  $rd->alamat?></td>
				<td><?php echo  $rd->harga?></td>
				<td>
					<ul>
						@foreach ($rd->fasilitas as $fas)
						<li>{{$fas->nama_fasilitas}}</li>
						@endforeach
					</ul>
				</td>
				{{-- To read relationship --}}
				{{-- <td>@foreach ($rd->costumer as $r)
									{{$r->nama_costumer}} <br>
				@endforeach</td> --}}
				<td><a href="{{url('/detail')}}<?php echo '/'.$rd->id ?>" class="btn btn-info"><span class="lnr lnr-eye"></span></a> <a
						href="{{url('/get_update')}}<?php echo '/'.$rd->id ?>" class="btn btn-success"><span class="lnr lnr-pencil"></span></a> <a
						href="{{url('/delete')}}<?php echo '/'.$rd->id ?>" class="btn btn-danger"
						onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini ?')"><span class="lnr lnr-trash"></span></a></td>
			</tr>
			<?php endforeach ?>
			@endif
		</tbody>
	</table>
</div>
@endsection

@section('footer')
<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
<script src="{{asset('assets/vendor/chartist/js/chartist.min.js')}}"></script>
<script src="{{asset('assets/scripts/klorofil-common.js')}}"></script>

<script>
	$(function() {
			var data, options;
	
			// headline charts
			data = {
				labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
				series: [
					[23, 29, 24, 40, 25, 24, 35],
					[14, 25, 18, 34, 29, 38, 44],
				]
			};
	
			options = {
				height: 300,
				showArea: true,
				showLine: false,
				showPoint: false,
				fullWidth: true,
				axisX: {
					showGrid: false
				},
				lineSmooth: false,
			};
	
			new Chartist.Line('#headline-chart', data, options);
	
	
			// visits trend charts
			data = {
				labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
				series: [
					{
						name: 'series-real',
						data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
					},
					{
						name: 'series-projection',
						data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
					}
				]
			};
	
			options = {
				fullWidth: true,
				lineSmooth: false,
				height: "270px",
				low: 0,
				high: 'auto',
				series: {
					'series-projection': {
						showArea: true,
						showPoint: false,
						showLine: false
					},
				},
				axisX: {
					showGrid: false,
	
				},
				axisY: {
					showGrid: false,
					onlyInteger: true,
					offset: 0,
				},
				chartPadding: {
					left: 20,
					right: 20
				}
			};
	
			new Chartist.Line('#visits-trends-chart', data, options);
	
	
			// visits chart
			data = {
				labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
				series: [[6384, 6342, 5437, 2764, 3958, 5068, 7654]]
			};
	
			options = {
				height: 300,
				axisX: {
					showGrid: false
				},
			};
	
			new Chartist.Bar('#visits-chart', data, options);
	
	
			// real-time pie chart
			var sysLoad = $('#system-load').easyPieChart({
				size: 130,
				barColor: function(percent) {
					return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
				},
				trackColor: 'rgba(245, 245, 245, 0.8)',
				scaleColor: false,
				lineWidth: 5,
				lineCap: "square",
				animate: 800
			});
	
			var updateInterval = 3000; // in milliseconds
	
			setInterval( function() {
				var randomVal;
				randomVal = getRandomInt(0, 100);
	
				sysLoad.data('easyPieChart').update(randomVal);
				sysLoad.find('.percent').text(randomVal);
			}, updateInterval);
	
			function getRandomInt(min, max) {
				return Math.floor(Math.random() * (max - min + 1)) + min;
			}
	
		});
</script>
@endsection
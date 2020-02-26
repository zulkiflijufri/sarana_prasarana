<!doctype html>
<html lang="en">

<head>
	<title>@yield('title') | Sarana Dan Prasarana Nurul Fikri</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/linearicons/style.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/chartist/css/chartist-custom.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/main.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('admin/assets/img/nf.png')}}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('admin/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}x">

	<link rel="stylesheet" href="{{asset('admin/assets/css/jquery-ui.min.css')}}">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<!-- Toastr -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

	<style>
		.pagination{
			padding-left: 310px;
		}

		/*.pagination>li:first-child>a, .pagination>li:first-child>span{
			margin-left: 80px;
		}*/
	</style>
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
            @include('layouts.includes._navbar')
		<!-- END NAVBAR -->

        <!-- LEFT SIDEBAR -->
            @include('layouts.includes._sidebar')
		<!-- END LEFT SIDEBAR -->
		<div class="container">
			<div class="row justify-content-center align-items-center container">
				<!-- MAIN -->
				@yield('content')
        		<!-- END MAIN -->
			</div>
		</div>

		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; <?php echo '2019 - '.date('Y'); ?> <a href="https://www.nurulfikri.ac.id" target="_blank">STT Terpadu Nurul Fikri</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="{{asset('admin/assets/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('admin/assets/vendor/jquery/jquery-ui.min.js')}}"></script>
	<script src="{{asset('admin/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('admin/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('admin/assets/scripts/klorofil-common.js')}}"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- Toastr -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script src="{{asset('js/jautocalc.js')}}"></script>
	@yield('footer')
</body>
</html>

@extends('layouts.master')

@section('title', 'Dasboard')

@section('content')
<div class="main">
	<div class="main-content">
		<div class="panel panel-headline">
			<div class="panel-heading">
				<h3 class="panel-title">Tinjauan Pengajuan</h3>
				<p class="panel-subtitle"><b><?php echo date('l, d-M-Y H:i A') ?></b></p>
			</div>
			<div class="panel-body">
				<!-- Row 1 -->
				<div class="row">
					<div class="col-md-6">
						<div class="metric">
							<span class="icon"><i class="fa fa-shopping-bag"></i></span>
							<p>
								<span class="number">{{count($barang)}}</span>
								<span class="title">Jumlah Barang</span>
							</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="metric">
							<span class="icon"><i class="fa fa-shopping-cart"></i></span>
							<p>
								<span class="number">{{count($barang_acc)}}</span>
								<span class="title">Barang fix dibeli</span>
							</p>
						</div>
					</div>
				</div>
				<!-- End Row 1 -->

				<!-- Row 2 -->
				<div class="row">
					<div class="col-md-3">
						<div class="metric">
							<span class="icon"><i class="fa fa-envelope"></i></span>
							<p>
								<span class="number">{{count($pengajuan)}}</span>
								<span class="title">Pengajuan</span>
							</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="metric">
							<span class="icon"><i class="fa fa-envelope"></i></span>
							<p>
								<span class="number">{{count($sttnf)}}</span>
								<span class="title">Unit STT NF</span>
							</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="metric">
							<span class="icon"><i class="fa fa-envelope"></i></span>
							<p>
								<span class="number">{{count($nfcom)}}</span>
								<span class="title">Unit NF Komputer</span>
							</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="metric">
							<span class="icon"><i class="fa fa-envelope"></i></span>
							<p>
								<span class="number">{{count($no_proses)}}</span>
								<span class="title">Belum Diproses</span>
							</p>
						</div>
					</div>
				</div>
				<!-- End row 2 -->
			</div>
		</div>
	</div>
</div>
@endsection

@section('footer')
<script>
	@if(session('login'))
		toastr.success('{{session('login')}}')
	@endif
</script>
@endsection
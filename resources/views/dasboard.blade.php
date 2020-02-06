@extends('layouts.master')

@section('title', 'Dasboard')

@section('content')
<div class="main">
	<div class="main-content">
		<div class="panel panel-headline">
			<div class="panel-heading">
				<h3 class="panel-title">Tinjauan Pengajuan</h3>
				<p class="panel-subtitle"><?php echo date('l, d-M-Y H:i A') ?></p>
			</div>
			<div class="panel-body">
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
							<span class="icon"><i class="fa fa-shopping-bag"></i></span>
							<p>
								<span class="number">{{count($barang)}}</span>
								<span class="title">Barang</span>
							</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="metric">
							<span class="icon"><i class="fa fa-envelope"></i></span>
							<p>
								<span class="number">{{count($no_proses)}}</span>
								<span class="title">Belum diproses</span>
							</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="metric">
							<span class="icon"><i class="fa fa-shopping-cart"></i></span>
							<p>
								<span class="number">{{count($barang_acc)}}</span>
								<span class="title">Barang ACC</span>
							</p>
						</div>
					</div>
				</div>
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
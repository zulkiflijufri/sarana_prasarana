@extends('layouts.master')

@section('title', 'Persetujuan Barang')

@section('content')

<div class="main">
	<div class="main-content">
		<div class="col-md-12">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Data Pengajuan</h3>
				</div>
				<div class="panel-body">
					<div class="alert alert-warning alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						<i class="fa fa-warning"></i> Perhatian, <b>menghapus persetujuan</b> sama dengan <b>menghapus history pengajuan (.pdf)</b>
					</div>
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>NO</th>
									<th>NAMA PENGAJUAN</th>
									<th>UNIT</th>
									<th>SATKER & WATKER</th>
									<th>STATUS</th>
									<th><!-- Aksi --></th>
								</tr>
							</thead>
							<tbody>
								@forelse($pengajuans as $key => $pengajuan)
								<tr>
									<td>{{$pengajuans->firstItem() + $key}}</td>
									<td>{{$pengajuan->nama_pengajuan}} <p class="text-muted" style="font-size: 12px; margin-top: 3px; margin-bottom: 2px;">{{$pengajuan->created_at->diffForHumans()}}</p></td>
									<td>{{$pengajuan->unit}}</td>
									<td>{{$pengajuan->waket_satker}}</td>
									<td>
										@if($pengajuan->proses == 'Belum')
										<span class="label label-danger">Belum diproses</span>
										@elseif((auth()->user()->role == 'admin') && ($pengajuan->proses == 'Proses'))
										<span class="label label-warning">Sementara diproses</span>
										@elseif((auth()->user()->role == 'atasan') && ($pengajuan->proses == 'Proses'))
										<span class="label label-warning">Menunggu jawaban</span>
										@else
										<span class="label label-success">Sudah diproses</span>
										@endif
									</td>
									<td>
										@if((auth()->user()->role == 'atasan') && ($pengajuan->proses == 'Belum'))
										<a href="#" title="Lihat"><span class="lnr lnr-eye" style=" opacity: 0.5; pointer-events: none;"></span></a>&nbsp;
										@elseif((auth()->user()->role == 'admin') && ($pengajuan->proses == 'Belum'))
										<a href="/persetujuan/detail/{{$pengajuan->id}}" title="Lihat"><span class="lnr lnr-eye"></span></a>&nbsp;
										@elseif((auth()->user()->role == 'atasan') && ($pengajuan->proses == 'Proses'))
										<a href="/persetujuan/detail/{{$pengajuan->id}}" title="Lihat"><span class="lnr lnr-eye"></span></a>&nbsp;
										@elseif((auth()->user()->role == 'admin') && ($pengajuan->proses == 'Proses'))
										<a href="/persetujuan/detail/{{$pengajuan->id}}" title="Lihat"><span class="lnr lnr-eye"></span></a>&nbsp;
										@else
										<a href="/persetujuan/detail/{{$pengajuan->id}}" title="Lihat"><span class="lnr lnr-eye"></span></a>&nbsp;
										@endif
										@if(($pengajuan->proses == 'Belum') || ($pengajuan->proses == 'Proses'))
										<a href="#"><span class="lnr lnr-trash hapus" nama_pengajuan="{{$pengajuan->nama_pengajuan}}" id_pengajuan="{{$pengajuan->id}}" title="Hapus" style="margin-left: 10px; opacity: 0.5; pointer-events: none;"></span></a>
										@else
										<a href="#"><span class="lnr lnr-trash hapus" nama_pengajuan="{{$pengajuan->nama_pengajuan}}" id_pengajuan="{{$pengajuan->id}}" title="Hapus" style="margin-left: 10px;"></span></a>
										@endif
									</td>
								</tr>
								@empty
								@if(request()->get('hasil') == '')
								<tr>
									<td colspan="5" align="center"><i>- Data pengajuan tidak ditemukan -</i></td>
								</tr>
								@else
								<tr>
									<td colspan="5" align="center"><i>- Data pengajuan masih kosong -</i></td>
								</tr>
								@endif
								@endforelse
							</tbody>
						</table>
					</div>
					<!-- Link Paginate -->
					{!! $pengajuans->render() !!}
				</div>
			</div>
		</div>
	</div>
	@endsection

	@section('footer')

	<script type="text/javascript">
		@if(session('proses'))
		toastr.info('{{session('proses')}}')
		@elseif(session('hapus'))
		toastr.warning('{{session('hapus')}}')
		@endif

		$('.hapus').click(function(){
			var id_pengajuan = $(this).attr('id_pengajuan');
			var nama_pengajuan = $(this).attr('nama_pengajuan');

			swal({
				title: "Anda Yakin?",
				text: "Ingin menghapus pengajuan barang dari "+nama_pengajuan+" ??",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					window.location = "/persetujuan/delete/"+id_pengajuan;
				}
			});
		});

	</script>
	@endsection
@extends('layouts.master')

@section('title', 'Detail Barang')

@section('content')

<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="row">
			<div class="col-md-12">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">FORM PERSETUJUAN BARANG</h3>
					</div>
					<div class="panel-body">
						<form action="/persetujuan/proses/{{$pengajuan->id}}" method="post">
							{{csrf_field()}}
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">NAMA PENGAJU</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="nama_pengajuan" value="{{$pengajuan->nama_pengajuan}}" disabled>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">UNIT</label>
								<div class="col-sm-10">
									<select class="form-control" name="unit" disabled>
										<option >Pilih Unit</option>
										<option value="STT NF" @if($pengajuan->unit == "STT NF") selected @endif>STT NF</option>
										<option value="NF Komputer" @if($pengajuan->unit == "NF Komputer") selected @endif>NF KOMPUTER</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">WAKET&SATKER</label>
								<div class="col-sm-10">
									<select class="form-control" name="waket_satker" disabled>
										<option selected>Pilih Satuan Kerja</option>
										<option value="WAKET 1 (BAAK)" @if($pengajuan->waket_satker == "WAKET 1 (BAAK)") selected @endif>WAKET 1 (BAAK)</option>
										<option value="WAKET 1 (LLC)" @if($pengajuan->waket_satker == "WAKET 1 (LLC)") selected @endif>WAKET 1 (LLC)</option>
										<option value="WAKET 1 (LPMI)" @if($pengajuan->waket_satker == "WAKET 1 (LPMI)") selected @endif>WAKET 1 (LPMI)</option>
										<option value="WAKET 1 (LPPMI)" @if($pengajuan->waket_satker == "WAKET 1 (LPPMI)") selected @endif>WAKET 1 (LPPMI)</option>
										<option value="WAKET 1 (PRODI)" @if($pengajuan->waket_satker == "WAKET 1 (PRODI)") selected @endif>WAKET 1 (PRODI)</option>
										<option value="WAKET 1 (UPT KOMPUTER)" @if($pengajuan->waket_satker == "WAKET 1 (UPT KOMPUTER)") selected @endif>WAKET 1 (UPT KOMPUTER)</option>
										<option value="WAKET 2 (BSP)" @if($pengajuan->waket_satker == "WAKET 2 (BSP)") selected @endif>WAKET 2 (BSP)</option>
										<option value="WAKET 2 (KEUANGAN)" @if($pengajuan->waket_satker == "WAKET 2 (KEUANGAN)") selected @endif>WAKET 2 (KEUANGAN)</option>
										<option value="WAKET 2 (SDM)" @if($pengajuan->waket_satker == "WAKET 2 (SDM)") selected @endif>WAKET 2 (SDM)</option>
										<option value="WAKET 3" @if($pengajuan->waket_satker == "WAKET 3") selected @endif>WAKET 3</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">PERIHAL</label>
								<div class="col-sm-10">
									<select class="form-control" name="perihal" disabled>
										<option selected>Pilih Perihal</option>
										<option value="ATK (Alat Tulis Kantor)" @if($pengajuan->perihal == "ATK (Alat Tulis Kantor)") selected @endif>ATK (Alat Tulis Kantor)</option>
										<option value="Hardware" @if($pengajuan->perihal == "Hardware") selected @endif>Hardware</option>
										<option value="Pencetakan" @if($pengajuan->perihal == "Pencetakan") selected @endif>Pencetakan</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">TANGGAL</label>
								<div class="col-sm-4">
									<div class="input-group date" data-provide="datapicker">
										<input type="text" class="form-control datepicker" name="tanggal" value="{{$pengajuan->tanggal}}" readonly>
										<div class="input-group-addon">
											<span class="lnr lnr-calendar-full"></span>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">LIST BARANG</label>
								<div class="col-sm-10">
									<div class="table-responsive">
										<table class="table" name="cart">
											<thead class="bg-info">
												<tr>
													<th>Nama Barang</th>
													<th>Link & Gambar</th>
													<th>Quantity</th>
													<th>Satuan Barang</th>
													<th>Harga Satuan</th>
													<th>Jumlah</th>
													@if(auth()->user()->role == 'atasan')
													<th>Setujui</th>
													@elseif((auth()->user()->role =='admin') && ($status_barang->count() > 0))
													<th>Setujui</th>
													@endif
												</tr>
											</thead>
											<tbody>
												<?php foreach ($barangs as $barang): ?>
												<tr>
													<td>
														<div class="col-10">
															<input type="text" class="form-control" name="nama_barang[]" value="{{$barang->nama_barang}}" readonly>
														</div>
													</td>
													<td>
														<div class="col-10">
															<input type="text" class="form-control" name="link_gambar[]" value="{{$barang->link_gambar}}" readonly>
														</div>
													</td>
													<td>
														<div class="col-10">
															@if((auth()->user()->role == 'atasan') || (auth()->user()->role == 'admin'))
															<input type="number" class="form-control" id="quantity" name="quantity[]" value="{{$barang->quantity}}" autocomplete="off" readonly>
															@else
															<input type="number" class="form-control" id="quantity" name="quantity[]" value="{{$barang->quantity}}" autocomplete="off">
															@endif
														</div>
													</td>
													<td>
														<div class="col-10">
															<input type="text" class="form-control" name="satuan_barang[]" value="{{$barang->satuan_barang}}" readonly>
														</div>
													</td>
													<td>
														<div class="col-10">
															@if(auth()->user()->role == 'atasan')
															<input type="number" class="form-control" id="harga_satuan" name="harga_satuan[]" value="{{$barang->harga_satuan}}" autocomplete="off" readonly>
															@elseif((auth()->user()->role == 'admin') && ($pengajuan->total_harga != ''))
															<input type="number" class="form-control" id="harga_satuan" name="harga_satuan[]" value="{{$barang->harga_satuan}}" autocomplete="off" readonly>
															@else
															<input type="number" class="form-control" id="harga_satuan" name="harga_satuan[]" value="{{$barang->harga_satuan}}" autocomplete="off" required>
															@endif
														</div>
													</td>
													<td>
														<div class="col-10">
															@if((auth()->user()->role == 'admin') && ($pengajuan->proses == 'Proses'))
															<input type="number" class="form-control" id="jumlah" name="jumlah[]" value="{{ $barang->jumlah}}" autocomplete="off" readonly>
															@elseif((auth()->user()->role == 'admin') && ($pengajuan->proses == 'Selesai'))
															<input type="number" class="form-control" id="jumlah" name="jumlah[]" value="{{ $barang->jumlah}}" autocomplete="off" readonly>
															@elseif((auth()->user()->role == 'atasan') && ($pengajuan->proses == 'Proses'))
															<input type="number" class="form-control" id="jumlah" name="jumlah[]" value="{{ $barang->jumlah}}" autocomplete="off" readonly>
															@elseif((auth()->user()->role == 'atasan') && ($pengajuan->proses == 'Selesai'))
															<input type="number" class="form-control" id="jumlah" name="jumlah[]" value="{{ $barang->jumlah}}" autocomplete="off" readonly>
															@else
															<input type="number" class="form-control" id="jumlah" name="jumlah[]" required autocomplete="off">
															@endif
														</div>
													</td>
													@if(auth()->user()->role == 'atasan')
													<td colspan="2">
														<div class="col-10">
															@if($barang->status != '')
															<input type="text" class="form-control" value="{{$barang->status}}" readonly>
															@else
															<select name="status[]" class="form-inline" required>
																<option value="" selected hidden>-- Isi --</option>
																<option value="Ya">Ya</option>
																<option value="Tidak">Tidak</option>
															</select>
															@endif
														</div>
													</td>
													@elseif(auth()->user()->role == 'admin')
													<td colspan="2">
														<div class="col-10">
															@if($barang->status != '')
															<input type="text" class="form-control" value="{{$barang->status}}" readonly>
															@endif
														</div>
													</td>
													@endif
												</tr>
												<?php endforeach ?>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="5" class="text-right"><b>Total</b></td>
													<td>
														<div class="col-10">
															@if((auth()->user()->role == 'admin') && ($pengajuan->proses == 'Selesai'))
															<input type="number" name="total_harga" class="form-control" value="{{$barang->pengajuan->total_harga}}" autocomplete="off" readonly>
															@elseif((auth()->user()->role == 'admin') && ($pengajuan->proses == 'Proses'))
															<input type="number" name="total_harga" class="form-control" value="{{$barang->pengajuan->total_harga}}" autocomplete="off" readonly>
															@elseif((auth()->user()->role == 'atasan') && ($pengajuan->proses == 'Proses'))
															<input type="number" name="total_harga" class="form-control" value="{{$barang->pengajuan->total_harga}}" autocomplete="off" readonly>
															@elseif((auth()->user()->role == 'atasan') && ($pengajuan->proses == 'Selesai'))
															<input type="number" name="total_harga" class="form-control" value="{{$barang->pengajuan->total_harga}}" autocomplete="off" readonly>
															@else
															<input type="number" name="total_harga" class="form-control" value="{{$barang->pengajuan->total_harga}}" autocomplete="off" required>
															@endif
														</div>
														<td style="display: none;">
														</td>
													</td>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
							</div>
							@if((auth()->user()->role == 'atasan') && ($pengajuan->proses == 'Selesai'))
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">CATATAN</label>
								<div class="col-sm-10">
									@if (($pengajuan->catatan != null) || ($pengajuan->catatan == null))
									<textarea class="form-control" rows="3" name="catatan" disabled>{{$pengajuan->catatan}}</textarea>
									@endif
								</div>
							</div>
							<br><br>
							@elseif ((auth()->user()->role == 'atasan') && ($pengajuan->proses == 'Proses'))
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">CATATAN</label>
								<div class="col-sm-10">
									<textarea class="form-control" rows="3" name="catatan"></textarea>
								</div>
							</div>
							@else
								@if(($pengajuan->proses == 'Selesai') && ($pengajuan->catatan != null))
									<div class="form-group row">
									<label class="col-sm-2 col-form-label">CATATAN</label>
									<div class="col-sm-10">
										<textarea class="form-control" rows="3" name="catatan" disabled>{{$pengajuan->catatan}}</textarea>
									</div>
									</div>
								@elseif($pengajuan->proses == 'Selesai')
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">CATATAN</label>
									<div class="col-sm-10">
										<textarea class="form-control" rows="3" name="catatan" disabled>{{$pengajuan->catatan}}</textarea>
									</div>
									</div>
									<br><br>
								@endif
							@endif
							@if((auth()->user()->role == 'admin') && ($pengajuan->proses  == 'Belum'))
							<div class="form-group row">
								<div class="col-sm-10">
									<button type="submit" class="btn btn-primary">Kirim Form</button>
								</div>
							</div>
							@elseif(auth()->user()->role == 'admin')
							<div class="form-group row">
								<div class="col-sm-10">
									<a href="/persetujuan" class="btn btn-primary">Kembali</a>
								</div>
							</div>
							@endif
							@if((auth()->user()->role == 'atasan') && ($status_barang->count()  == 0))
							<div class="form-group row">
								<div class="col-sm-10">
									<button type="submit" class="btn btn-primary">Kirim Form</button>
								</div>
							</div>
							@elseif((auth()->user()->role == 'atasan') && ($status_barang->count()  > 0))
							<div class="form-group row">
								<div class="col-sm-10">
									<a href="/persetujuan" class="btn btn-primary">Kembali</a>
								</div>
							</div>
							@endif
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
@endsection

{{-- @section('footer')
<script>
        //operasi perhitungan
        $('tbody').keyup(function(){
        	var bil1 = parseInt($('#quantity').val());
        	var bil2 = parseInt($('#harga_satuan').val());
        	var jumlah = bil1 * bil2;

        	$('#jumlah').attr('value', jumlah);
        });
    </script>
    @endsection --}}
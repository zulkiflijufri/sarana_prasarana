<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pengajuan Barang {{$pengajuan->nama_pengajuan}}</title>
</head>
<body>
	<img src="../public/admin/assets/img/nf.png" width="135" height="135" style="float: left;">
	<p align="center" style="color: #10316b; font-size: 28px"><b>Yayasan Profesi Terpadu Nurul Fikri</b></p>
	<p align="justify" style="color: #10316b;">Jl Raya Lenteng Agung Timur No. 20, Srengseng Sawah, Jakarta Selatan - 12640 Telp +62 21 787 4223, 787 4224</p>
	<br><br>
	<span style="font-size: 18px; color: #10316b;"><b>FORM PENGAJUAN BARANG</b></span>
	<br>
	<p style="float: left;">Perihal: {{$pengajuan->perihal}}</p>
	<p style="float: right;">Unit: {{$pengajuan->unit}}</p>
	<br><br><br>
	<table style="border-collapse:collapse; margin-left: none" border="1" cellpadding="2" cellspacing="2" align="center" width="100%">
		<thead>
			<tr>
				<th align="center">No</th>
				<th align="center" colspan="6">Keterangan</th>
				<th align="center" colspan="4">Qty</th>
				<th align="center" colspan="4">Satuan Barang</th>
				<th align="center" colspan="4">Harga Satuan</th>
				<th align="center" colspan="4">Jumlah</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; ?>
			<?php foreach ($barangs as $barang) : ?>
				@if($barang->status == '')
					<tr>
						<td align="center">{{$no++}}.</td>
						<td align="center" colspan="6">{{$barang->nama_barang}}</td>
						<td align="center" colspan="4">{{$barang->quantity}}</td>
						<td align="center" colspan="4">{{$barang->satuan_barang}}</td>
						<td align="center" colspan="4">Rp. {{number_format($barang->harga_satuan,0,',','.')}}</td>
						<td align="center" colspan="4">Rp. {{$barang->jumlah}}</td>
					</tr>
				@elseif($barang->status == 'Ya')
					<tr>
						<td align="center">{{$no++}}.</td>
						<td align="center" colspan="6">{{$barang->nama_barang}}</td>
						<td align="center" colspan="4">{{$barang->quantity}}</td>
						<td align="center" colspan="4">{{$barang->satuan_barang}}</td>
						<td align="center" colspan="4">Rp. {{number_format($barang->harga_satuan,0,',','.')}}</td>
						<td align="center" colspan="4">Rp. {{$barang->jumlah}}</td>
					</tr>
				@else
					<tr>
						<td align="center">{{$no++}}.</td>
						<td align="center" colspan="6">{{$barang->nama_barang}}</td>
						<td align="center" colspan="4">{{$barang->quantity}}</td>
						<td align="center" colspan="4">{{$barang->satuan_barang}}</td>
						<td align="center" colspan="4">Rp. {{number_format($barang->harga_satuan,0,',','.')}}</td>
						<td align="center" colspan="4">Rp. {{$barang->jumlah}}</td>
					</tr>
				@endif
			<?php endforeach ?>
			<tr>
				<td colspan="19" align="right"><b>Total</b></td>
				<td colspan="4" align="center"><b>Rp. {{$pengajuan->total_harga}}</b></td>
			</tr>
		</tbody>
	</table>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br>
	<p align="justify">Catatan: {{$pengajuan->catatan}}</p>
	<table style="border-collapse:collapse; margin-left: none" border="1" cellpadding="2" cellspacing="2" align="center" width="100%">
		<tr>
			<td>Tgl. Diterima:</td>
			<td>Tgl. Verifikasi:</td>
			<td>Tgl. Verifikasi:</td>
			<td>Tgl. Verifikasi:</td>
			<td>Tgl. Verifikasi:</td>
		</tr>
		<tr>
			<td align="center">Kasir</td>
			<td align="center">Kepala Unit</td>
			<td align="center">Biro</td>
			<td align="center">Yayasan</td>
			<td align="center">Waket</td>
		</tr>
		<tr>
			<td rowspan="11"></td>
			<td rowspan="11"></td>
			<td rowspan="11">
				@if($acc_barang->count() != 0)
				<img src="../public/admin/assets/img/ttd_biro.jpg" width="80" height="50" style="margin-left: 30px; margin-bottom: 10px">
				@endif
			</td>
			<td rowspan="11">
				@if($acc_barang->count() != 0)
				<img src="../public/admin/assets/img/ttd_yayasan.jpg" width="80" height="50" style="margin-left: 30px;margin-bottom: 10px">
				@endif
			</td>
			<td rowspan="11"></td>
		</tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
	</table>
</body>

</html>
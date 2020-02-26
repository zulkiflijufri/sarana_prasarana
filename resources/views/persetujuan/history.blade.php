@extends('layouts.master')

@section('title', 'History Barang')

@section('content')

<div class="main">
  <div class="main-content">
    <div class="col-md-12">
          <div class="panel">
           <div class="panel-heading">
            <h3 class="panel-title">History Pengajuan</h3>
          </div>
          <div class="panel-body">
           <table class="table table-hover">
             <thead>
               <tr>
                <th>NO</th>
                <th>PERIHAL PENGAJUAN</th>
                <th>UNIT</th>
                <th>WAKET & SATKER</th>
                <th>TANGGAL PENGAJUAN</th>
                <th>STATUS</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @forelse($pengajuans as $pengajuan)
	              <tr>
	                <td>{{$loop->iteration}}</td>
	                <td>{{$pengajuan->perihal}}</td>
	                <td>{{$pengajuan->unit}}</td>
	                <td>{{$pengajuan->waket_satker}}</td>
	                <td>{{$pengajuan->tanggal}}</td>
                  <td>
                    @if($pengajuan->proses == 'Belum')
                      <span class="label label-danger">Belum diproses</span>
                    @else
                      <span class="label label-success">Sudah diproses</span>
                    @endif
                  </td>
	                <td>
                    @if(auth()->user()->role == 'pengajuan')
                        <a href="pdf_persetujuan/{{$pengajuan->id}}" title="Download pdf"><span class="lnr lnr-cloud-download"></span></a>
                    @else
                    	@if($pengajuan->proses == 'Belum')
                      		<a href="pdf_persetujuan/{{$pengajuan->id}}" title="Download pdf" style="pointer-events:none; opacity: 0.6"><span class="lnr lnr-cloud-download"></span></a>
                      	@else
                        	<a href="pdf_persetujuan/{{$pengajuan->id}}" title="Download pdf"><span class="lnr lnr-cloud-download"></span></a>
                      	@endif
                    @endif
                  </td>
	              </tr>
              @empty
                @if(request()->get('cari') == '')
                  <tr>
                    <td colspan="6" align="center"><i> - History pengajuan tidak ditemukan -</i></td>
                  </tr>
                @else
  	              <tr>
  	                <td colspan="6" align="center"><i> - History pengajuan masih kosong -</i></td>
  	              </tr>
                @endif
              @endforelse
            </tbody>
          </table>
          <!-- Link Paginate -->
          {!! $pengajuans->render() !!}
        </div>
      </div>
    </div>
  </div>
  @endsection
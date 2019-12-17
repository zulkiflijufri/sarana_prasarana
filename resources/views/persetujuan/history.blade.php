@extends('layouts.master')

@section('title', 'Persetujuan Barang')

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
                <th>TANGGAL</th>
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
                <td><a href="pdf_persetujuan/{{$pengajuan->id}}"><span class="lnr lnr-cloud-download"></span></a></td>
              </tr>
              @empty
              <tr>
                <td colspan="6" align="center"><i> - History pengajuan masih kosong -</i></td>
              </tr>
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
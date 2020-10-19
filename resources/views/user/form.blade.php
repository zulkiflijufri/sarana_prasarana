@extends('layouts.master')

@section('title', 'Pengajuan Barang')

@section('content')

    <!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">FORM PENGAJUAN BARANG</h3>
                        </div>
                        <div class="panel-body">
                            <form action="/pengajuan/create" method="post">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">NAMA PENGAJU</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama_pengajuan"
                                            placeholder="Nama Lengkap" autofocus autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">UNIT</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="unit" required>
                                            <option value="" selected hidden>Pilih Unit</option>
                                            <option value="STT NF">STT NF</option>
                                            <option value="NF Komputer">NF KOMPUTER</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">WAKET&SATKER</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="waket_satker" required>
                                            <option value="" selected hidden>Pilih Satuan Kerja</option>
                                            <option value="WAKET 1 (BAAK)">WAKET 1 (BAAK)</option>
                                            <option value="WAKET 1 (LLC)">WAKET 1 (LLC)</option>
                                            <option value="WAKET 1 (LPMI)">WAKET 1 (LPMI)</option>
                                            <option value="WAKET 1 (LPPMI)">WAKET 1 (LPPMI)</option>
                                            <option value="WAKET 1 (PRODI)">WAKET 1 (PRODI)</option>
                                            <option value="WAKET 1 (UPT KOMPUTER)">WAKET 1 (UPT KOMPUTER)</option>
                                            <option value="WAKET 2 (BSP)">WAKET 2 (BSP)</option>
                                            <option value="WAKET 2 (KEUANGAN)">WAKET 2 (KEUANGAN)</option>
                                            <option value="WAKET 2 (SDM)">WAKET 2 (SDM)</option>
                                            <option value="WAKET 3">WAKET 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">PERIHAL</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="perihal" required>
                                            <option value="" selected hidden>Pilih Perihal</option>
                                            <option value="ATK (Alat Tulis Kantor)">ATK (Alat Tulis Kantor)</option>
                                            <option value="Hardware">Hardware</option>
                                            <option value="Pencetakan">Pencetakan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">TANGGAL</label>
                                    <div class="col-sm-4">
                                        <div class="input-group date" data-provide="datapicker">
                                            <input type="text" class="form-control datepicker" name="tanggal"
                                                placeholder="Pilih Tanggal" autocomplete="off" required>
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
                                                        {{-- <th></th>
                                                        --}}
                                                        @if (auth()->user()->role == 'admin')
                                                            <th>Harga Satuan</th>
                                                            <th>Jumlah</th>
                                                            <th></th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr name="line_items">
                                                        <td>
                                                            <div class="col-10">
                                                                <input type="text" class="form-control" name="nama_barang[]"
                                                                    required autocomplete="off">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-10">
                                                                <input type="text" class="form-control" name="link_gambar[]"
                                                                    required autocomplete="off">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-10" required>
                                                                <input type="number"
                                                                    class="form-control input_angka quantity"
                                                                    name="quantity[]" required autocomplete="off">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-10">
                                                                <input type="text" class="form-control"
                                                                    name="satuan_barang[]" required autocomplete="off">
                                                            </div>
                                                        </td>
                                                        @if (auth()->user()->role == 'admin')
                                                            <td>
                                                                <div class="col-10">
                                                                    <input type="number"
                                                                        class="form-control input_angka harga_satuan"
                                                                        name="harga_satuan[]" required autocomplete="off">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="col-10">
                                                                    <input type="text" class="form-control" id="jumlah"
                                                                        name="jumlah[]" required
                                                                        jAutoCalc="{quantity} * {harga_satuan}">
                                                                </div>
                                                            </td>
                                                            <td class="col-10">
                                                            </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="5" class="text-right"><b>Total</b></td>
                                                        <td>
                                                            <div class="col-10">
                                                                <input type="text" class="form-control total_harga"
                                                                    id="total_harga" name="total_harga" autocomplete="off"
                                                                    required jAutoCalc="SUM({jumlah})">
                                                            </div>
                                                        </td>
                                                        <td style="display: none;">
                                                        </td>
                                                        @endif
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <a href="#" class="tambahBaris">Tambah Barang</a><br><br><br>
                                            <p>*Lengkapi Nama Barang dengan ukuran dan warna yang lebih spesifik</p>
                                            <p>*Lengkapi Quantity dengan jumlah yang jelas. Misal pcs/lusin/rim/pack</p>
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary" name="">Kirim Form</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN -->
    @endsection

    @section('footer')
        <script type="text/javascript">
            < beautify start = "@if "
            exp = "^^^session('berhasil')^^^" >
                toastr.success('{{ session('
                    berhasil ') }}') <
                /beautify end="</beautify
            end = "@endif" > ">

        </script>

        @if (auth()->user()->role == 'pengajuan')
            <script src="{{ asset('js/pengajuan.js') }}"></script>
        @elseif(auth()->user()->role == 'admin')
            <script src="{{ asset('js/admin.js') }}"></script>
        @endif
    @endsection

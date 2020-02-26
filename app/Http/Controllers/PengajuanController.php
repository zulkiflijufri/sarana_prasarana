<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pengajuan;
use App\Barang;

class PengajuanController extends Controller
{
    public function index() {
        return view('pengajuan.index');
    }

    public function create(Request $request) {
        $pengajuan = $request->all();
        $id_pengajuan = Pengajuan::create($pengajuan)->id;

        if(count($request->nama_barang) > 0) {
            foreach($request->nama_barang as $barang => $value) {
                $barang2 = [
                    'nama_barang' => $request->nama_barang[$barang],
                    'link_gambar' => $request->link_gambar[$barang],
                    'quantity' => $request->quantity[$barang],
                    'satuan_barang' => $request->satuan_barang[$barang],
                    'harga_satuan' => $request->harga_satuan[$barang],
                    'jumlah' => $request->jumlah[$barang],
                    'pengajuan_id' => $id_pengajuan,
                ];

                Barang::insert($barang2);
            }
        }
        return redirect ('/pengajuan')->with('berhasil', 'Pengajuan Berhasil Di Kirim');
    }
}

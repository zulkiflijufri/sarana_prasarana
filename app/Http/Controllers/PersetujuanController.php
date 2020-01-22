<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengajuan;
use App\Barang;
use PDF;

class PersetujuanController extends Controller
{
    public function index() {
        $pengajuans = Pengajuan::orderBy('id', 'DESC')->paginate(5);
        return view ('persetujuan.index', ['pengajuans' => $pengajuans]);
    }

    public function detail($id) {
        $pengajuan = Pengajuan::find($id);
        $barangs = Barang::where('pengajuan_id', $id)->get();
        return view ('persetujuan.detail', compact('barangs','pengajuan'));
    }

    public function delete($id) {
        $pengajuan = Pengajuan::find($id);
        $pengajuan->delete();
        return redirect('/persetujuan')->with('hapus', 'Data Pengajuan Berhasil Di Hapus');
    }

    public function proses(Request $request ,$id)
    {
        $barang = $request->status;
        //dd($barang['0']);

        $catatan = $request->catatan;
        Pengajuan::where('id', $id)->update([
            'catatan' => $catatan
        ]);

        return redirect('/persetujuan')->with('proses', 'Pengajuan Berhasil Di Proses');
    }

    public function history()
    {
        $pengajuans = Pengajuan::orderBy('id', 'DESC')->paginate(8);
        return view ('persetujuan.history', ['pengajuans' => $pengajuans]);
    }

    public function pdf_persetujuan($id)
    {
        $pengajuan = Pengajuan::find($id);
        $barangs = Barang::where('pengajuan_id', $id)->get();
        $pdf = PDF::loadview('persetujuan.pdf_persetujuan', ['pengajuan' => $pengajuan], compact('barangs'));
        return $pdf->stream('Pengajuan Barang_'.$pengajuan->nama_pengajuan.'.pdf');
    }
}

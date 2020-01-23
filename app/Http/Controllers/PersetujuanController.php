<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengajuan;
use App\Barang;
use PDF;

class PersetujuanController extends Controller
{
    public function index(Request $request) {
        if ($request->has('cari')) {
            $pengajuans = Pengajuan::where('nama_pengajuan', 'LIKE', '%'.$request->cari.'%')
                          ->orderBy('id','DESC')->paginate(5);
        } else {
            $pengajuans = Pengajuan::orderBy('id', 'DESC')->paginate(5);    
        }
        return view ('persetujuan.index', ['pengajuans' => $pengajuans]);
    }

    public function detail(Request $request, $id) {
        $pengajuan = Pengajuan::findOrFail($id);
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
        $status = $request->status;
        $nama_barang = $request->nama_barang;
        for ($i = 0; $i < count($status); $i++) {
            Barang::where('nama_barang', $nama_barang[$i])->update([
                'status' => $status[$i]
            ]);   
        }

        $catatan = $request->catatan;
        Pengajuan::where('id', $id)->update([
            'catatan' => $catatan
        ]);

        return redirect('/persetujuan')->with('proses', 'Pengajuan Berhasil Di Proses');
    }

    public function history(Request $request)
    {
        if ($request->has('cari')) {
            $pengajuans = Pengajuan::where('perihal', 'LIKE', '%'.$request->cari.'%')
                          ->orderBy('id','DESC')->paginate(8);
        } else {
            $pengajuans = Pengajuan::orderBy('id', 'DESC')->paginate(8);
        }
        return view ('persetujuan.history', ['pengajuans' => $pengajuans]);
    }

    public function pdf_persetujuan($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $barangs = Barang::where('pengajuan_id', $id)->whereIn('status', ['Ya'])->get();
        $pdf = PDF::loadview('persetujuan.pdf_persetujuan', ['pengajuan' => $pengajuan], compact('barangs'));
        return $pdf->stream('Pengajuan Barang_'.$pengajuan->nama_pengajuan.'.pdf');
    }
}

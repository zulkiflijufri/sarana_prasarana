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
            ->orWhere('unit', 'LIKE', '%'.$request->cari.'%')->orWhere('waket_satker', 'LIKE',
            '%'.$request->cari.'%')->orderBy('id','DESC')->paginate(5);
        } else {
            $pengajuans = Pengajuan::orderBy('id', 'DESC')->paginate(5);
        }
        return view ('persetujuan.index', compact('pengajuans'));
    }

    public function detail(Request $request, $id) {
        $pengajuan = Pengajuan::findOrFail($id);
        $barangs = Barang::where('pengajuan_id', $id)->get();
        $status_barang = Barang::where('pengajuan_id', $id)->whereIn('status', ['Ya', 'Tidak'])->get();
        $jml_status = count($status_barang);
        return view ('persetujuan.detail', compact('barangs','pengajuan','jml_status'));
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
            ->orWhere('unit', 'LIKE', '%'.$request->cari.'%')->orWhere('waket_satker', 'LIKE',
            '%'.$request->cari.'%')->orWhere('tanggal', 'LIKE', '%'.$request->cari.'%')
            ->orderBy('id','DESC')->paginate(8);
        } else {
            $pengajuans = Pengajuan::orderBy('id', 'DESC')->paginate(8);
        }
        return view ('persetujuan.history', ['pengajuans' => $pengajuans]);
    }

    public function pdf_persetujuan($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $barangs = Barang::where('pengajuan_id', $id)->get();
        $acc_barangs = Barang::where('pengajuan_id', $id)->whereIn('status', ['Ya'])->get();
        $jml_status = count($acc_barangs);
        $pdf = PDF::loadview('persetujuan.pdf_persetujuan',compact('pengajuan','barangs','acc_barangs','jml_status'));
        return $pdf->stream('Pengajuan Barang_'.$pengajuan->nama_pengajuan.'.pdf');
    }
}

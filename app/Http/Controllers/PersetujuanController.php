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
            '%'.$request->cari.'%')->simplePaginate(5);
        } else {
            $pengajuans = Pengajuan::simplePaginate(5);
        }
        return view ('persetujuan.index', compact('pengajuans'));
    }

    public function detail(Request $request, $id) {
        $pengajuan = Pengajuan::findOrFail($id);
        $barangs = Barang::where('pengajuan_id', $id)->get();
        $status_barang = Barang::where('pengajuan_id', $id)->whereIn('status', ['Ya', 'Tidak'])->get();
        return view ('persetujuan.detail', compact('barangs','pengajuan','status_barang'));
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
        $barang = Barang::where('pengajuan_id',$id)->get();

        for ($i = 0; $i < count($nama_barang); $i++) {
            Barang::where([
                ['nama_barang', '=', $barang[$i]->nama_barang],
                ['pengajuan_id', '=',$barang[0]->pengajuan_id]])->update([
                    'status' => $status[$i]
            ]);
        }

        $catatan = $request->catatan;
        Pengajuan::where('id', $id)->update([
            'catatan' => $catatan,
            'proses' => 'Selesai'
        ]);

        return redirect('/persetujuan')->with('proses', 'Pengajuan Berhasil Di Proses');
    }

    public function history(Request $request)
    {
        if ($request->has('cari')) {
            $pengajuans = Pengajuan::where('perihal', 'LIKE', '%'.$request->cari.'%')
            ->orWhere('unit', 'LIKE', '%'.$request->cari.'%')->orWhere('waket_satker', 'LIKE',
            '%'.$request->cari.'%')->orWhere('tanggal', 'LIKE', '%'.$request->cari.'%')
            ->simplePaginate(8);
        } else {
            $pengajuans = Pengajuan::simplePaginate(8);
        }
        return view ('persetujuan.history', ['pengajuans' => $pengajuans]);
    }

    public function pdf_persetujuan($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $barangs = Barang::where('pengajuan_id', $id)->get();
        $acc_barang = Barang::where('pengajuan_id', $id)->whereIn('status', ['Ya'])->get();
        $pdf = PDF::loadview('persetujuan.pdf_persetujuan',compact('pengajuan','barangs','acc_barang'));
        return $pdf->stream('Pengajuan Barang_'.$pengajuan->nama_pengajuan.'.pdf');
    }
}

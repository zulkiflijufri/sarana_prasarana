<?php

namespace App\Http\Controllers;

use PDF;
use App\Barang;
use App\Pengajuan;
use Illuminate\Http\Request;

class PersetujuanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $pengajuans = Pengajuan::where('nama_pengajuan', 'LIKE', '%' . $request->cari . '%')
                ->orWhere('unit', 'LIKE', '%' . $request->cari . '%')->orWhere('waket_satker', 'LIKE', '%' . $request->cari . '%')
                ->simplePaginate(5);
        } else {
            $pengajuans = Pengajuan::orderBy('created_at', 'DESC')->simplePaginate(5);
        }
        return view('persetujuan.index', compact('pengajuans'));
    }

    public function detail(Request $request, $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $barangs = Barang::where('pengajuan_id', $id)->get();
        $status_barang = Barang::where('pengajuan_id', $id)->whereIn('status', ['Ya', 'Tidak'])->get();
        return view('persetujuan.detail', compact('barangs', 'pengajuan', 'status_barang'));
    }

    public function delete($id)
    {
        $pengajuan = Pengajuan::find($id);
        $pengajuan->delete();
        return redirect('/persetujuan')->with('hapus', 'Data Pengajuan Berhasil Di Hapus');
    }

    public function proses(Request $request, $id)
    {
        $nama_barang = $request->nama_barang;
        if (auth()->user()->role == 'admin') {
            for ($i = 0; $i < count($nama_barang); $i++) {
                Barang::where('nama_barang', $nama_barang[$i])->update([
                    'harga_satuan' => $request->harga_satuan[$i],
                    'jumlah' => $request->jumlah[$i]
                ]);
            }
            Pengajuan::where('id', $id)->update([
                'proses' => 'Proses',
                'total_harga' => $request->total_harga
            ]);
            return redirect('/persetujuan')->with('proses', 'Pengajuan Sementara Di Proses');
        } else {
            for ($i = 0; $i < count($nama_barang); $i++) {
                Barang::where('nama_barang', $nama_barang[$i])->update([
                    'status' => $request->status[$i]
                ]);
            }
        }
        Pengajuan::where('id', $id)->update([
            'proses' => 'Selesai',
            'catatan' => $request->catatan
        ]);
        return redirect('/persetujuan')->with('proses', 'Pengajuan Berhasil Di Proses');
    }

    public function history(Request $request)
    {
        if ($request->has('cari')) {
            $pengajuans = Pengajuan::where('perihal', 'LIKE', '%' . $request->cari . '%')
                ->orWhere('unit', 'LIKE', '%' . $request->cari . '%')->orWhere('waket_satker', 'LIKE', '%' . $request->cari . '%')
                ->orWhere('tanggal', 'LIKE', '%' . $request->cari . '%')
                ->simplePaginate(8);
        } else {
            $pengajuans = Pengajuan::orderBy('created_at', 'DESC')->simplePaginate(5);
        }
        return view('persetujuan.history', ['pengajuans' => $pengajuans]);
    }

    public function pdf_persetujuan($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $barangs = Barang::where('pengajuan_id', $id)->get();
        $no_barang = Barang::where('pengajuan_id', $id)->whereIn('status', ['Tidak'])->get();
        $acc_barang = Barang::where('pengajuan_id', $id)->whereIn('status', ['Ya'])->get();
        $pdf = PDF::loadview('persetujuan.pdf_persetujuan', compact('pengajuan', 'barangs', 'acc_barang', 'no_barang'));

        if ($pengajuan->proses != 'Selesai') {
            return redirect()->back();
        }
        return $pdf->stream('Pengajuan Barang_' . $pengajuan->nama_pengajuan . '.pdf');
    }
}

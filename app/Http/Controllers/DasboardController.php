<?php

namespace App\Http\Controllers;

use App\Pengajuan;
use App\Barang;
use Illuminate\Http\Request;

class DasboardController extends Controller
{
    public function index() {
    	$pengajuan = Pengajuan::all();
    	$barang = Barang::all();
    	$sttnf = Pengajuan::where('unit','STT NF')->get();
    	$nfcom = Pengajuan::where('unit','NF Komputer')->get();
    	$no_proses = Pengajuan::where('proses', 'Belum')->get();
    	$barang_acc = Barang::where('status', 'Ya')->get();
        return view('dasboard',compact('pengajuan','no_proses','barang','barang_acc','sttnf','nfcom'));
    }
}

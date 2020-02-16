<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = "pengajuan";
    protected $fillable = ['nama_pengajuan', 'unit', 'waket_satker', 'perihal', 'tanggal' ,'catatan', 'total_harga','proses'];

    public function barang() {
    	return $this->hasMany(Barang::class);
    }
}

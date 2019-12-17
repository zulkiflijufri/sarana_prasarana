<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = "barang";
    protected $fillable = ['nama_barang', 'link_gambar', 'quantity', 'harga_satuan', 'jumlah', 'status', 'pengajuan_id'];

    public function pengajuan()
    {
    	return $this->belongsTo(Pengajuan::class);
    }

    function test()
    {
    	echo 'Test';
    }
}

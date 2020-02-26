<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengajuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_pengajuan', 100);
            $table->string('unit', 50);
            $table->string('waket_satker', 50);
            $table->string('perihal', 50);
            $table->string('tanggal', 20);
            $table->enum('proses',['Belum','Selesai'])->default('Belum');
            $table->text('catatan')->nullable();
            $table->string('total_harga',11);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan');
    }
}

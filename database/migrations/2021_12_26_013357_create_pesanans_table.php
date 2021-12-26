<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedbigInteger('id_penanganan')->unsigned();
            $table->unsignedbigInteger('id_jenis_tempat')->unsigned();
            $table->string('nama_Pemesan');
            $table->integer('panjang');
            $table->integer('lebar');
            $table->string('alamat');
            $table->date('tanggal_pengerjaan');
            $table->string('no_telp');
            $table->string('email');
            $table->string('status');
            $table->integer('harga');
            $table->timestamps();

            $table->foreign('id_penanganan')->references('id')->on('jenis_penanganans')->onDelete('cascade');
            $table->foreign('id_jenis_tempat')->references('id')->on('jenis_tempats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCooperationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_corporate', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_kategori');
            $table->text('deskripsi');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('cooperation', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('kode_corporate');
            $table->string('nama');
            $table->string('email');
            $table->string('nama_usaha');
            $table->string('logo_usaha')->nullable();
            $table->uuid('kategori_corporate_id');
            // $table->enum('kategori', ['Pribadi', 'Bisnis'])->nullable();
            $table->text('alamat_usaha');
            $table->integer('kecamatan_id');
            $table->integer('kota_id');
            $table->integer('provinsi_id');
            $table->string('negara');
            $table->string('no_telp');
            $table->string('berkas')->nullable();
            $table->string('ttd_1')->nullable();
            $table->string('ttd_2')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori_corporate');
        Schema::dropIfExists('cooperation');
    }
}

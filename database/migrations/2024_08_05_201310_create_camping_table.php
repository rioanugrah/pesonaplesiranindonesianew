<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camping_category', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_kategori');
            $table->string('status',100);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('camping_pricelist', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('camping_category_id');
            $table->string('nama_barang');
            $table->string('price');
            $table->integer('stock');
            $table->string('status',100);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('camping_campers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('first_name');
            $table->string('last_name');
            $table->text('address');
            $table->string('no_telp',100);
            $table->string('email');
            $table->string('city');
            $table->string('state');
            $table->text('foto_identitas');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('camping_reservation', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('camping_campers_id');
            $table->date('resv_date');
            $table->string('resv_night',10);
            $table->string('status',100);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('camping_return', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('camping_reservation_id');
            $table->date('return_date');
            $table->string('status',100);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('camping_order', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('camping_reservation_id');
            $table->string('kode_order');
            $table->text('order');
            $table->string('total');
            $table->string('status',100);
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
        Schema::dropIfExists('camping_category');
        Schema::dropIfExists('camping_pricelist');
        Schema::dropIfExists('camping_campers');
        Schema::dropIfExists('camping_reservation');
        Schema::dropIfExists('camping_return');
        Schema::dropIfExists('camping_order');
    }
}

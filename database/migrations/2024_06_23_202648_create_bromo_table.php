<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBromoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bromo', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->dateTime('tanggal');
            $table->string('slug');
            $table->string('title');
            $table->string('meeting_point');
            $table->string('category_trip');
            $table->integer('quota');
            $table->integer('max_quota');
            $table->text('destination');
            $table->text('include');
            $table->text('exclude');
            $table->string('price');
            $table->string('discount');
            $table->string('images');
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
        Schema::dropIfExists('bromo');
    }
}

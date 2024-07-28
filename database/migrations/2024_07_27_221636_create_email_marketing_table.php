<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailMarketingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_template_marketing', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->text('descriptions');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('email_marketing', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('subject');
            $table->text('to');
            $table->text('descriptions');
            $table->text('attachment')->nullable();
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
        Schema::dropIfExists('email_template_marketing');
        Schema::dropIfExists('email_marketing');
    }
}

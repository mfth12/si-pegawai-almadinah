<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konfigs', function (Blueprint $table) {
            $table->bigIncrements('konfig_id')->from(701);
            $table->string('nama_sistem')->nullable();
            $table->string('unik')->nullable();
            $table->string('nama_lembaga')->nullable();
            $table->string('logo_lembaga')->nullable();
            $table->string('ikon')->nullable();
            $table->string('alamat_lembaga')->nullable();
            $table->string('email_resmi')->nullable();
            $table->string('no_telp')->nullable();
            $table->integer('periode_aktif')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konfigs');
    }
}

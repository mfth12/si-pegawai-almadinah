<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPenggunasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_penggunas', function (Blueprint $table) {
            $table->increments('detail_user_id')->from(61); #key penting
            $table->foreignId('user_id'); #key penting


            //////// PRIBADI //////
            $table->string('nama_arab');
            $table->string('nisn');
            $table->string('asal');
            $table->string('tempat_lahir')->nullable();
            // $table->string('tanggal_lahir')->nullable();
            // $table->string('kelas')->nullable();
            // $table->string('sub_kelas')->nullable();
            // ///////// ORTU ////////
            // $table->string('nama_ayah')->nullable();
            // $table->string('pekerjaan_ayah')->nullable();
            // $table->string('nama_ibu')->nullable();
            // $table->string('pekerjaan_ibu')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_penggunas');
    }
}

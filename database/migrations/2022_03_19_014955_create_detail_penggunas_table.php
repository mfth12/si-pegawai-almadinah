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
            $table->foreignId('user_id')
            ->references('user_id')
            ->on('penggunas')
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->unsigned(); #key foreign

            //////// PRIBADI //////
            $table->string('foto')->nullable();
            $table->string('nama_arab')->nullable();
            $table->string('nisn')->nullable();
            $table->string('asal')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('kelas')->nullable();
            $table->string('sub_kelas')->nullable();
            $table->string('alamat')->nullable();
            ///////// ORTU ////////
            $table->string('nama_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            
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

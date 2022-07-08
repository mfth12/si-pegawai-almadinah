<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beritas', function (Blueprint $table) {
            // $table->id();
            $table->increments('id')->from(231); #primary key
            // $table->foreignId('penulis')
            // ->references('user_id')
            // ->on('penggunas')
            // ->onUpdate('cascade')
            // ->onDelete('cascade')
            // ->unsigned(); #foreign key
            
            ////BERITA////
            $table->string('judul_berita');
            $table->text('isi_berita');
            $table->date('tanggal')->nullable();
            $table->string('gambar')->nullable();
            $table->string('penulis')->nullable();
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
        Schema::dropIfExists('beritas');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mahasiswa');
            $table->integer('umur');
            $table->string('alamat');
            $table->string('telepon');
            $table->string('email');
            $table->date('tanggal_lahir');


            $table->timestamps();
        });

        Schema::table('mahasiswa', function (Blueprint $table){
            $table->foreignId('prodi_id')
                ->constrained('prodi')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa');
    }
}

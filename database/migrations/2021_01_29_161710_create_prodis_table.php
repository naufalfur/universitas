<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_prodi');
            $table->string('jenjang');
            $table->integer('waktu_tempuh_minimal');
            $table->integer('waktu_tempuh_maksimal');

            $table->timestamps();
        });

        Schema::table('prodi', function (Blueprint $table){
            $table->foreignId('fakultas_id')
                ->constrained('fakultas')
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
        Schema::dropIfExists('prodi');
    }
}

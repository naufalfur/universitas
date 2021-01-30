<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    //
    protected $table = "prodi";


    protected $fillable = ['nama_prodi', 'jenjang', 'waktu_tempuh_minimal', 'waktu_tempuh_maksimal', 'fakultas_id'];

    public function fakultas(){
        return $this->belongsTo('App\Fakultas');
    }

    public function mahasiswas(){
        return $this->hasMany('App\Mahasiswa');
    }
}

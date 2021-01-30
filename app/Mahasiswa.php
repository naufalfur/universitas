<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    //
    protected $table = "mahasiswa";

    protected $fillable = ['nama_mahasiswa', 'umur', 'alamat', 'telepon', 'email', 'tanggal_lahir', 'prodi_id'];

    public function prodi(){
        return $this->belongsTo('App\Prodi');
    }
}

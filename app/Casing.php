<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Casing extends Model
{
    protected $fillable = [
        'judul','foto',
    ];

    public function foto() {

        //cek file exist di folder tempat file image
        if (file_exists( public_path() . '/images/casing/' .
        $this->foto) && $this->foto != null ) {
            //jika ada tampilkan gambar defaullt
            return '/images/casing/' . $this->foto;
        } else {
            return url('/images/casing/default.png');
        }
    }
}



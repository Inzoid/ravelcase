<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testi extends Model
{
    protected $fillable = [
        'judul', 'foto',
    ];

    public function foto() {

        //cek file exist di folder tempat file image
        if (file_exists( public_path() . '/images/testimoni/' .
        $this->foto) && $this->foto != null ) {
            //jika ada tampilkan gambar defaullt
            return '/images/testimoni/' . $this->foto;
        } else {
            return url('/img/def-up.jpg');
        }
    }
}

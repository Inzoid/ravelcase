<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Casing;
use App\Testi;
use Session;

class TestiController extends Controller
{
    public function index()
    {
        $testi = Testi::all();
        return view('testi.index',compact('testi'));
    }
  
    public function create()
    {
        return view('testi.create');
    }


    public function store(Request $request)
    {
        $patchImage = '/images/testimoni';
        $testi = new Testi();
        if ($request->foto) {
            //rename file yang diupload menjadi users-random.extension file
            $foto ='testi-'.str_random(5).time().'.'.$request->file('foto')->getClientOriginalExtension();
            //path lokasi penyimpanan file public/images/users/
            $request->foto->move(public_path($patchImage), $foto);
            //simpan nama file image ke field image
            $testi->foto = $foto;
        }

        $judul = $request->input('judul');
        $testi->judul = $judul;
        $testi->save();

        Session::flash('notice', 'Testi berhasil dibuat');
        return redirect()->route('testimoni');
    }

    public function edit($id)
    {
        $testi = Testi::find($id);
        return view('testi.edit')->with('testi', $testi);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

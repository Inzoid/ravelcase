<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Casing;
use App\Testi;
use Session;
use File;

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
        $pathImage = 'images/testimoni/';  
        $testi = Testi::find($id);
        $image = public_path("images/testimoni/" . $testi->foto);

        if($request->foto) {
            $foto = 'testi-update' . str_random(3).time()
            . '.' . $request->file('foto')->getClientOriginalExtension();
            
            $request->foto->move(public_path('images/testimoni/'), $foto);
            $testi->foto = $foto;
        }

        if (File::exists($image)) {
            unlink($image);
        }
        $judul = $request->get('judul');
        
        $testi->judul = $judul;
        $testi->save(); 

        Session::flash('notice', 'Testi berhasil diupdate');
        return redirect()->route("testimoni");
    }

    public function destroy($id)
    {
        Testi::destroy($id);
        Session::flash('notice', 'Testi Berhasil Dihapus');
        return redirect()->route("testimoni");
    }
}

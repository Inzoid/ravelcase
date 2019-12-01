<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Casing;
use Session;
use DB;

class AdminController extends Controller
{

    public function index()
    {
        $casing = Casing::all();
        $casing = Casing::paginate(5);
        $table = DB::table('casings')
                ->orderBy('created_at', 'desc')
                ->first();
        $last_row = DB::table('casings')->latest()->first();
        return view('admin.index', compact('casing','last_row'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $patchImage = '/images/casing';
        $casing = new Casing();
        if ($request->foto) {
            //rename file yang diupload menjadi users-random.extension file
            $foto ='casing-'.str_random(5).time().'.'.$request->file('foto')->getClientOriginalExtension();
            //path lokasi penyimpanan file public/images/users/
            $request->foto->move(public_path($patchImage), $foto);
            //simpan nama file image ke field image
            $casing->foto = $foto;
        }

        $judul = $request->input('judul');
        $casing->judul = $judul;
        $casing->save();

        Session::flash('notice', 'Case berhasil dibuat');
        return redirect()->route('dashboard');

    }

    public function show()
    {
        $casing = Casing::all()->latest();
        return view('admin.table')->with('casing', $casing);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Casing::destroy($id);
        Session::flash('notice', 'berhasil menghapus case');
        return redirect()->route('dashboard');
    }
}

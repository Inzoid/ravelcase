<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Casing;
use Session;
use DB;
use File;

class AdminController extends Controller
{

    public function index()
    {
        $casing = Casing::all();
        $casing = Casing::paginate(8);
        $table = DB::table('casings')
                ->orderBy('created_at', 'desc')
                ->first();
        $last_row = DB::table('casings')->latest()->first();
        return view('admin.index', compact('casing'));
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
        $casing = Casing::all();
        return view('admin.table')->with('casing', $casing);
    }

    public function edit($id)
    {
       $casing = Casing::find($id);
       return view('admin.edit')->with('casing', $casing);
    }

    public function update(Request $request, $id)
    {
        $pathImage = 'images/casing/';  
        $casing = Casing::find($id);
        $image = public_path("images/casing/" . $casing->foto);

        if($request->foto) {
            $foto = 'case-update' . str_random(3).time()
            . '.' . $request->file('foto')->getClientOriginalExtension();
            
            $request->foto->move(public_path('images/casing/'), $foto);
            $casing->foto = $foto;
        }

        if (File::exists($image)) {
            unlink($image);
        }
        $judul = $request->get('judul');
        
        $casing->judul = $judul;
        $casing->save(); 

        Session::flash('notice', 'Case berhasil diupdate');
        return redirect()->route("dashboard");
    }

    public function destroy($id)
    {
        Casing::destroy($id);
        Session::flash('notice', 'berhasil menghapus case');
        return redirect()->route('dashboard');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Casing;
use Session;

class AdminController extends Controller
{

    public function index()
    {
        $casing = Casing::all();
        return view('admin.index')->with('casing', $casing);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

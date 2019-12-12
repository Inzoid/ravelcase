<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;

class CategoryController extends Controller
{

    public function index()
    {
        $kategori = Category::all();
        return view('admin.kategori.index')->with('kategori', $kategori);
    }

    public function create()
    {
        $kategori = Category::all();
        return view('admin.kategori.create')->with('kategori', $kategori);
    }

   
    public function store(Request $request)
    {
        $kategori = new Category();
        $nama_kategori = $request->input('nama_kategori');
        $kategori->nama_kategori = $nama_kategori;
        $kategori->save();
        Session::flash('notice', 'Create Kategori Sukses');
        return view('admin.kategori.index');
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
        Category::destroy($id);
        Session::flash('notice', 'Hapus kategori berhasil');
        return redirect()->back();
    }
}

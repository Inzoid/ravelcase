<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Casing;
use App\Testi;

class CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $casing = Casing::all();
        $testi  = Testi::all();
        $casing = Casing::orderBy('created_at', 'desc')->paginate(8);
        return view('home.index',compact('casing', 'testi'));
    }
    
}

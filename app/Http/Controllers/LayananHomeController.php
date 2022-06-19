<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Layanan;
use App\CategoryLayanan;

class LayananHomeController extends Controller
{
    public function index(Request $request)
    {

        $layanan = Layanan::orderBy('created_at','desc')->take(8)->get();
        $katlayanan = CategoryLayanan::all();

        return view('home.index',compact('layanan','katlayanan'));
    }
    public function layanan()
    {
        $layanan =  Layanan::orderBy('created_at','desc')->paginate(12);
        $katlayanan = CategoryLayanan::all();

        return view('layanan.index',compact('layanan','katlayanan'));
    }
    public function showLayanan($slug)
    {
        $layanan = Layanan::where('slug',$slug)->first();

        return view('layanan.detail', compact('layanan'));
    }    
    public function kategori($slug)
    {
        $katlayanan = CategoryLayanan::withCount('layanan')->get();

        $layanan = CategoryLayanan::where('slug',$slug)->first()->layanan()->orderBy('created_at','desc')->paginate(12);

        return view('layanan.index',compact('layanan','katlayanan'));
    }
    public function cari(Request $request)
    {
        $cari = $request->cari;

        $layanan = Layanan::where('name','like',"%".$cari."%")->paginate(12);
        $katlayanan = CategoryLayanan::withCount('layanan')->get();

        // if($cari !== $produk)
        // {
        //     alert()->error('Tidak Ditemukan!', 'Produk');

        //     return redirect()->route('produk.admin');
        // }

        return view('layanan.index',compact('layanan','katlayanan'));
    }
}

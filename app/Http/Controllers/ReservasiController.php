<?php

namespace App\Http\Controllers;

use App\Reservasi;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservasi = Reservasi::paginate(5);
        return view('admin.reservasi', compact('reservasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambahForm()
    {

        return view('admin.tambahReservasi');
    }

     public function tambahReservasi(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nama_layanan' => 'required',
            'tanggal' => 'required',
            'total' => 'required',
        ]);

        $reservasi = new Reservasi();
        $reservasi->nama = $request->nama;
        $reservasi->nama_layanan = $request->nama_layanan;
        $reservasi->tanggal = $request->tanggal;
        $reservasi->total = $request->total;

        $reservasi->save();

        alert()->success('Tambah reservasi', 'Sukses');

        return redirect()->route('tambahreservasi.admin');

    }

}
 
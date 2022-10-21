<?php

namespace App\Http\Controllers;

use App\Reservasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use PDF;
use Dompdf\Dompdf;
use Carbon\Carbon;
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
            'nama_pelanggan'=>'required',
            'nama_resevasi'=>'required',
            'tanggal'=>'required',
            'total'=>'required',
        ]);

        $tanggal = Carbon::now();


        $reservasi = new Reservasi();
        $reservasi->nama_pelanggan = $request->nama_pelanggan;
        $reservasi->nama_resevasi = $request->nama_resevasi;
        $reservasi->total = $request->total;
        $reservasi->tanggal = $tanggal;

        $reservasi->save();


        alert()->success('Tambah Reservasi', 'Sukses');

        return redirect()->route('tampilreservasi.admin');

    }

    public function detailReservasi($id)
    {
        $reservasi = Reservasi::where('id',$id)->first();

        return view('admin.detailReservasi',compact('reservasi'));
    }
    
    public function editForm($id)
    {
        $reservasi = Reservasi::where('id',$id)->first();

        return view('admin.editReservasi',compact('reservasi'));
    }

    public function updateReservasi(Request $request,$id)
    {

        $request->validate([
            'nama_pelanggan' => 'required',
            'nama_resevasi' => 'required',
            'tanggal' => 'required',
            'total' => 'required',
        ]);

        $tanggal = Carbon::now();
        $reservasi = Reservasi::where('id',$id)->first();

        $reservasi->nama_pelanggan = $request->nama_pelanggan;
        $reservasi->nama_resevasi = $request->nama_resevasi;
        $reservasi->tanggal = $request->tanggal;
        $reservasi->total = $request->total;

        $reservasi->save();

        alert()->success('Ubah Reservasi', 'Sukses');

        return redirect()->route('tampilreservasi.admin');
    }

    public function hapusReservasi($id)
    {
        $reservasi = Reservasi::where('id',$id)->first();
        
        Reservasi::where('id',$id)->delete();

        alert()->error('Hapus Reservasi', 'Sukses');

        return redirect()->route('tampilreservasi.admin');
    }

    public function reportReservasi(Request $request)
    {
       
        $month = isset($request->bulan) ? $request->bulan : date('Y-m');
        $reservasi = Reservasi::all();
            
            $report = array_values(Arr::sort($reservasi, function ($value) {
                return $value->date;
            }));


    
            $data = [
                'title' => 'Report',
                'report' => $report
            ];

             if (isset($request->export) && $request->export) {
        // dd($data);
        $pdf = PDF::loadview('admin.reportReservasi', $data)
            ->setPaper('f4', 'landscape');
        $pdf->setOptions(
            [
                'dpi' => 150,
                'defaultFont' => 'arial',
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true
            ]
        );
        return $pdf->stream('REPORT_' . Carbon::now() . '.pdf');
    }
    
        return view('admin.reportReservasi', compact('reservasi'));
        
       
}

}
 
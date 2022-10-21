<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use PDF;
use Dompdf\Dompdf;
use Carbon\Carbon;

class ReportController extends Controller
{  
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
       
            $month = isset($request->bulan) ? $request->bulan : date('Y-m');
            $orders = Order::where('status','=','Sudah Bayar')->first()
            ->get();
                
                $report = array_values(Arr::sort($orders, function ($value) {
                    return $value->date;
                }));


        
                $data = [
                    'title' => 'Report',
                    'report' => $report
                ];

                 if (isset($request->export) && $request->export) {
            // dd($data);
            $pdf = PDF::loadview('report.export', $data)
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
        
            return view('report.export', $data);
            
           
    }

}  

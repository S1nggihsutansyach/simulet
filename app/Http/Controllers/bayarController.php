<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Order;

class bayarController extends Controller
{
    public function upload($slug){
        $file = Request()->bukti_bayar;
        $fileName = Request()->slug .'.'. $file->extension();
        $file->move(public_path('bukti_transfer'),$fileName);

        Order::where('slug', $slug)->update([
            'bukti_bayar' => $fileName
        ]);
        
        return redirect()->back();
    }
}

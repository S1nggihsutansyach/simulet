<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Layanan;
use App\CategoryLayanan;
use UxWeb\SweetAlert\SweetAlert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
class LayananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $layanan = Layanan::orderBy('updated_at','desc')->paginate(10);

        return view('admin.layanan',compact('layanan'));
    }


    public function cari(Request $request)
    {
        $cari = $request->cari;

        $layanan = Layanan::where('name','like',"%".$cari."%")->paginate(10);

        // if($cari !== $produk)
        // {
        //     alert()->error('Tidak Ditemukan!', 'Produk');

        //     return redirect()->route('produk.admin');
        // }

        return view('admin.layanan',compact('layanan'));
    }

    public function tambahForm()
    {

        $katlayanan = CategoryLayanan::all();

        return view('admin.tambahLayanan',compact('katlayanan'));
    }

    public function detailLayanan($slug)
    {
        $layanan = Layanan::where('slug',$slug)->first();

        return view('admin.detailLayanan',compact('layanan'));
    }

    public function tambahLayanan(Request $request)
    {

        $request->validate([
            'name'=>'required|string',
            'price'=>'required|string',
            'category_id'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg|max:2048',
            'desc'=>'required'
        ]);

        $tanggal = Carbon::now();


        $imageExtension = $request->image->extension();
        $imageName = 'img_'.time().'.'.$imageExtension;
        $imagePath = $request->image->storeAs('images',$imageName,'public');

        $format_price = preg_replace('/\D/','',$request->price);
        $layanan = new Layanan();
        $layanan->name = $request->name;
        $layanan->slug = Str::slug($request->name);
        $layanan->price = $format_price;
        $layanan->category_id = $request->category_id;
        $layanan->image = $imagePath;
        $layanan->desc = $request->desc;
        $layanan->created_at = $tanggal;

        $layanan->save();


        alert()->success('Tambah Layanan', 'Sukses');

        return redirect()->route('layanan.admin');

    }

    public function editForm($slug)
    {
        $layanan = Layanan::where('slug',$slug)->first();
        $katlayanan = CategoryLayanan::all();

        return view('admin.editLayanan',compact('layanan','katlayanan'));
    }

    public function updateLayanan(Request $request,$slug)
    {

        $request->validate([
            'name'=>'required|string',
            'price'=>'required|string',
            'category_id'=>'required',
            'image'=>'',
            'desc'=>'required'
        ]);

        $tanggal = Carbon::now();
        $layanan = Layanan::where('slug',$slug)->first();

        if($request->image)
        {

            $imageExtension = $request->image->extension();
            $imageName = 'img_'.time().'.'.$imageExtension;
            $imagePath = $request->image->storeAs('images',$imageName,'public');

            Storage::disk('public')->delete($layanan->image);

            $format_price = preg_replace('/\D/','',$request->price);
            $layanan->name = $request->name;
            $layanan->slug = Str::slug($request->name);
            $layanan->price = $format_price;
            $layanan->category_id = $request->category_id;
            $layanan->image = $imagePath;
            $layanan->desc = $request->desc;
            $layanan->updated_at = $tanggal;

            $layanan->save();

        }else{

            $format_price = preg_replace('/\D/','',$request->price);
            $layanan->name = $request->name;
            $layanan->slug = Str::slug($request->name);
            $layanan->price = $format_price;
            $layanan->category_id = $request->category_id;
            $layanan->desc = $request->desc;
            $layanan->updated_at = $tanggal;

            $layanan->save();
        }

        alert()->success('Ubah Layanan', 'Sukses');

        return redirect()->route('layanan.admin');
    }

    public function hapusLayanan($slug)
    {
        $layanan = Layanan::where('slug',$slug)->first();
        Storage::disk('public')->delete($layanan->image);

        Layanan::where('slug',$slug)->delete();

        alert()->error('Hapus Layanan', 'Sukses');

        return redirect()->route('layanan.admin');
    }
}

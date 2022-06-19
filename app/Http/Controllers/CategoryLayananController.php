<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryLayanan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class CategoryLayananController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $katlayanan = CategoryLayanan::paginate(5);
        return view('admin.categorylayanan',compact('katlayanan'));
    }

    public function tambahCategoryLayanan(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image'=>'required|image|mimes:jpeg,png,jpg|max:1024',
        ]);

        $imageExtension = $request->image->extension();
        $imageName = 'img_'.time().'.'.$imageExtension;
        $imagePath = $request->image->storeAs('images',$imageName,'public');

        $katlayanan = new CategoryLayanan();
        $katlayanan->name = $request->name;
        $katlayanan->slug = Str::slug($request->name);
        $katlayanan->image = $imagePath;
        $katlayanan->save();

        alert()->success('Tambah Kategori', 'Sukses');

        return redirect()->route('tampilkategorilayanan.admin');
    }

    public function editFormLayanan($slug)
    {
        $katlayanan = CategoryLayanan::where('slug',$slug)->first();

        return view('admin.editCategoryLayanan',compact('katlayanan'));
    }

    public function updateCategoryLayanan(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $katlayanan = CategoryLayanan::where('slug',$slug)->first();

        if($request->image)
        {

            $imageExtension = $request->image->extension();
            $imageName = 'img_'.time().'.'.$imageExtension;
            $imagePath = $request->image->storeAs('images',$imageName,'public');

            Storage::disk('public')->delete($katlayanan->image);

            $katlayanan->name = $request->name;
            $katlayanan->slug = Str::slug($request->name);
            $katlayanan->image = $imagePath;

            $katlayanan->save();

        }else{

            $katlayanan->name = $request->name;
            $katlayanan->slug = Str::slug($request->name);

            $katlayanan->save();
        }


        alert()->success('Ubah Kategori', 'Sukses');

        return redirect()->route('tampilkategorilayanan.admin');
    }

    public function hapusCategoryLayanan($slug)
    {
        $katlayanan = CategoryLayanan::where('slug',$slug)->first();
        Storage::disk('public')->delete($katlayanan->image);

        CategoryLayanan::where('slug',$slug)->delete();

        alert()->error('Hapus Kategori', 'Sukses');

        return redirect()->route('tampilkategorilayanan.admin');
    }

}

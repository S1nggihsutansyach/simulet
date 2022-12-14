@extends('layouts.app2')

@section('title','Ubah Layanan')

@section('content')

<div class="card">
    <div class="card-header">
        Ubah Layanan
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                <form action="{{ route('updatelayanan.admin',['slug'=>$layanan->slug]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <img src="{{ url('/storage/'.$layanan->image) }}" style="width: 100%" alt="">
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="customFile">
                        <label class="custom-file-label" for="customFile">Pilih Foto</label>
                      </div>
            </div>
            <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" name="name" class="form-control" id="" aria-describedby="" value="{{ $layanan->name }}"
                        placeholder="Nama Layanan">
                </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Kategori Layanan</label>
                        <select class="form-control" name="category_id" id="">
                          <option selected>Pilih Kategori Layanan</option>
                            @foreach ($katlayanan as $katlayanan)
                            <option value="{{ $katlayanan->id }}">{{ $katlayanan->name }}</option>
                            @endforeach
                        </select>
                      </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Harga</label>
                    <input type="text" name="price" class="form-control" id="rupiah2" aria-describedby=""
                        value="Rp. {{ number_format($layanan->price,0,'.','.') }}" placeholder="Rp.">
                </div>

                {{-- <div class="form-group">
                    <label for="exampleInputEmail1">Stok</label>
                    <input type="number" name="quantity" class="form-control" id="" aria-describedby=""
                        value="{{ $produk->quantity }}" placeholder="Jumlah Produk">
                </div> --}}

                <div class="form-group">
                    <label for="exampleInputEmail1">Deskripsi</label>
                    <textarea type="" name="desc" class="form-control" rows="5"
                        aria-describedby="">{{ $layanan->desc }}</textarea>
                </div>
            </div>
        </div>


        <button type="submit" class="btn btn-primary w-100 mt-3">Simpan</button>
        </form>

    </div>
</div>
@endsection

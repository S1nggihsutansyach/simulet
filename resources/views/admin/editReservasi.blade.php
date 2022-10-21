@extends('layouts.app2')

@section('title','Ubah Reservasi')

@section('content')

<div class="card">
    <div class="card-header">
        Ubah Reservasi
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                <form action="{{ route('updatereservasi.admin',['id'=>$reservasi->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
            </div>
            <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" id="" aria-describedby="" value="{{ $reservasi->tanggal }}"
                        placeholder="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Pelanggan</label>
                    <input type="text" name="nama_pelanggan" class="form-control" id="" aria-describedby="" value="{{ $reservasi->nama_pelanggan }}"
                        placeholder="Nama reservasi">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Reservasi</label>
                    <input type="text" name="nama_resevasi" class="form-control" id="" aria-describedby="" value="{{ $reservasi->nama_resevasi }}"
                        placeholder="Nama reservasi">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Total</label>
                    <input type="text" name="total" class="form-control" aria-describedby=""
                        value="{{ $reservasi->total }}" placeholder="Rp.">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('tampilreservasi.admin') }}" class="btn btn-primary" role="button">Kembali</a>        
    </form>
    </div>
</div>
@endsection

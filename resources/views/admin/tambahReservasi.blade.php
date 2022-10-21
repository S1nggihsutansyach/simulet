@extends('layouts.app2')

@section('title','Tambah Reservasi')

@section('content')

<div class="card">
    <div class="card-header">
        Tambah Reservasi
    </div>
    <div class="card-body">
        <form action="{{ route('tambahreservasi.admin') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" id="" aria-describedby="" placeholder="Tanggal Reservasi">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Pelanggan</label>
                        <input type="text" name="nama_pelanggan" class="form-control" id="" value="{{ old('nama_pelanggan') }}" aria-describedby="" placeholder="Nama Pelanggan">
                      </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Layanan</label>
                        <input type="text" name="nama_resevasi" class="form-control" id="" value="{{ old('nama_resevasi') }}" aria-describedby="" placeholder="Nama Reservasi">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Total</label>
                        <input type="text" name="total" class="form-control" value="{{ old('total') }}" id="" aria-describedby="" placeholder="Rp.">
                    </div>
                </div>
            </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="{{ route('tampilreservasi.admin') }}" class="btn btn-primary" role="button">Kembali</a>

          </form>

    </div>
</div>
@endsection

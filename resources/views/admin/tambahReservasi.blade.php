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
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" name="nama" class="form-control" id="" value="{{ old('nama') }}" aria-describedby="" placeholder="Nama Pelanggan">
                      </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Layanan</label>
                        <input type="text" name="nama_layanan" class="form-control" id="" value="{{ old('nama_layanan') }}" aria-describedby="" placeholder="Nama Reservasi">
                      </div>
                </div>
            </div>
                <div class="col">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" id="" aria-describedby="" placeholder="Tanggal Reservasi">
                      </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">Total</label>
                    <input type="number" name="total" class="form-control" value="{{ old('total') }}" id="" aria-describedby="" placeholder="Total Reservasi">
                  </div>
            </div>
        </div>
            <button type="submit" class="btn btn-primary w-100 mt-3">Tambah</button>
          </form>

    </div>
</div>
@endsection

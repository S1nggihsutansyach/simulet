@extends('layouts.app2')
@section('title','Detail Pemesanan')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h2 class="mb-5 float-right">UlaPetshop.</h2>
                    <h6>Nama : {{ $reservasi->nama_pelanggan }}</h6>
                    <h6>Nama Reservasi : {{ $reservasi->nama_resevasi }}</h6>
                    <h6>Total : Rp. {{ number_format($reservasi->total) }}</h6>
                    <h6>Tanggal/Waktu : {{ $reservasi->tanggal }}</h6>
                    <a href="{{ route('tampilreservasi.admin') }}" class="btn btn-primary" role="button">Kembali</a>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

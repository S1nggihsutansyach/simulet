@extends('layouts.app2')

@section('title','Dashboard Admin')

@section('content')

<div class="row">
    <div class="col-4 col-sm-4 col-md-4 col-lg-4">
        <div class="card" style="height: 10rem;">
            <div class="card-header">
                <i class="fa fa-user"></i>
                Pelanggan
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <h4>{{ $usercount }}</h4>
                </blockquote>
            </div>
        </div>
    </div>
    <div class="col-4 col-sm-4 col-md-4 col-lg-4">
        <div class="card" style="height: 10rem;">
            <div class="card-header">
                <i class="fa fa-cog"></i>
                Produk
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <h4>{{ $produkcount }}</h4>
                </blockquote>
            </div>
        </div>
    </div>
    <div class="col-4 col-sm-4 col-md-4 col-lg-4">
        <div class="card" style="height: 10rem;">
            <div class="card-header">
                <i class="fas fa-chart-line "></i>
                Pendapatan
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <h4>Rp. {{ number_format($order_total,0,",",".") }}</h4>
                </blockquote>
            </div>
        </div>
    </div>
</div>

<div class="wrapper-order mt-5">
    <div class="card">
        <div class="card-body">
            <h4>Selamat datang <strong>{{ Auth::user()->name }}</strong></h4>
            <h6>Disini Anda dapat mengelola segala kebutuhan toko Ula Petshop.</h6>
        </div>
    </div>
</div>

@endsection

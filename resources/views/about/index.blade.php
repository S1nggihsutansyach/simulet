@extends('layouts.app')
@section('title','Tentang Kami')
@section('content')

<div class="container">
<h2 class="mt-5 font-weight-bold text-center">Tentang Kami</h2>
    <div class="content-layanan mt-5">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fa fa-7x fa-shipping-fast p-3"></i>
                        <h5 class="card-title font-weight-bold mt-2">Bebas Ongkir</h5>

                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 col-lg-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fa fa-7x fa-check p-3"></i>
                        <h5 class="card-title font-weight-bold mt-2">Produk Original</h5>

                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 col-lg-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fa fa-7x fa-user-shield p-3"></i>
                        <h5 class="card-title font-weight-bold mt-2">24/7 Keluhan Layanan</h5>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection

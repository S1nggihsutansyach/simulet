@extends('layouts.app')
@section('title','Ula Petshop')
@section('content')


<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-14 col-lg-6">
                <div class="wrapper-top mt-5">
                    <h2 class="font-weight-bold">SELAMAT DATANG DI ULAPETSHOP.</h2>
                    <h5>Belanja Kebutuhan Hewan Lebih Murah dan Mudah</h5>
                    <a name="" id="" class="btn btn-success btn-top mt-3"
                        href="{{ route('produk.index') }}" role="button">Belanja Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    {{-- <h2 class="mt-5 font-weight-bold text-center">Kategori</h2>
    <div class="row text-center">
        @foreach($kategori as $kategori)
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 mt-4">
                <a href="{{ route('produkkategori.index',['slug'=>$kategori->slug]) }}">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ url('/storage/'.$kategori->image) }}"
                                class="card-img-top" alt="...">
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div> --}}

    <h2 class="mt-5 font-weight-bold text-center">Produk Kami</h2>
    <div class="content-produk-terbaru">
        <div class="row">
            @foreach($produk as $produk)
                <div class="col-6 col-lg-3 col-md-6 col-sm-6 mt-5 card-product">
                    <a
                        href="{{ route('detailproduk.index',['slug'=>$produk->slug]) }}">
                        <div class="card" style="">
                            <div class="card-body card-img p-2">
                                <img src="{{ url('/storage/'.$produk->image) }}"
                                    class="card-img-top img-responsive" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><strong>{{ $produk->name }}</strong></h5>

                                <p class="card-text">Rp.
                                    {{ number_format($produk->price,0,",",".") }}
                                </p>
                                <p class="card-text">{{ $produk->category['name'] }}</p>
                                {{-- <p class="card-text">{{ $produk->created_at->diffForHumans() }}</p> --}}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection

@extends('layouts.app')
@section('title','Layanan')

@section('content')

<div class="container mt-5">
    <div class="wrapper-produk">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-3">
                <h3 class="font-weight-bold">Kategori Layanan</h3>
                <div class="card mt-5">
                    @php
                        $all = App\Layanan::all()->count();
                    @endphp
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a class="{{ set_active('layanan.index') }}" href="{{ route('layanan.index') }}">Semua Layanan</a>
                            <span class="badge badge-dark float-right">{{ $all }}</span>
                        </li>
                        @php
                        $all = App\CategoryLayanan::all()->count();
                    @endphp
                        @foreach($katlayanan as $kat)
                            <li class="list-group-item">
                                <a class="{{ set_active('layanankategori.index*') }}"
                                    href="#">{{ $kat->name }}</a>
                                <span class="badge badge-dark float-right">{{ $kat->layanan_count }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-9 col-lg-9">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                        <h3 class="font-weight-bold">Layanan</h3>

                    </div>
                </div>
                <div class="row mt-5">
                    @foreach($layanan as $no => $data)
                        <div class="col-12 col-sm-6 col-lg-4 col-md-4 mb-4 card-product">
                            
                                <div class="card">
                                    <img src="{{ url('/storage/'.$data->image) }}"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">

                                            <h5 class="card-title"><strong>{{ $data->name }}</strong></h5>

                                        <p class="card-text">Rp.
                                            {{ number_format($data->price,0,",",".") }}
                                        </p>
                                        {{-- <p class="card-text">{{ $data->category_id }}</p> --}}
                                        {{-- <p class="card-text">{{ $data->created_at->diffForHumans() }}</p> --}}
                                        <a href="https://wa.me/send?phone=6282127476721&text=Saya%20Mau%20Reservasi{{$data->name}}" class="btn btn-success w-100 mt-2" target="_blank">
                                           <i class="fab fa-whatsapp"></i> Reservasi Sekarang</a>
                                    </div>
                                </div>
                            
                        </div>
                    @endforeach
                </div>
                <div class="mt-3">
                    {{ $layanan->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

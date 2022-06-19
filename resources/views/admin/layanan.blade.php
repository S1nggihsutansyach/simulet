@extends('layouts.app2')

@section('title','Layanan Dashboard')

@section('content')

<div class="card h-100">
    <div class="card-header">
        Data Layanan
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                <a name="" id="" class="btn btn-primary mb-3" href="{{ route('tampiltambahlayanan.admin') }}" role="button">Tambah
                    Layanan</a>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                <form action="{{ route('carilayanan.admin') }}" method="get">
                    <div class="input-group">
                        <input type="text" name="cari" class="form-control" placeholder="Cari Layanan..." id="">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
           <div class="col-6 col-sm-6 col-md-4 col-lg-4">
            <table class="table table-sm table-borderless">
                <tbody>
                    <tr>
                        <th scope="row">Halaman</th>
                        <td>:</td>
                        <td>{{ $layanan->currentPage() }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Jumlah Layanan</th>
                        <td>:</td>
                        <td>{{ $layanan->total() }}</td>
                    </tr>
                </tbody>
            </table>
           </div>
        </div>

        <table class="table">
            <thead class="thead-light text-center">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama Layanan</th>
                    {{-- <th scope="col">Stok</th> --}}
                    <th scope="col">Kategori</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($layanan as $no => $data)
                <tr>
                    <th scope="row">{{ $layanan->firstItem()+$no }}</th>
                    <td>
                        <a href="{{ route('detaillayanan.admin',['slug'=>$data->slug]) }}">
                            <img style="width: 70px" src="{{ url('/storage/'.$data->image) }}" alt="">
                        </a>
                    </td>
                    <td>{{ $data->name }}</td>
                    {{-- <td>
                        @if ($data->quantity == 0)
                            <span class="badge badge-danger">Habis</span>
                        @else
                            {{ $data->quantity }}
                        @endif
                    </td> --}}
                    <td>{{ $data->category_id }}</td>
                    <td>Rp. {{ number_format($data->price,0,",",".") }}</td>
                    <td>
                        <a name="" id="" class="btn btn-sm btn-primary" href="{{ route('detaillayanan.admin',['slug'=>$data->slug]) }}" role="button"><i class="fas fa-eye"></i></a>
                        <a name="" id="" class="btn btn-sm btn-warning" href="{{ route('tampilubahlayanan.admin',['slug'=>$data->slug]) }}" role="button"><i class="fa fa-pen"></i></a>
                        <form class="d-inline" action="{{ route('hapuslayanan.admin',['slug'=>$data->slug]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" id="" class="btn btn-sm btn-danger"  role="button"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $layanan->onEachSide(2)->links() }}
    </div>
</div>

@endsection

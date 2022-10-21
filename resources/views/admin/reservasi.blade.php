@extends('layouts.app2')

@section('title','Kelola Reservasi')

@section('content')

<div class="card h-100">
    <div class="card-header">
        Data Reservasi
    </div>
    <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                    <a name="" id="" class="btn btn-primary mb-3" href="{{ route('tambahreservasi.admin') }}" role="button">Tambah
                        Reservasi</a>
                </div>
            </div>
        <table class="table">
            <thead class="thead-light text-center">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal/Waktu</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">Nama Reservasi</th>
                    <th scope="col">Total</th>
                    <th scope="col">Detail</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($reservasi as $no => $data)
                <tr>
                    <th scope="row">{{ $reservasi->firstItem()+$no }}</th>
                    <td>{{ $data->tanggal }}</td>
                    <td>{{ $data->nama_pelanggan }}</td>
                    <td>{{ $data->nama_resevasi }}</td>
                    <td>Rp.{{ number_format($data->total) }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('detailreservasi.admin',['id'=>$data->id]) }}" role="button"><i class="fas fa-eye"></i></a>
                        <a class="btn btn-sm btn-warning" href="{{ route('updatereservasi.admin',['id'=>$data->id]) }}" role="button"><i class="fas fa-pen"></i></a>
                        <a class="btn btn-sm btn-danger" href="{{ route('hapusreservasi.admin',['id'=>$data->id]) }}" role="button"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $reservasi->onEachSide(2)->links() }}
    </div>
</div>

@endsection

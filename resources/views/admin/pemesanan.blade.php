@extends('layouts.app2')

@section('title','Pemesanan')

@section('content')

<div class="card h-100">
    <div class="card-header">
        Data Pemesanan
    </div>
    <div class="card-body">
        <table class="table">
            <thead class="thead-light text-center">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal/Waktu</th>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Total</th>
                    <th scope="col">Bukti Bayar</th>
                    <th scope="col">Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order as $no => $data)
                <tr>
                    <th scope="row">{{ $order->firstItem()+$no }}</th>
                    <td>{{ $data->order_date }}</td>
                    <td>{{ $data->user['name'] }}</td>
                    <td>{{ $data->status }}
                    </td>

                    <td>Rp. {{ number_format($data->total_price += $data->code,0,",",".") }}</td>
                    <td>
                        <img class="fit-image" width="50px" src="{{ asset('bukti_transfer/' .$data->bukti_bayar) }}">
                    </td>
                    <td>
                        <a name="" id="" class="btn btn-primary" href="{{ route('pemesananDetail.admin',['slug'=>$data->slug]) }}" role="button">
                            <i class="fas fa-eye"></i>
                        </a>
                        @if ($data->status == 'Belum Bayar')
                        <a class="btn btn-success" href="{{ route('pemesanan.terima',['slug'=>$data->slug]) }}" role="button">
                            <i class="fas fa-check"></i>
                        </a>
                        @endif

                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $order->onEachSide(2)->links() }}
    </div>
</div>

@endsection

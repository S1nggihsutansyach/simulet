@extends('layouts.app2')

@section('title','Laporan Pemesanan')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h4 class="card-title">Laporan Pemesanan</h4>
        <button class="btn btn-success" onclick="window.print()" value="Print PDF"> 
            <i class="fas fa-print"></i> </button>
    </div>
    <div class="card-body">
        <form action="" id="form-bulan" method="get">
            <div class="form-group">
                <label>Filter Bulan</label>
                <input type="hidden" name="export" class="is-export" disabled="true" value="true" />
                <input type="month" name="bulan" class="form-control select-bulan"
                value="{{ Request::get('bulan') ? Request::get('bulan') : date('Y-m') }}">
            </div>
        </form>
        <div class="table-responsive">
            <table  class="table" id="laporan">
                <thead>
                    <tr>
                        <th >No</th>
                        <th >Tanggal / Waktu</th>
                        <th >Pelanggan</th>
                        <th >Status</th>
                        <th >Total</th>
                        <th >Bukti Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($report as $index => $row)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $row->order_date}}</td>
                            <td>{{ $row->user['name']}}</td>
                            <td>{{ $row->status }}</td>
                            <td>{{ $row->total_price }}</td>
                            <td>
                                <img class="fit-image" width="50px" src="{{ asset('bukti_transfer/' .$row->bukti_bayar) }}">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    window.onclick = window.print;
</script>
<script type="text/javascript">
    $('.select-bulan').on('change', function() {
        $('.is-export').attr('disabled', true)
        $('#form-bulan').submit()
    })
    $('.btn-export').on('click', function() {
        $('.is-export').attr('disabled', false)
        $('#form-bulan').submit()
    })

    $(document).ready(function() {
        $('#report').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
    
    let print = (doc) =>{
        let objFra = document.createElement('iframe');
        objFra.style.visibility = 'hidden';
        objFra.src = doc;

        document.body.appendChild(objFra);

        objFra.contentWindow.focus();
        objFra.contentWindow.print();
    }
</script>
@endsection
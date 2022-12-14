<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pemesanan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body onload="window.print()">
    <div class="card-body">
        <div class="card-header">
            <h3 style="text-align : center"> Laporan Data Pemesanan Produk</h3>
        </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover" id="report" width="100%" cellspacing="0">
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
</body>

</html>
@section('script')
<script>
        window.onload = window.print;
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
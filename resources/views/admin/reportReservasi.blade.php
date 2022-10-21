<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Reservasi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body onload="window.print()">
    <div class="card-body">
        <div class="card-header">
            <h3 style="text-align : center"> Laporan Data Reservasi</h3>
            {{-- <button class="btn btn-success" onclick="print('../Laporan.pdf')" value="Print PDF"> 
                <i class="fas fa-print"></i> Print</button> --}}
        </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover" id="report" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal/Waktu</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">Nama Reservasi</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservasi as $no => $data)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $data->tanggal }}</td>
                    <td>{{ $data->nama_pelanggan }}</td>
                    <td>{{ $data->nama_resevasi }}</td>
                    <td>Rp.{{ number_format($data->total) }}</td>

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
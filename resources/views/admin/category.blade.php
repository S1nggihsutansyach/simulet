@extends('layouts.app2')

@section('title','Kategori Produk')

@section('content')

<div class="card">
    <div class="card-header">
        Data Kategori Produk
    </div>
    <div class="card-body">
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalBuktiBayar">Tambah Kategori</a>
        <div class="modal fade" id="modalBuktiBayar" tabindex="-1" aria-labelledby="modalBuktiBayar" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <form action="{{ route('tambahkategori.admin') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Kategori</label>
                                            <input type="text" name="name" class="form-control" id="" aria-describedby=""  placeholder="Kategori">
                                        </div>

                                    </div>
                                    <div class="col">
                                        <label for="exampleInputEmail1">Gambar Kategori</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image" id="customFile">
                                            <label class="custom-file-label" for="customFile">Pilih Gambar</label>
                                        </div>

                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 mt-3">Simpan</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="table mt-3">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategori as $no => $data)
                <tr>
                    <th scope="row">{{ $kategori->firstItem() + $no }}</th>
                    <td><img style="width: 70px" src="{{ url('/storage/'.$data->image) }}" alt=""></td>
                    <td>{{ $data->name }}</td>
                    <td>
                        <a name="" id="" class="btn btn-sm btn-warning" href="{{ route('tampilubahkategori.admin',['slug'=>$data->slug]) }}" role="button"><i class="fa fa-pen"></i></a>
                        <form class="d-inline" action="{{ route('hapuskategori.admin',['slug'=>$data->slug]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button  type="submit" class="btn btn-sm btn-danger" role="button"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $kategori->onEachSide(2)->links() }}
    </div>
</div>


@endsection

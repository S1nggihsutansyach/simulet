@extends('layouts.app2')

@section('title','Detail Pelanggan')

@section('content')

<div class="card h-100">
    <div class="card-header">
        Detail Pelanggan
    </div>
    <div class="card-body">

                <table class="table mt-2">
                    <tbody>
                        <tr>
                            <th scope="row">Nama</th>
                            <td>:</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td>:</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Alamat</th>
                            <td>:</td>
                            <td>{{ $user->address }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Kota</th>
                            <td>:</td>
                            <td>{{ $user->city }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Kode Pos</th>
                            <td>:</td>
                            <td>{{ $user->zipcode }}</td>
                        </tr>
                    </tbody>
                </table>


               <a class="btn btn-primary" href="{{route('user.admin')}}">Kembali</a>
            </div>


    </div>
</div>

@endsection

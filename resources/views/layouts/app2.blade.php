<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/style/stylesheet.css') }}" rel="stylesheet">

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h3 class="d-inline">UlaPetshop.</h3>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('login') }}">{{ __('Masuk') }}</a>
                            </li>
                            @if(Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ route('register') }}">{{ __('Daftar') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-user"></i>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Keluar') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}"
                                        method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="card" style="width: 12rem;">
                        {{-- <div class="card-header">
                            <i class="fas fa-cogs"></i>
                            Kelola Toko
                        </div> --}}
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <i class="fa fa-home"></i>
                                <a class="{{ set_active('dashboard.admin') }}" href="{{ route('dashboard.admin') }}">Dashboard</a>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-user"></i>
                                <a class="{{ set_active('user.admin') }}" href="{{ route('user.admin') }}">Kelola Pelanggan</a>
                            </li>
                            <ul></ul>
                            <li class="list-group-item">
                                <i class="fa fa-cogs"></i>
                                <a class="{{ set_active('tampilkategori.admin') }}" href="{{ route('tampilkategori.admin') }}">Kelola Kategori Produk</a>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-cogs"></i>
                                <a class="{{ set_active('tampilkategorilayanan.admin') }}" href="{{ route('tampilkategorilayanan.admin') }}">Kelola Kategori Layanan</a>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-cog"></i>
                                <a class="{{ set_active('produk.admin') }}" href="{{ route('produk.admin') }}">Kelola Produk</a>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-cog"></i>
                                <a class="{{ set_active('layanan.admin') }}" href="{{ route('layanan.admin') }}">Kelola Layanan</a>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-comments-dollar"></i>
                                <a class="{{ set_active('pemesanan.admin') }}" href="{{ route('pemesanan.admin') }}">Kelola Pemesanan</a>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-comments-dollar"></i>
                                <a class="{{ set_active('tampilreservasi.admin') }}" href="{{ route('tampilreservasi.admin') }}">Kelola Reservasi</a>
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-file-invoice"></i>
                                <a class="{{ set_active('report') }}" href="{{ route('pemesanan.report') }}">Laporan Pemesanan</a>
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-file-invoice"></i>
                                <a class="{{ set_active('') }}" href="">Laporan Reservasi</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-9 col-lg-9">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <div class="footer-admin h-100 mt-5">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <i class="fa fa-copyright"></i>
                    <h6 class="d-inline">Ula Petshop</h6>
                    <h6 class="d-inline">2022</h6>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
</body>


<script>
    $('#summernote').summernote({
        placeholder: 'Deskripsi Produk',
        tabsize: 2,
        height: 200,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });

</script>

<script>
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

</script>

<script>
    var rupiah2 = document.getElementById("rupiah2");
    rupiah2.addEventListener("keyup", function (e) {
        rupiah2.value = convertRupiah(this.value, "Rp. ");
    });
    rupiah2.addEventListener('keydown', function (event) {
        return isNumberKey(event);
    });

    function convertRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? prefix + rupiah : "";
    }

    function isNumberKey(evt) {
        key = evt.which || evt.keyCode;
        if (key != 188 // Comma
            &&
            key != 8 // Backspace
            &&
            key != 17 && key != 86 & key != 67 // Ctrl c, ctrl v
            &&
            (key < 48 || key > 57) // Non digit
        ) {
            evt.preventDefault();
            return;
        }
    }

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
</script>


</html>

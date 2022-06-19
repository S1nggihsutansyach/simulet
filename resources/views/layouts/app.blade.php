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


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/style/stylesheet.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" />
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home.index') }}">
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
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                            <form action="{{ route('cariproduk.index') }}" method="get">
                                <div class="input-group">
                                    <input type="text" name="cari" class="form-control" placeholder="Cari Produk..." id="">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                            <li class="nav-item">
                                <a class="nav-link {{ set_active('home.index') }}"
                                    href="{{ route('home.index') }}">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ set_active('produk.index') }}"
                                    href="{{ route('produk.index') }}">Produk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ set_active('layanan.index') }}"
                                    href="{{ route('layanan.index') }}">Layanan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ set_active('about.index') }}"
                                href="{{ route('about.index') }}">Tentang Kami</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ set_active('login') }}"
                                    href="{{ route('login') }}">{{ __('Masuk') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ set_active('home.index') }}"
                                    href="{{ route('keranjang.index') }}">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="badge badge-danger">0</span>
                                </a>
                            </li>
                        @else
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                            <form action="{{ route('cariproduk.index') }}" method="get">
                                <div class="input-group">
                                    <input type="text" name="cari" class="form-control" placeholder="Cari Produk atau Layanan..." id="">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                            <li class="nav-item">
                                <a class="nav-link {{ set_active('home.index') }}"
                                    href="{{ route('home.index') }}">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ set_active('produk.index') }}"
                                    href="{{ route('produk.index') }}">Produk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ set_active('layanan.index') }}"
                                    href="{{ route('layanan.index') }}">Layanan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link{{ set_active('about.index') }}"
                                href="{{ route('about.index') }}">Tentang Kami</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown"
                                    class="nav-link dropdown-toggle {{ set_active('profile.index') }}"
                                    href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" v-pre>
                                    Profil
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @role('user')
                                        <a class="dropdown-item" href="{{ route('profile.index') }}">
                                            {{ __('Ubah Profil') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('history.index') }}">
                                            {{ __('Riwayat Belanja') }}
                                        </a>
                                    @endrole

                                    @role('admin')
                                        <a class="dropdown-item"
                                            href="{{ route('dashboard.admin') }}">
                                            {{ __('Dashboard') }}
                                        </a>
                                    @endrole

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
                            @role('user')
                                @php

                                    $order =
                                    App\Order::where('user_id',Auth::user()->id)->where('status','=','keranjang')->first();

                                    if(!empty($order))
                                    {
                                    $notif = App\Order_Detail::where('order_id',$order->id)->count();
                                    }
                                @endphp

                                <li class="nav-item">
                                    <a class="nav-link {{ set_active('keranjang.index') }}"
                                        href="{{ route('keranjang.index') }}">
                                        <i class="fa fa-shopping-cart"></i>
                                        @if(!empty($notif))
                                            <span class="badge badge-danger">{{ $notif }}</span>
                                        @else
                                            <span class="badge badge-danger">0</span>
                                        @endif
                                    </a>
                                </li>
                            @endrole
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main style="padding-top: 70px">
            @yield('content')
        </main>

        <footer class="bg-white p-3 mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-3 col-lg-3 mt-5">
                        <div class="footer-wrapper">
                            <a class="navbar-brand" href="{{ route('home.index') }}">
                                <h3 class="font-weight-bold">UlaPetshop.</h3>
                            </a>
                            
                            <p><i class="fa fa-copyright"></i>Ula Petshop 2022</p>
                            <i class="fab fa-facebook fa-lg"></i>
                            <i class="fab fa-instagram fa-lg"></i>
                            <a href="https://wa.me/send?phone=6289510170840&text=Saya%20Mau%20Reservasi%20Sekarang">  
                            <i class="fab fa-whatsapp fa-lg"></i>
                        </a>
                        </div>
                    </div>

                    <div class="col-12 col-md-3 col-lg-3 mt-5">
                        <div class="footer-wrapper">
                            <h4>Lokasi Kami</h4>
                            <div class="d-block">
                                <div class="mapouter">
                                    <div class="gmap_canvas"><iframe width="300" height="150" id="gmap_canvas"
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63421.1793769479!2d107.68047462940085!3d-6.543932238277769!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e693d8ad1db552d%3A0xe1e3e8a012e78b29!2sULA%20PETSHOP%20SUBANG!5e0!3m2!1sen!2sus!4v1654360001007!5m2!1sen!2sus"
                                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </footer>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')

</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
    integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
    integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous"></script>


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

<script>
    $(document).ready(function () {
        $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        });
    });

</script>

<script>
    $(document).ready(function () {


                $(window).scroll(function () {
                    var scroll = $(window).scrollTop();

                    //>=, not <=
                    if (scroll >= 60) {
                        //clearHeader, not clearheader - caps H
                        $(".navbar").addClass("bg-white");
                    } else {
                        $(".navbar").removeClass("bg-white");
                    }
                });
            });

</script>

</html>

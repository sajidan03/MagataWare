<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css')}}">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-utama fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{asset('assets/foto/magataa.png')}}" alt="Logo" style="width: 60px; margin-right: 24px;" class="rounded-pill">
                MagataWare
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            @if (!Route::is('admin.login'))
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/administrator">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/administrator/member">Member</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/administrator/kategori">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/administrator/product">Produk</a>
                    </li>
                </ul>
            </div>

            <div class="dropdown text-end d-flex justify-content-end align-items-center gap-3">
                <h5 class="text-white">
                    {{ Auth::user()->name }}
                </h5>
                <a href="#" data-bs-toggle="dropdown">
                    <div class="contaner-fluid bg-dark rounded-pill" style="width: 40px">
                        <i class="fa-solid fa-circle-user" style="font-size: 40px; color: white"></i>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a href="{{ route('info-profil') }}" class="dropdown-item">Profil</a></li>
                    <li><a href="#" class="dropdown-item">Setting</a></li>
                    <li class="d-flex align-items-center p-2">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <a href="/administrator/logout" class="dropdown-item">Logout</a>
                    </li>
                </ul>
            </div>
            @endif

        </div>
        </div>
    </nav>
    @yield('content')
</body>
<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</html>

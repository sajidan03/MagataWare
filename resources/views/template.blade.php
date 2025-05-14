<!DOCTYPE html>
<html lang="en">
<header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css')}}">
</header>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-utama fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset("assets/foto/magataa.png") }}" alt="Logo" style="width: 60px; margin-right: 24px;" class="rounded-pill">
                MagataWare
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/produk">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Help</a>
                    </li>
                </ul>
            </div>

            <form class="d-flex" style="margin-right: 12px">
                <input class="form-control me-2" type="text" placeholder="Search" style="width: 400px;">
                <button class="btn btn-success" type="button">Search</button>
            </form>

            <div class="container" style="width: 40px; margin-right: 12px">
                <a href="/cart">
                    <i class="fa-solid fa-cart-shopping" style="font-size: 24px;color: white;"></i>
                </a>
            </div>

            <div class="dropdown text-end d-flex justify-content-end">
                <a href="#" data-bs-toggle="dropdown">
                    <div class="contaner-fluid bg-dark rounded-pill" style="width: 40px">
                        <i class="fa-solid fa-user-circle" style="font-size: 40px; color: white"></i>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li class="d-flex align-items-center p-2">
                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                        <a class="dropdown-item" href="{{ route('admin.login') }}">Login</a>
                    </li>
                    <li class="d-flex align-items-center p-2">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        <a href="/administrator/logout" class="dropdown-item">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </nav>
    @yield('content')
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>

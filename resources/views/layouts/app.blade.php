<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @if (auth()->user() != null)
        @if (auth()->user()->is_admin == 1)
        Jaket Store | Admin
        @else
        Jaket Store @endif
        @else
        Jaket Store
        @endif
    </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com" rel="stylesheet">
    <link href="https://fonts.gstatic.com" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    </script>
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.js"></script>
    <style>
    .checked {
        color: orange;
    }
    </style>
</head>

<body>
    <div id="app">
        <header class="navbar-light navbar-sticky header-static">
            <nav class="navbar navbar-expand-xl navbar-light bg-white">
                <div class="container-fluid px-3 px-xl-5">
                    <a class="navbar-brand fs-2" href="{{ url('/admin/dashboard') }}">
                        <img src="{{ asset('img/elzanteri.png') }}" class="light-mode-item navbar-brand-item"
                            style="width:3%" alt="">
                        Jaket Store
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <!--
                        ​@if (Auth::check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">List Product </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.produk.index') }}">Daftar Produk</a>
                                <a class="dropdown-item" href="{{ route('admin.produk.create') }}">Tambah</a>
                            </div>
                        </li>
                        @endif
                    -->
                    </div>
                    {{-- <ul class="navbar-nav m-auto">
                    @if (auth()->user() != null)
                    @if (auth()->user()->is_admin == 0)
                    <li class="nav-item">
                        <a href="{{ route('customer.carts.index') }}" class="btn btn-primary btn-block">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>Cart<span
                        class="badge badge-pill badge-danger">{{ count([session('cart')]) }}</span>
                    </a>
                    </li>
                    @endif
                    @endif
                    </ul> --}}

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav navbar-nav-scroll me-auto">
                        {{-- Cart --}}
                        @if (auth()->user() != null)
                        @if (auth()->user()->is_admin == 0)
                        <li class="nav-item mt-auto mx-2">
                            <a href="{{ route('customer.carts.index') }}" class="btn btn-primary btn-block">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>Cart <span
                                    class="badge badge-pill badge-danger">{{ count($cart) }}</span>
                            </a>
                        </li>
                        @endif
                        @endif
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown fs-4">
                            <a id="navbarDropdown" class="btn btn-block dropdown-toggle btn-warning text-dark"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="{{ route('order.index') }}">Pesanan saya</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                                                                                                                                                                                      document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>
    </div>
    <main>
        @yield('content')
    </main>
</body>

</html>
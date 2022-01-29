@extends('layouts.app')

@section('content')
<main>
    <section class="position-relative overflow-hidden pt-5 pt-lg-3">
        <div class="container mt-4">
            <div class="row align-items-center g-5">
                <div class="col-lg-5 col-xl-6 position-relative z-index-1 text-center text-lg-start mb-5 mb-sm-0">
                    <h1 class="mb-3 display-6">Halo {{ auth()->user()->name }},<br>Selamat Datang di Dashboard
                    </h1>
                </div>
                <div class="col-lg-7 col-xl-6 text-center position-relative">
                    <div class="position-relative">
                        <dotlottie-player src="https://assets6.lottiefiles.com/dotlotties/dlf10_q0vtqaxf.lottie"
                            background="transparent" speed="1" style="width: 500px; height: 500px;" loop controls
                            autoplay>
                        </dotlottie-player>
                    </div>
                </div>
            </div>
            <caption class="display-3">Daftar Menu</caption>
            <div class="row mt-2">
                <div class="card py-5 m-2" style="width: 15rem;">
                    <a href="{{ route('admin.produk.index') }}" class="link-dark text-decoration-none">
                        <img src="{{ asset('img/Barcode-bro.svg') }}" alt="">
                        <div class="mt-5">
                            <h3>Managemen Produk</h3>
                        </div>
                    </a>
                </div>

                <div class="card py-5 m-2" style="width: 15rem;">
                    <a href="{{ route('admin.ukuran.index') }}" class="link-dark text-decoration-none">
                        <img src="{{ asset('img/stats.svg') }}" style="width:95%" alt="">
                        <div class="mt-5">
                            <h3>Managemen Ukuran Produk</h3>
                        </div>
                    </a>
                </div>

                <div class="card py-5 m-2" style="width: 15rem;">
                    <a href="{{ route('admin.kategori.index') }}" class="link-dark text-decoration-none">
                        <img src="{{ asset('img/upload.svg') }}" style="width:95%">
                        <div class="mt-5">
                            <h3>Managemen Kategori Produk</h3>
                        </div>
                    </a>
                </div>
                <div class="card py-5 m-2" style="width: 15rem;">
                    <a href="{{ route('admin.admin.index') }}" class="link-dark text-decoration-none">
                        <img src="{{ asset('img/account.svg') }}" style="width:95%">
                        <div class="mt-5">
                            <h3>Managemen Akun Admin</h3>
                        </div>
                    </a>
                </div>
                <div class="card py-5 m-2" style="width: 15rem;">
                    <a href="{{ route('admin.order.index') }}" class="link-dark text-decoration-none">
                        <img src="{{ asset('img/order.svg') }}" style="width:95%">
                        <div class="mt-5">
                            <h3>Managemen Order/Pesanan</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
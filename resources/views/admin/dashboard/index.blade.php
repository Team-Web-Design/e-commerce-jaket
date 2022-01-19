@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-3">Halo {{ auth()->user()->name }},<br>Selamat Datang di Dashboard</h1>
        <caption>Daftar Menu</caption>
        <div class="row mt-2">
            <div class="col-md-4">
                <a href="{{ route('admin.produk.index') }}">
                    <div class="card p-4 h-100 border-0">
                        <h3>Managemen Produk</h3>
                    </div>
                </a>
            </div>

            <div class="col-md-4 h-100">
                <a href="{{ route('admin.ukuran.index') }}">
                    <div class="card p-4 border-0">
                        <h3>Managemen Ukuran Produk</h3>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('admin.kategori.index') }}">
                    <div class="card p-4 border-0">
                        <h3>Managemen Kategori Produk</h3>
                    </div>
                </a>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4 ">
                <a href="{{ route('admin.admin.index') }}">
                    <div class="card p-4 h-100 border-0">
                        <h3>Managemen Akun Admin</h3>
                    </div>
                </a>
            </div>
            <div class="col-md-4 ">
                <a href="#">
                    <div class="card p-4 h-100 border-0">
                        <h3>Managemen Order/Pesanan</h3>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection

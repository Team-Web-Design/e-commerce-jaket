@extends('layouts.app')
@section('content')
<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="text-center text-lg-start">
            <h1 class="h3 text-light mb-0 display-4">Detail Pembayaran</h1>
            <h4 class="h5 text-light mb-0 mt-5">Cek Pembayaranmu Disini</h4>
        </div>
        <div class="mt-5 pt-5">
            <a href="{{ route('customer.produk.index') }}" class="btn btn-outline-warning btn-lg mt-5 px-5">Lanjutkan
                Belanja</a>
        </div>
    </div>
</div>
<div class="container mt-3">
    {{ $error }}
    @if ($error != null)
    <div class="alert alert-danger" role="alert">
        {{ $error }}
    </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('order-detail.store') }}" method="POST">
                @csrf
                {{-- <p>{{ $cart }}</p> --}}
                @foreach ($cart as $item)
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0 float-left">
                        <div class="col-md-4">
                            <img src="{{ route('customer.produk.image', ['imageName' => $item->produk->gambar_1]) }}"
                                class="img-fluid rounded-start" alt="">
                        </div>
                        <div class="col-md-8 float-left">
                            <div class="card-body">
                                <h4 class="card-title">{{ $item->produk->nama_produk }}</h4>
                                <p class="card-text">Jumlah yang dibeli : {{ $item->stok }}</p>
                                <p class="card-text">Harga : Rp. {{ $item->harga }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <p class="mt-3">Total : Rp. {{ $total_harga }}</p>
                <div class="bank">
                    <label for="bank">Pilih Bank : </label>
                    <select name="bank" id="bank">
                        <option value="bca">BCA</option>
                        <option value="mandiri">Mandiri</option>
                    </select>
                </div>

                <div class="address">
                    <label for="address">Pilih Alamat :</label>
                    <div class="float-right">
                        <small>
                            <caption><a href="{{ route('alamat.create') }}">Tambah Alamat Baru</a></caption>
                        </small>
                    </div>
                    <br>
                    <select name="address" id="address">
                        @foreach ($address as $item)
                        <option value="{{ $item->id }}">{{ $item->alamat }}, kecamatan
                            {{ $item->kecamatan }}
                            Kabupaten {{ $item->kabupaten }}, {{ $item->kode_pos }},
                            0{{ $item->nomor_telepon }}
                        </option>
                        @endforeach
                    </select>
                </div>
                {{-- <p>{{ $address }}</p> --}}
                <a href="{{ route('customer.carts.index') }}" class="btn">Batal</a>
                <button type="submit" class="mt-4">Bayar</button>
            </form>
        </div>
    </div>
</div>
@endsection
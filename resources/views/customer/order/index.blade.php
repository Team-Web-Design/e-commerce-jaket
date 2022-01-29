@extends('layouts.app')
@section('content')
<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        @foreach ($order_detail as $item)
        <div class=" text-center text-lg-start">
            <h1 class="h3 text-light mb-3 mt-2">Status Pesanan</h1>
            <div class="mt-5 py-5">
                <small><a href="#" class="text-decoration-none text-light display-6">Pembeli :
                        {{ $item->user->name }}</a></small>
            </div>
        </div>
        <div class="mt-5 pt-5">
            <a href="{{ route('customer.produk.index') }}"
                class="btn btn-outline-warning btn-lg float-right mt-5 px-5">Lanjutkan
                Belanja</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="mt-3 py-5">
        <h4 class="display-5 text-dark">{{ $item->produk->nama_produk }} <a
                class="mx-3 px-3 btn btn-danger opacity-75 text-uppercase text-decoration-none text-light">{{ $item->order->status_pemesanan }}</a>
        </h4>
        <p class="h4">Harga Satuan : <a class="text-success"><small>Rp. </small>{{ $item->harga }}<a></p>
        <caption class="h4">jumlah dibeli : {{ $item->stok }}</caption>

        <hr>
    </div>
    @endforeach
    <p class="h4">Total Pesanan Yang Harus Dibayar : <a class="text-success"><small>Rp.
            </small>{{ $order[0]->total_harga }}</a></p>

    {{-- <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="semua-tab" data-toggle="tab" href="#semua" role="tab" aria-controls="home"
                    aria-selected="true">Semua @if (count($order_detail) != 0)
                        <span class="badge badge-primary">{{ count($order_detail) }}</span>
    @endif</a></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="belum-bayar-tab" data-toggle="tab" href="#belum-bayar" role="tab"
            aria-controls="belum-bayar" aria-selected="false">Belum Bayar @if (count($order_detail) != 0 and
            $item->order->status_pemesanan == 'Belum Dibayar')
            <span class="badge badge-primary">{{ count($order_detail) }}</span>
            @endif</a></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="dikemas-tab" data-toggle="tab" href="#dikemas" role="tab" aria-controls="dikemas"
            aria-selected="false">Dikemas @if (count($order_detail) != 0 and $item->order->status_pemesanan == 'Sedang
            Dikemas')
            <span class="badge badge-primary">{{ count($order_detail) }}</span>
            @endif</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="dikirim-tab" data-toggle="tab" href="#dikirim" role="tab" aria-controls="dikirim"
            aria-selected="false">Dikirim @if (count($order_detail) != 0 and $item->order->status_pemesanan == 'Sedang
            Dikirim')
            <span class="badge badge-primary">{{ count($order_detail) }}</span>
            @endif</a></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="selesai-tab" data-toggle="tab" href="#selesai" role="tab" aria-controls="selesai"
            aria-selected="false">Selesai @if (count($order_detail) != 0 and $item->order->status_pemesanan ==
            'Selesai')
            <span class="badge badge-primary">{{ count($order_detail) }}</span>
            @endif</a></a>
    </li>
    </ul>
    @foreach ($order_detail as $item)
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="semua" role="tabpanel" aria-labelledby="semua-tab">
            <div class="mt-3">
                <h4>{{ $item->produk->nama_produk }}</h4>
                <p>harga Satuan : {{ $item->harga }}</p>
                <caption>jumlah dibeli : {{ $item->stok }}</caption>
                <div class="float-right">
                    <small><a href="#">Pembeli : {{ $item->user->name }}</a></small>
                </div>
                <hr>
            </div>
        </div>
        <div class="tab-pane fade" id="belum-bayar" role="tabpanel" aria-labelledby="belum-bayar-tab">
            @if ($item->order->status_pemesanan === 'Belum Dibayar')
            <div class="mt-3">
                <h4>{{ $item->produk->nama_produk }}</h4>
                <p>harga Satuan : {{ $item->harga }}</p>
                <caption>jumlah dibeli : {{ $item->stok }}</caption>
                <div class="float-right">
                    <small><a href="#">Pembeli : {{ $item->user->name }}</a></small>
                </div>
                <hr>
            </div>
            @endif
        </div>
        <div class="tab-pane fade" id="dikemas" role="tabpanel" aria-labelledby="dikemas-tab">
            @if ($item->order->status_pemesanan === 'Sedang Dikemas')
            <div class="mt-3">
                <h4>{{ $item->produk->nama_produk }}</h4>
                <p>harga Satuan : {{ $item->harga }}</p>
                <caption>jumlah dibeli : {{ $item->stok }}</caption>
                <div class="float-right">
                    <small><a href="#">Pembeli : {{ $item->user->name }}</a></small>
                </div>
                <hr>
            </div>
            @endif
        </div>
        <div class="tab-pane fade" id="dikirim" role="tabpanel" aria-labelledby="dikirim-tab">
            @if ($item->order->status_pemesanan == 'Sedang Dikirim')
            <div class="mt-3">
                <h4>{{ $item->produk->nama_produk }}</h4>
                <p>harga Satuan : {{ $item->harga }}</p>
                <caption>jumlah dibeli : {{ $item->stok }}</caption>
                <div class="float-right">
                    <small><a href="#">Pembeli : {{ $item->user->name }}</a></small>
                </div>
                <hr>
            </div>
            @endif
        </div>
        <div class="tab-pane fade" id="selesai" role="tabpanel" aria-labelledby="selesai-tab">
            @if ($item->order->status_pemesanan == 'Selesai')
            <div class="mt-3">
                <h4>{{ $item->produk->nama_produk }}</h4>
                <p>harga Satuan : {{ $item->harga }}</p>
                <caption>jumlah dibeli : {{ $item->stok }}</caption>
                <div class="float-right">
                    <small><a href="#">Pembeli : {{ $item->user->name }}</a></small>
                </div>
                <hr>
            </div>
            @endif
        </div>
    </div>
    @endforeach
    <p>Total Pesanan Yang Harus Dibayar : Rp. {{ $order[0]->total_harga }}</p> --}}

</div>
@endsection
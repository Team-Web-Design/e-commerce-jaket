@extends('layouts.app')
@section('content')
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
                    <h1>Order Detail</h1>
                    {{-- <p>{{ $cart }}</p> --}}
                    @foreach ($cart as $item)
                        <img src="" alt="">
                        <div class="card p-3">
                            <h4>{{ $item->produk->nama_produk }}</h4>
                            <p>Jumlah yang dibeli : {{ $item->stok }}</p>
                            <p>Harga : Rp. {{ $item->harga }}</p>
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

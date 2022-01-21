@extends('layouts.admin')
@section('content')
    <div class="container">
        <caption><a href="{{ route('admin.produk.index') }}">Kembali</a></caption>
        <br>
        <img src="{{ route('customer.produk.image', ['id' => $product->gambar_1]) }}" class="img-thumbnail w-50">
        <h1>{{ $product->nama_produk }}</h1>
        <p>Jenis Bahan : {{ $product->jenis_bahan }}</p>
    </div>
@endsection

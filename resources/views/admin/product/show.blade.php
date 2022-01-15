@extends('layouts.admin')
@section('content')
    <div class="container">
        <caption><a href="{{ route('admin.produk.index') }}">Kembali</a></caption>
        <h1>{{ $product->nama_produk }}</h1>
    </div>
@endsection

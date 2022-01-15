@extends('layouts.admin')
@section('content')

    <div class="container">
        <caption><a href="{{ route('admin.kategori.index') }}">Kembali</a></caption>
        <h1>Halaman Ubah Data Kategori</h1>
        <hr>
        <form action="{{ route('admin.kategori.update', ['id' => $category->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_kategori">Nama Kategori</label>
                <input type="text" class="form-control" value="{{ $category->nama_kategori }}" name="nama_kategori">
            </div>
            <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
    </div>
@endsection

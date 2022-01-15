@extends('layouts.admin')
@section('content')

    <div class="container">
        <caption><a href="{{ route('admin.kategori.index') }}">Kembali</a></caption>
        <h1>Halaman Tambah Kategori</h1>
        <caption>tambah kategori baru</caption>
        <hr>
        <form action="{{ route('admin.kategori.store') }}" method="POST">
            @csrf
            <div class=" form-group">
                <label for="nama_kategori">Nama Kategori</label>
                <input type="text" class="form-control" name="nama_kategori" id="nama_kategori">
                {{-- tampilkan dropdown semua produk terus ambil id nya --}}

            </div>
            {{-- <div class="form-group">
                <select class="form-select form-control" aria-label="Default select example">
                    <option selected>Pilih Produk</option>
                    @foreach ($product as $item)
                        <option value="1">{{ $item }}</option>
                    @endforeach
                </select>
            </div> --}}
            <button class="btn btn-primary mt-2" type="submit">Tambah</button>
        </form>
    </div>
@endsection

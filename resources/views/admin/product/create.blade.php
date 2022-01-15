@extends('layouts.admin')
@section('content')

    <div class="container">
        <caption><a href="{{ route('admin.produk.index') }}">kembali</a></caption>
        <h1>Halaman Tambah Produk</h1>
        <hr>
        <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" class="form-control" placeholder="contoh : jaket crewneck" name="nama_produk">
                    </div>
                    <div class="form-group">
                        <label for="nama_produk">Jenis Bahan</label>
                        <input type="text" class="form-control" placeholder="contoh : kain katun" name="jenis_bahan">
                    </div>

                    <div class="form-group">
                        <label for="custom_file">Foto Produk 1</label>
                        <input type="file" name="gambar_1" class="form-control" placeholder="Foto 1">
                    </div>
                    <div class="form-group mt-2">
                        <label for="custom_file">Foto Produk 2</label>
                        <input type="file" name="gambar_2" class="form-control" placeholder="Foto 2">
                    </div>
                    <div class="form-group mt-2">
                        <label for="custom_file">Foto Produk 3</label>
                        <input type="file" name="gambar_3" class="form-control" placeholder="Foto 3">
                    </div>
                    <div class="form-group mt-2">
                        <label for="ukuran">Ukuran</label>
                        <select class="custom-select" id="inputGroupSelect01" name="ukuran">
                            <option value="0" selected>pilih ukuran</option>
                            @foreach ($sizes as $item)
                                <option value="{{ $item->id }}" class="border-0 rounded-0">{{ $item->ukuran }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mt-2">
                        <label for="ukuran">Kategori</label>
                        <select class="custom-select" id="inputGroupSelect01" name="kategori">
                            <option value="0" selected>pilih kategori</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}" class="border-0 rounded-0">
                                    {{ $item->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="deskripsi_produk">Deskripsi Produk</label>
                        <textarea name="deskripsi" class="form-control" cols="30" rows="5"
                            placeholder="deskripsi produk"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok Barang</label>
                        <input type="number" name="stok" class="form-control" placeholder="contoh : 10">
                    </div>

                    <div class="form-group">
                        <label for="stok">Harga Barang</label>
                        <input type="number" name="harga" class="form-control" placeholder="contoht : 150000">
                    </div>

                    <button type="submit" class="btn btn-primary float-md-right">Tambah</button>
                </div>
            </div>
        </form>
    </div>
@endsection

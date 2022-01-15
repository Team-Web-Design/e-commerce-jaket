@extends('layouts.admin')
@section('content')

    <div class="container">
        <caption><a href="{{ route('admin.produk.index') }}">kembali</a></caption>
        <h1>Halaman Ubah Data Produk</h1>
        <hr>
        <form action="{{ route('admin.produk.update', ['id' => $product->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" class="form-control" placeholder="contoh : jaket crewneck" name="nama_produk"
                            value="{{ $product->nama_produk }}">
                    </div>
                    <div class="form-group">
                        <label for="nama_produk">Jenis Bahan</label>
                        <input type="text" class="form-control" placeholder="contoh : kain katun" name="jenis_bahan"
                            value="{{ $product->jenis_bahan }} ">
                    </div>

                    <div class="form-group">
                        <label for="custom_file">Foto Produk 1</label>
                        <input type="file" name="gambar_1" class="form-control" placeholder="Foto 1"
                            value="{{ $product->gambar_1 }}">
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
                            <option value="{{ $product->ukuran->id }}" selected> {{ $product->ukuran->ukuran }}
                            </option>
                            @foreach ($sizes as $item)
                                <option value="{{ $item->id }}" class="border-0 rounded-0">{{ $item->ukuran }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mt-2">
                        <label for="ukuran">Kategori</label>
                        <select class="custom-select" id="inputGroupSelect01" name="kategori">
                            <option value="{{ $product->kategori->id }}" selected>
                                {{ $product->kategori->nama_kategori }}
                            </option>
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
                            placeholder="deskripsi produk"> {{ $product->deskripsi }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok Barang</label>
                        <input type="number" name="stok" class="form-control" placeholder="contoh : 10"
                            value="{{ $product->stok }}">
                    </div>

                    <div class="form-group">
                        <label for="stok">Harga Barang</label>
                        <input type="number" name="harga" class="form-control" placeholder="contoh : 150000"
                            value="{{ $product->harga }}">
                    </div>

                    <button type="submit" class="btn btn-primary float-md-right">Ubah</button>
                </div>
            </div>
        </form>
    </div>
@endsection

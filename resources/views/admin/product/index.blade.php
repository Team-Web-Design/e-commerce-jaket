@extends('layouts.admin')
@section('content')
    <div class="container">
        <caption><a href="/admin/dashboard">Dashboard</a></caption>
        <h1>Halaman Managemen Produk</h1>
        <caption>halaman untuk menambahkan produk baru</caption>
        <a href="{{ route('admin.produk.create') }}" class="btn btn-primary float-md-right">Tambah Produk</a>
        <div class="mt-5">
            <table class="table">
                <thead class="fixed table-dark">
                    <tr class="align-middle">
                        <th scope="col">#</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>

                            <td class="w-30">
                                <a
                                    href="{{ route('admin.produk.show', ['id' => $item->id]) }}">{{ $item->nama_produk }}</a>
                            </td>
                            <td class="w-50">{{ $item->deskripsi }}</td>
                            <td>Rp. {{ $item->harga }}</td>
                            <td>{{ $item->stok }}</td>

                            <td>
                                <a href="{{ route('admin.produk.edit', ['id' => $item->id]) }}">Ubah</a>
                                <form action="{{ route('admin.produk.destroy', ['id' => $item->id]) }}" id="form-delete"
                                    class="d-inline ml-2" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="link text-danger border-0">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <hr>
    </div>
@endsection

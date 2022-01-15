@extends('layouts.admin')
@section('content')
    <div class="container">
        <caption><a href="/admin/dashboard">Dashboard</a></caption>
        <h1>Halaman Managemen Kategori</h1>
        <caption>Daftar kategori produk</caption>
        <a href="{{ route('admin.kategori.create') }}" class="btn btn-primary float-md-right">Tambah Kategori</a>
        <div class="mt-5">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>

                            <td>
                                <a
                                    href="{{ route('admin.kategori.show', ['id' => $item->id]) }}">{{ $item->nama_kategori }}</a>
                            </td>
                            <td>
                                <a href="{{ route('admin.kategori.edit', ['id' => $item->id]) }}">Ubah</a>
                                <form action="{{ route('admin.kategori.destroy', ['id' => $item->id]) }}" id="form-delete"
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
    </div>
@endsection

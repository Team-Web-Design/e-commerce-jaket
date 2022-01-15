@extends('layouts.admin')
@section('content')
    <div class="container">
        <caption><a href="/admin/dashboard">Dashboard</a></caption>
        <h1>Halaman Managemen Ukuran Jaket</h1>
        <caption>Daftar ukuran jaket</caption>
        <a href="{{ route('admin.ukuran.create') }}" class="btn btn-primary float-md-right">Tambah Ukuran</a>
        <div class="mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ukuran</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sizes as $item)
                        <tr>
                            <th scope="row"> {{ $item->id }}</th>
                            <td> {{ $item->ukuran }}</td>
                            <td>
                                <a href="{{ route('admin.ukuran.edit', ['id' => $item->id]) }}">Ubah</a>
                                <form action="{{ route('admin.ukuran.destroy', ['id' => $item->id]) }}" id="form-delete"
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

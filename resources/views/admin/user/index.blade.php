@extends('layouts.admin');
@section('content')
    <div class="container">
        <caption><a href="/admin/dashboard">Dashboard</a></caption>
        <h1>Halaman Managemen User Admin</h1>
        <a href="{{ route('admin.admin.create') }}" class="btn btn-primary float-md-right mb-3">Tambah Admin</a>
        <div class="mt-5">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admin as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>
                                <a href="{{ route('admin.admin.show', ['id' => $item->id]) }}">{{ $item->name }}</a>
                            </td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <a href="{{ route('admin.admin.edit', ['id' => $item->id]) }}">Ubah</a>
                                <form action="{{ route('admin.admin.destroy', ['id' => $item->id]) }}" id="form-delete"
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

@extends('layouts.admin')
@section('content')
    <div class="container">
        <caption><a href="{{ route('admin.admin.index') }}">kembali</a></caption>
        <h1>Halaman Tambah Admin</h1>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="mt-3">
                    <form action="{{ route('admin.admin.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

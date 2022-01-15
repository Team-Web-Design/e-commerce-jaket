@extends('layouts.admin')
@section('content')
    <div class="container">
        <caption><a href="{{ route('admin.ukuran.index') }}">Kembali</a></caption>
        <h1>Halaman Tambah Ukuran Jaket</h1>
        <hr>
        <div>
            <form action="{{ route('admin.ukuran.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="ukuran">Ukuran Jaket</label>
                    <input type="text" placeholder="contoh : S" class="form-control" name="ukuran">
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
@endsection

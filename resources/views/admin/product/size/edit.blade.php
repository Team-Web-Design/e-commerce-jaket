@extends('layouts.admin')
@section('content')

    <div class="container">
        <caption><a href="{{ route('admin.ukuran.index') }}">Kembali</a></caption>
        <h1>Halaman Ubah Data Ukuran Jaket</h1>
        <hr>
        <form action="{{ route('admin.ukuran.update', ['id' => $size->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="ukuran">Ukuran</label>
                <input type="text" class="form-control" value="{{ $size->ukuran }}" name="ukuran">
            </div>
            <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
    </div>
@endsection

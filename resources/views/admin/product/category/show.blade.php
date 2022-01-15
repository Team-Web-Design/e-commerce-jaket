@extends('layouts.admin')
@section('content')

    <div class="container">
        <caption><a href="{{ route('admin.kategori.index') }}">kembali</a></caption>
        <h1>{{ $category->nama_kategori }}</h1>
    </div>
@endsection

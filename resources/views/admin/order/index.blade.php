@extends('layouts.admin')
@section('content')
    <div class="container">
        <caption><a href="/admin/dashboard">Dashboard</a></caption>
        <h1>Daftar Order</h1>
        <table class="table">
            <thead>
                {{-- <th>Produk</th> --}}
                <th>Customer</th>
                {{-- <th>Jumlah yang dibeli</th> --}}
                <th>Bank</th>
                <th>Total Harga</th>
                <th>Status Saat ini</th>
                <th colspan="2">Ganti Status</th>
            </thead>
            @foreach ($order as $item)

                <tbody>
                    {{-- <th><a
                            href="{{ route('admin.produk.show', ['id' => $item->produk->id]) }}">{{ $item->produk->nama_produk }}</a>
                    </th> --}}
                    <td>{{ $item->user->name }}</td>
                    {{-- <td>{{ $item->stok }}</td> --}}
                    <td>{{ $item->bank }}</td>
                    <td>Rp. {{ $item->total_harga }}</td>
                    <td>{{ $item->status_pemesanan }}</td>
                    <td>
                        <form action="{{ route('admin.order.update', ['id' => $item->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="status">
                                <option value="Belum Dibayar">Belum Dibayar</option>
                                <option value="Sedang Dikemas">Sedang Diproses</option>
                                <option value="Sedang Dikirim">Sedang Dikirim</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                            <button type="Submit">Update</button>
                        </form>
                    </td>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection

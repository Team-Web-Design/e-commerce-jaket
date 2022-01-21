@extends('layouts.app')
@section('content')
    <div class="container mt-3">
        <h1>Tambah Alamat</h1>
        <form action="{{ route('alamat.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <textarea name="alamat" id="alamat" cols="30" rows="10" placeholder="Alamat" class="form-control"
                    required></textarea>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="validationTooltipUsernamePrepend">+62</span>
                    </div>
                    <input type="text" placeholder="Nomor Telepon" class="form-control" name="nomor_telepon" maxlength="13"
                        minlength="13" required>
                </div>
                <small>contoh : 8xxxxxxxxxx</small>
            </div>
            <div class="input-group">
                <div class="form-group m-2">
                    <input type="text" placeholder="Kode Pos" name="kode_pos" class="form-control" required>
                </div>

                <div class="form-group m-2">
                    <input type="text" placeholder="Kecamatan" name="kecamatan" class="form-control" required>
                </div>

                <div class="form-group m-2">
                    <input type="text" name="kabupaten" placeholder="Kabupaten" class="form-control" required>
                </div>
            </div>
            <a href="{{ route('order-detail.index') }}">Kembali</a>
            <button type="submit" class="ml-2 mt-3">Tambah</button>
        </form>
    </div>
@endsection

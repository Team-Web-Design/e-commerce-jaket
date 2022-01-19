@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <img src="{{ route('customer.produk.image', ['imageName' => $product['gambar_1']]) }}" class="card-img-top"
                alt="...">
            <div class="mt-2 mx-1">
                <img src="{{ route('customer.produk.image', ['imageName' => $product['gambar_2']]) }}"
                    style="width:7.5rem;" class="card-img-top" alt="...">
                <img src="{{ route('customer.produk.image', ['imageName' => $product['gambar_3']]) }}"
                    style="width:7.5rem;" class="card-img-top" alt="...">
            </div>
        </div>

        <div class="col-md-9">
            <h3>
                {{ $product->nama_produk }}
            </h3>
            <h4>
                Rp. {{ $product->harga }},-
            </h4>
            <div class="mt-4">
                <a href="{{ route('customer.carts.add', ['id' => $product['id']]) }}" class="btn btn-primary">Beli</a>
            </div>
            <div class="mt-4">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#deskripsi" role="tab" data-toggle="tab">Deskripsi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#review" role="tab" data-toggle="review">Review</a>
                    </li>
                </ul>

                <!-- Tab Panes -->
                <div class="tab-content mt-2">
                    <div role="tabpanel" class="tab-pane fade in active show" id="deskripsi">
                        {!! $product->deskripsi !!}
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="review">
                        Konten Review
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
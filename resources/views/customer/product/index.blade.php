@extends('layouts.app')

@section('content')
    <div class="container">

        @foreach ($products as $idx => $product)
            @if ($idx == 0 || $idx % 4 == 0)
                <div class="row mt-2">
            @endif

            <div class="mr-2">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="{{ route('customer.produk.image', ['imageName' => $product['gambar_1']]) }}"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('customer.produk.show', ['id' => $product['id']]) }}">
                                {{ $product->nama_produk }}
                            </a>
                        </h5>
                        <p class="card-text">
                            Rp. {{ $product->harga }},-
                        </p>
                        <!--<p class="card-text">
                                {{ $product->deskripsi }}
                            </p>-->
                        <a href="{{ route('customer.carts.add', ['id' => $product['id']]) }}"
                            class="btn btn-primary">Beli</a>
                    </div>
                </div>
            </div>

            @if ($idx > 0 && $idx % 4 == 3)
    </div>
    @endif
    @endforeach
    </div>
@endsection

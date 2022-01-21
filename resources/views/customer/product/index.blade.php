@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="mt-3 float-right">
            <p>Filter</p>
            <select name="order_field" id="order_field">
                <option value="best-seller">Best Seller</option>
                <option value="terbaik">Terbaik</option>
                <option value="termurah">Termurah</option>
                <option value="termahal">Termahal</option>
                <option value="terbaru">Terbaru</option>
            </select>
        </div>

        <div id="product-list">
            @foreach ($products as $idx => $product)
                @if ($idx == 0 || $idx % 4 == 0)
                    <div class="row mt-2">
                @endif

                <div class="mr-2">
                    <form action="{{ route('customer.carts.add', ['id' => $product->id]) }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="card mx-auto" style="width: 18rem;">
                            <img src="{{ route('customer.produk.image', ['imageName' => $product->gambar_1]) }}"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{ route('customer.produk.show', ['id' => $product->id]) }}">
                                        {{ $product->nama_produk }}
                                    </a>
                                </h5>
                                <p class="card-text">
                                    Rp. {{ $product->harga }},-
                                </p>
                                @if ($product->rating == 1 || $product->rating < 2)
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                @elseif($product->rating == 2 || $product->rating < 3)
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                @elseif($product->rating == 3 || $product->rating < 4)
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                @elseif($product->rating == 4 || $product->rating < 5)
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                @else
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                @endif
                                {{-- <p class="card-text">
                        {{ $product->deskripsi }}
                    </p> --}}
                                {{-- <a href="" class="btn btn-primary">Beli</a> --}}
                                <br>
                                <button type="submit">Beli</button>
                            </div>
                        </div>
                    </form>
                </div>

                @if ($idx > 0 && $idx % 4 == 3)
                @endif
            @endforeach
        </div>
    </div>



    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#order_field').change(function() {
                $.ajax({
                    type: 'GET',
                    url: '/customer/produk',
                    data: {
                        order_by: $(this).val()
                    },
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        var products = '';
                        $.each(data, function(idx, product) {
                            if (idx == 0 || idx % 4 == 0) {
                                products += '<div class="row mt-4 mb-3">';
                            }
                            products +=
                                '<div class="col-md-3">' +
                                '<div class="card mx-auto">' +
                                '<img src="/customer/produk/image/' + product.gambar_1 +
                                '"class="card-img-top" alt="...">' +
                                '<div class="card-body">' +
                                '<h5 class="card-title">' +
                                '<a href="/products/' + product.id + '">' + product
                                .nama_produk + '</a>' +
                                '</h5>' +
                                '<p class="card-text"> Rp.' +   
                                product.harga +
                                '</p>' +
                                '<a href="/customer/produk/show/' + product.id +
                                '"class="btn btn-primary">Beli</a>' +
                                '</div>' +
                                '</div>' +
                                '</div>';
                        });
                        $('#product-list').html(products);
                    },
                    error: function(data) {
                        alert('Unable to handle request');
                    }
                })
            });
        });
    </script>
@endsection

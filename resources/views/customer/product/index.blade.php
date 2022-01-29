@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <section class="position-relative overflow-hidden pt-5 pt-lg-3 mb-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-5 col-xl-6 position-relative z-index-1 text-center text-lg-start mb-5 mb-sm-0">
                    <h1 class="mb-0 display-1 fw-bold">
                        Siputih Jacket Elzanteri
                    </h1>
                    <p class="my-4 lead fs-3">
                        Siputih adalah jaket semi parka dengan bahan baby canvas
                    </p>
                    <a class="btn btn-primary px-5 mx-auto btn-lg" href="http://127.0.0.1:8000/customer/produk/2"
                        type="button">Lihat Produk</a>
                </div>
                <div class="col-lg-7 col-xl-6 text-center position-relative">
                    <div class="position-relative">
                        <img src="{{ asset('img/siputih.png') }}" class="w-100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--<div class="mt-3">
        <p>Filter</p>
        <select name="order_field" id="order_field">
            <option value="best-seller">Best Seller</option>
            <option value="terbaik">Terbaik</option>
            <option value="termurah">Termurah</option>
            <option value="termahal">Termahal</option>
            <option value="terbaru">Terbaru</option>
        </select>
    </div>-->
    <div class="container px-5">
        <select name="order_field" id="order_field" class="form-select">
            <option selected>Filter Barang</option>
            <option value="best-seller">Best Seller</option>
            <option value="terbaik">Terbaik</option>
            <option value="termurah">Termurah</option>
            <option value="termahal">Termahal</option>
            <option value="terbaru">Terbaru</option>
        </select>
    </div>
    <!--
    <div class="container">
        <ul class="nav nav-pills nav-pills-bg-soft justify-content-sm-center mb-4 px-3" name="order_field"
            id="order_field" role="tablist">
            <li class="nav-item me-2 me-sm-5"><button class="nav-link mb-2 mb-md-0 active" value="best-seller"></button>
                Best Seller</li>
            <li class="nav-item me-2 me-sm-5"><button class="nav-link mb-2 mb-md-0 active" value="terbaik"></button>
                Terbaik</li>
            <li class="nav-item me-2 me-sm-5"><button class="nav-link mb-2 mb-md-0 active" value="termurah"></button>
                Termurah</li>
            <li class="nav-item me-2 me-sm-5"><button class="nav-link mb-2 mb-md-0 active" value="termahal"></button>
                Termahal</li>
            <li class="nav-item me-2 me-sm-5"><button class="nav-link mb-2 mb-md-0 active" value="terbaru"></button>
                Terbaru</li>
        </ul>
    </div>-->

    <div id="product-list" class="">
        @foreach ($products as $idx => $product)
        @if ($idx == 0 || $idx % 4 == 0)
        <div class="row g-4">
            @endif

            <div class="col-3">
                <form action="{{ route('customer.carts.add', ['id' => $product->id]) }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mt-2">
                        <div class="card pb-5 m-2" style="width: 18rem;">
                            <img src="{{ route('customer.produk.image', ['imageName' => $product->gambar_1]) }}"
                                class="card-img-top" alt="...">
                            <div class="mt-3 mx-2">
                                <h5 class="card-title">
                                    <a href="{{ route('customer.produk.show', ['id' => $product->id]) }}"
                                        class="link-dark text-decoration-none">
                                        {{ $product->nama_produk }}
                                    </a>
                                </h5>
                                <p class="card-text">
                                    Rp. {{ $product->harga }},-
                                </p>
                                @if ($product->rating == 1 || $product->rating < 2) <span
                                    class="fa fa-star checked text-warning">
                                    </span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    @elseif($product->rating == 2 || $product->rating < 3) <span
                                        class="fa fa-star checked text-warning">
                                        </span>
                                        <span class="fa fa-star checked text-warning"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        @elseif($product->rating == 3 || $product->rating < 4) <span
                                            class="fa fa-star checked text-warning"></span>
                                            <span class="fa fa-star checked text-warning"></span>
                                            <span class="fa fa-star checked text-warning"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            @elseif($product->rating == 4 || $product->rating < 5) <span
                                                class="fa fa-star checked text-warning"></span>
                                                <span class="fa fa-star checked text-warning"></span>
                                                <span class="fa fa-star checked text-warning"></span>
                                                <span class="fa fa-star checked text-warning"></span>
                                                <span class="fa fa-star"></span>
                                                @else
                                                <span class="fa fa-star checked text-warning"></span>
                                                <span class="fa fa-star checked text-warning"></span>
                                                <span class="fa fa-star checked text-warning"></span>
                                                <span class="fa fa-star checked text-warning"></span>
                                                <span class="fa fa-star checked text-warning"></span>
                                                @endif
                                                {{-- <p class="card-text">
                        {{ $product->deskripsi }}
                                                </p> --}}
                                                {{-- <a href="" class="btn btn-primary mx-auto">Beli</a> --}}
                                                <br>
                                                <hr>
                                                <button class="btn btn-primary px-5 mx-auto" type="submit">Beli</button>
                            </div>
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
                        products += '<div class="">';
                    }
                    products +=
                        '<div class="row row-cols-1 row-cols-md-2 g-4">' +
                        '<div class="mt-2">' +
                        '<div class="card pb-5 m-2"  style="width: 18rem;">' +
                        '<img src="/customer/produk/image/' + product.gambar_1 +
                        '"class="card-img-top" alt="...">' +
                        '<div class="mt-3 mx-2">' +
                        '<h5 class="card-title">' +
                        '<a href="/products/' + product.id +
                        '" class="link-dark text-decoration-none">' + product
                        .nama_produk + '</a>' +
                        '</h5>' +
                        '<p class="card-text"> Rp.' +
                        product.harga +
                        '</p>' +
                        '</div>' +
                        '<a href="/customer/produk/show/' + product.id +
                        '"class="btn btn-primary px-5 mx-auto">Beli</a>' +
                        '</div>' +
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
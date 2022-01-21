@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-3">
                <img src="{{ route('customer.produk.image', ['imageName' => $product['gambar_1']]) }}"
                    class="card-img-top" alt="...">
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
                <div class="mt-3">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="deskripsi-tab" data-toggle="tab" href="#deskripsi" role="tab"
                                aria-controls="deskripsi" aria-selected="true">Deskripsi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab"
                                aria-controls="review" aria-selected="false">Review</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="deskripsi" role="tabpanel"
                            aria-labelledby="deskripsi-tab">
                            {{ $product->deskripsi }}
                        </div>
                        <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                            <div class="card p-3 mt-4">
                                <h3>Alian Hakim</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur odio quisquam, non
                                    voluptatum dolore tempore tenetur quidem nostrum accusamus! Itaque, laboriosam in!
                                    Reprehenderit omnis fugiat obcaecati debitis sunt ipsa velit?</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

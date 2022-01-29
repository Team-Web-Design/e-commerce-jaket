@extends('layouts.app')
@section('content')
<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="text-center text-lg-start">
            <h1 class="h3 text-light mb-0 display-4">Keranjang Belanjamu</h1>
            <h4 class="h5 text-light mb-0 mt-5">Periksa belanjaanmu disini</h4>
        </div>
        <div class="mt-5 pt-5">
            <a href="{{ route('customer.produk.index') }}" class="btn btn-outline-warning btn-lg mt-5 px-5">Lanjutkan
                Belanja</a>
        </div>
    </div>
</div>
<div class="container">
    <table id="cart" class="table table-hover fs-base mb-2 mt-5">
        <thead>
            <tr>
                <th scope="col" style="width: 50%;">Product</th>
                <th scope="col" style="width: 10%;">Harga</th>
                <th scope="col" style="width: 8%;">Jumlah</th>
                <th scope="col" style="width: 22%;" class="text-center">Subtotal</th>
                <th scope="col" style="width: 10%;">Produk</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0; ?>
            @if ($cart)
            @foreach ($cart as $products => $product)
            {{-- {{ $product }} --}}
            <?php $total += $product['harga'] * $product['stok']; ?>
            <tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-3 hidden-xs"><img
                                src="{{ route('customer.produk.image', ['imageName' => $product->produk->gambar_1]) }}"
                                width="100" height="100" class="img-responsive" /></div>
                        <div class="col-sm-9">
                            <h4 class="nomargin">{{ $product->produk->nama_produk }}</h4>
                        </div>
                    </div>
                </td>
                <td data-th="Harga">Rp. {{ $product['harga'] }}</td>
                <td data-th="Stok">
                    <input type="number" value="{{ $product['stok'] }}" class="form-control stok" />
                </td>
                <td data-th="Subtotal" class="text-center">Rp. {{ $product['harga'] * $product['stok'] }}
                </td>
                <td class="actions" data-th="">
                    <button class="btn btn-info btn-sm update-cart" data-id="{{ $product->id }}">Update</button>
                    <button class="btn btn-danger btn-sm mt-2 remove-from-cart"
                        data-id="{{ $product->id }}">Remove</button>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr class="visible-xs">
                <td class="text-center"><strong>Total {{ $total }}</strong></td>
            </tr>
            <tr>
                <td>
                    <a href="{{ route('customer.produk.index') }}" class="btn btn-warning"><i
                            class="fa fa-angle-left"></i>Lanjutkan
                        Belanja</a>
                    {{-- <form action="{{ route('order-detail.store') }}" method="POST">
                    @csrf
                    <button type="submit">Lanjut Ke Pembayaran</button>
                    </form> --}}
                    <a href="{{ route('order-detail.store') }}" class="btn btn-primary"><i
                            class="fa fa-angle-left"></i>Lanjut ke
                        Pembayaran</a>

                </td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Total Rp. {{ $total }}</strong></td>
            </tr>
        </tfoot>
    </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $(".update-cart").click(function(e) {
        e.preventDefault();
        var ele = $(this);
        console.log(ele);
        $.ajax({
            url: "{{ route('customer.carts.update') }}",
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.attr("data-id"),
                stok: ele.parents("tr").find(".stok").val()
            },
            success: function(response) {
                window.location.reload();
            }
        });
    });

    $(".remove-from-cart").click(function(e) {
        e.preventDefault();

        var ele = $(this);

        if (confirm("Hapus produk dari keranjang ?")) {
            $.ajax({
                url: "{{ route('customer.carts.remove') }}",
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.attr("data-id")
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        }
    });;
});
</script>

@endsection
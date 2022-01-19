@extends('layouts.app')

@section('content')
<div class="container">

    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width: 50%;">Product</th>
                <th style="width: 10%;">Harga</th>
                <th style="width: 8%;">Stok</th>
                <th style="width: 22%;" class="text-center">Subtotal</th>
                <th style="width: 10%;">Produk</th>
            </tr>
        </thead>
        <tbody>

            <?php $total = 0 ?>
            @if(session('cart'))
            @foreach(session('cart') as $id => $product)

            <?php $total += $product['harga'] * $product['stok'] ?>

            <tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-3 hidden-xs"><img
                                src="{{ route('customer.produk.image', ['imageName' => $product['gambar_1']]) }}"
                                width="100" height="100" class="img-responsive" /></div>
                        <div class="col-sm-9">
                            <h4 class="nomargin">{{ $product['nama_produk'] }}</h4>
                        </div>
                    </div>
                </td>
                <td data-th="Harga">${{ $product['harga'] }}</td>
                <td data-th="Stok">
                    <input type="number" value="{{ $product['stok'] }}" class="form-control stok" />
                </td>
                <td data-th="Subtotal" class="text-center">${{ $product['harga'] * $product['stok'] }}</td>
                <td class="actions" data-th="">
                    <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}">Update</button>
                    <button class="btn btn-danger btn-sm mt-2 remove-from-cart" data-id="{{ $id }}">Remove</button>
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
                    <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>Lanjutkan
                        Belanja</a>
                    <a href="{{ route('admin.orders.create') }}" class="btn btn-primary"><i
                            class="fa fa-angle-left"></i>Lanjut ke Pembayaran</a>
                </td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
            </tr>
        </tfoot>
    </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquesry.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $(".update-cart").click(function(e) {
        e.preventDefault();
        console.log('aaaa');
        var ele = $(this);

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

        if (confirm("Are you sure")) {
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
<?php

namespace App\Http\Controllers\Customer;

use App\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer\Address;
use App\Models\Customer\Order;
use App\Models\Customer\OrderDetail;
use Illuminate\Foundation\Console\Presets\React;

class OrderDetailController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cart = Cart::with('produk')->where('id_user', auth()->user()->id)->get();
        $address = Address::where('user_id', auth()->user()->id)->get();
        $total_harga = 0;

        foreach ($cart as $item) {
            # code...
            $total_harga += $item['harga'] * $item['stok'];
        }

        return view('customer.order-detail.index', compact('cart', 'address', 'total_harga', 'error'));
    }

    public function store(Request $request)
    {
        $order = new Order();
        $order_detail = new OrderDetail();
        $cart = Cart::where('id_user', auth()->user()->id)->get();

        $total_harga = 0;

        foreach ($cart as $item) {
            $total_harga += $item['harga'] * $item['stok'];
        }

        if ($request->address != NULL) {
            $order->total_harga = $total_harga;
            $order->id_user = auth()->user()->id;
            $order->id_alamat = $request->address;
            $order->bank = $request->bank;
            $order->status_pemesanan = "belum dibayar";
            $order->save();

            foreach ($cart as $item) {

                $total_harga += $item['harga'] * $item['stok'];
                $data = [
                    [
                        'id_produk' => $item['id_produk'],
                        'id_user' => auth()->user()->id,
                        'id_order' => $order['id'],
                        'harga' => $item['harga'],
                        'stok' => $item['stok']
                    ],
                    // ['id_produk' => 2, 'id_user' => 1, 'id_order' => 8, 'harga' => 15000, 'stok' => 10],
                ];

                $order_detail->insert($data);
            }
            return redirect()->route('order.index');
        } else {
            return  "Alamat Tidak Boleh Kosong";
        }
    }
}

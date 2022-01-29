<?php

namespace App\Http\Controllers\Customer;

use App\Cart;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
    }

    public function index()
    {
        $cart = Cart::with('produk')->where('id_user', auth()->user()->id)->get();
        return view('customer.carts.index', ['cart' => $cart]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request, $id)
    {
        $checkCart = Cart::where('id_produk', $id)->where('id_user', auth()->user()->id)->get();

        $product = Product::find($id);
        $customerCart = new Cart();
        if (!$product) {
            abort(404);
        }

        $cart = session()->get('cart');

        if (!$cart) {
            $cart = [
                $id => [
                    "nama" => $product->nama_produk,
                    "stok" => 1,
                    "harga" => $product->harga,
                    "gambar_1" => $product->gambar_1
                ]
            ];
            $cart[$id]['stok']++;
            session()->put('cart', $cart);
            $customerCart->id_produk = $product->id;
            $customerCart->id_user = auth()->user()->id;
            $customerCart->stok = $cart[$id]['stok'];
            $customerCart->harga = $cart[$id]['harga'];
            $customerCart->save();
            session()->put('cart', $cart);
            return redirect('customer/carts')->with('succcess', 'Produk sudah ditambhakan ke keranjang!');
        }

        if (count($checkCart) == 0) {
            if (isset($cart[$id])) {
                $cart[$id]['stok']++;
                session()->put('cart', $cart);
                $customerCart->id_produk = $product->id;
                $customerCart->id_user = auth()->user()->id;
                $customerCart->stok = $cart[$id]['stok'];
                $customerCart->harga = $cart[$id]['harga'];
                $customerCart->save();
                return redirect('customer/carts')->with('success', 'Produk sudah ditambhakan ke keranjang!');
            }
            $cart[$id] = [
                "nama" => $product->nama_produk,
                "stok" => 1,
                "harga" => $product->harga,
                "gambar_1" => $product->gambar_1
            ];
            $cart[$id]['stok']++;
            session()->put('cart', $cart);
            $customerCart->id_produk = $product->id;
            $customerCart->id_user = auth()->user()->id;
            $customerCart->stok = $cart[$id]['stok'];
            $customerCart->harga = $cart[$id]['harga'];
            $customerCart->save();
            session()->put('cart', $cart);
            return redirect('customer/carts')->with('success', 'Produk sudah ditambhakan ke keranjang!');
        } else {
            Cart::where('id', $checkCart[0]['id'])->update([
                'stok' => $checkCart[0]['stok'] + 1,
            ]);
            return redirect('customer/carts')->with('success', 'Produk sudah ditambhakan ke keranjang!');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (request()->ajax()) {
            $cart = Cart::find($request->id);
            $cart->stok = $request->stok;
            $cart->update();
        }
        // if ($request->id and $request->stok) {
        //     $cart = session()->get('cart');
        //     $cart[$request->id]["stok"] = $request->stok;
        //     session()->put('cart', $cart);
        //     session()->flash('success', 'Cart updated successfully');
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request)
    {
        if (request()->ajax()) {
            $cart = Cart::find($request->id);
            $cart->delete();
        }
        // if ($request->id) {
        //     $cart = session()->get('cart');

        //     if (isset($cart[$request->id])) {
        //         unset($cart[$request->id]);
        //         session()->put('cart', $cart);
        //     }

        //     session()->flash('success', 'Produk berhasil dihapus');
        // }
    }
}